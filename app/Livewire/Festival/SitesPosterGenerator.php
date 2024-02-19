<?php

namespace App\Livewire\Festival;

use App\Models\FestivalSite;
use Hpez\UrlShortener\Facades\UrlShortener;
use Livewire\Component;

class SitesPosterGenerator extends Component
{
    private FestivalSite $site;
    public $shortUrl;

    public function mount(FestivalSite $site)
    {
        $this->site = $site;
        $this->shortUrl = url(UrlShortener::shorten(
            route('festival-site.single', [
                'festivalSite' => $site,
                'utm_source' => 'sites-poster',
                'utm_medium' => 'social',
                'utm_campaign' => 'i-am-hero',
            ])
        ), secure: true);
    }

    public function render()
    {
        return view('livewire.festival.sites-poster-generator', [
            'site' => $this->site,
        ]);
    }
}
