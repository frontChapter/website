<?php

namespace App\Livewire\Festival;

use App\Models\FestivalSite;
use Livewire\Component;

class SingleSite extends Component
{
    private FestivalSite $site;

    public bool $isValidUrl;

    public function mount(FestivalSite $festivalSite)
    {
        $this->site = $festivalSite;

        views($festivalSite)->record();

        $this->isValidUrl = in_array(dns_get_record($this->getDomain($festivalSite->url), DNS_NS)[0]['target'] ?? false, ['ns1.liara.zone', 'ns2.liara.zone']);
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

    public function render()
    {
        return view('livewire.festival.single-site', [
            'site' => $this->site,
        ]);
    }
}
