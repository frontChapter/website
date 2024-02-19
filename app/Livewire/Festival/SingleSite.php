<?php

namespace App\Livewire\Festival;

use App\Models\FestivalSite;
use Livewire\Component;

class SingleSite extends Component
{
    private FestivalSite $site;

    public function mount(FestivalSite $festivalSite)
    {
        $this->site = $festivalSite;
    }

    public function render()
    {
        return view('livewire.festival.single-site', [
            'site' => $this->site,
        ]);
    }
}
