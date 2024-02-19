<?php

namespace App\Livewire\Festival;

use App\Enums\FestivalSiteStatus;
use App\Models\FestivalSite;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterSite extends Component
{
    use WithFileUploads;

    public FestivalSite|null $festivalSite = null;

    public int $level = 1;

    #[Url]
    public string $appID;

    #[Validate('required|string')]
    public string $appId;

    #[Validate('required|string')]
    public $name;

    public $url;

    #[Validate('nullable|mimes:jpg,jpeg,png|max:1024')]
    public $photo;

    public $logoUrl;

    public function rules()
    {
        return [
            'url' => [
                'required',
                'string',
                'active_url',
                Rule::unique('festival_sites', 'url')->ignore($this->festivalSite->id ?? 0)
            ],
        ];
    }

    public function mount(FestivalSite | null $festivalSite = null)
    {
        if (!empty($festivalSite) && auth()->user()->cannot('update', $festivalSite)) {
            return \abort(403);
        }

        if (!empty($festivalSite)) {
            $this->festivalSite = $festivalSite;

            $this->appId = str($festivalSite->app_id)->replace('fcf1402-', '');
            $this->name = $festivalSite->name;
            $this->url = $festivalSite->url;
            $this->logoUrl = $festivalSite->logo_url;

            $this->level = 2;
        } else {
            if (!empty($this->appID)) {
                $this->appId = str($this->appID)->replace('fcf1402-', '');
                $this->validateApplication();
            }
        }

    }

    public function validateApplication()
    {
        $this->validateOnly('appId');

        $festivalSite = $this->getFestivalSite();

        if (empty($festivalSite)) {
            return $this->addError('appId', trans('This application ID does not exist on the liara platform or created before'));
        }

        $this->level = 2;
    }

    public function submit()
    {
        if (!empty($this->festivalSite) && auth()->user()->cannot('update', $this->festivalSite)) {
            return \abort(403);
        }

        if ($this->level === 2) {
            $this->validate();

            $festivalSite = $this->getFestivalSite();

            if (empty($festivalSite)) {
                $this->level = 1;
            }

            if (!in_array(dns_get_record($this->getDomain($this->url), DNS_NS)[0]['target'] ?? false, ['ns1.liara.zone', 'ns2.liara.zone'])) {
                return $this->addError('url', trans('To participate in the contest, your site must be hosted on Liara'));
            }

            $festivalSite->user_id = auth()->id();
            $festivalSite->name = $this->name;
            $festivalSite->url = $this->url;

            if (!empty($this->photo)) {
                $path = $this->photo->store('sites/logos', 'public');
                $festivalSite->logo = $path;
            }

            $festivalSite->status = FestivalSiteStatus::PUBLISHED;
            $festivalSite->save();

            return $this->redirect(route('festival-site'));
        }
    }

    public function getDomain($url)
    {
        $pieces = parse_url($url);
        $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{0,63}\.[a-z\.]{1,5})$/i', $domain, $regs)) {
            return $regs['domain'];
        }
        return false;
    }

    public function getFestivalSite(): FestivalSite | null
    {
        if(empty($this->festivalSite)) {
            $name = 'fcf1402-' . $this->appId;

            return FestivalSite::whereAppId($name)
                ->whereStatus(FestivalSiteStatus::PENDING)
                ->first();
        } else {
            return $this->festivalSite;
        }
    }

    public function render()
    {
        return view('livewire.festival.register-site');
    }
}
