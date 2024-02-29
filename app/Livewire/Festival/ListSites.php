<?php

namespace App\Livewire\Festival;

use App\Enums\FestivalSiteStatus;
use App\Models\FestivalSite;
use App\Models\Votable;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ListSites extends Component
{
    use WithPagination;

    public function getSites()
    {
        return FestivalSite::whereStatus(FestivalSiteStatus::PUBLISHED)
            ->orderBy("count", "DESC")
            ->orderBy("score", "DESC")
            ->paginate(23);
    }

    public function render()
    {
        return view('livewire.festival.list-sites', [
            'sites' => $this->getSites(),
        ]);
    }
}
