<?php

namespace App\Livewire\Festival;

use App\Enums\FestivalSiteStatus;
use App\Models\FestivalSite;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterSite extends Component
{
    use WithFileUploads;

    public int $level = 1;

    #[Url]
    #[Validate('required|string')]
    public $appID;

    #[Validate('required|string')]
    public $name;

    #[Validate('required|string|active_url')]
    public $url;

    #[Validate('nullable|mimes:jpg,jpeg,png|max:1024')]
    public $photo;

    public function validateApplication()
    {
        $this->validateOnly('appID');

        $festivalSite = $this->getFestivalSite();

        if (empty($festivalSite)) {
            return $this->addError('appID', trans('This application ID does not exist on the liara platform or created before'));
        }

        $this->level = 2;
    }

    public function submit()
    {
        if ($this->level === 2) {
            $this->validate();
            $festivalSite = $this->getFestivalSite();

            if (empty($festivalSite)) {
                $this->level = 1;
                return $this->addError('appID', trans('This application ID does not exist on the liara platform or created before'));
            }

            $festivalSite->user_id = auth()->id();
            $festivalSite->name = $this->name;
            $festivalSite->url = $this->url;

            if(!empty($this->photo)) {
                $path = $this->photo->store('sites/logos', 'public');
                $festivalSite->logo = $path;
            }

            $festivalSite->status = FestivalSiteStatus::PUBLISHED;
            $festivalSite->save();

            return $this->redirect(route('festival-site'));
        }
    }

    public function getFestivalSite(): FestivalSite|null
    {
        $name = 'fcf1402-' . $this->appID;
        return FestivalSite::whereAppID($name)
            ->whereStatus(FestivalSiteStatus::PENDING)
            ->first();
    }

    public function render()
    {
        return view('livewire.festival.register-site');
    }
}