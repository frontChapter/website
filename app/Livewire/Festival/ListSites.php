<?php

namespace App\Livewire\Festival;

use App\Enums\FestivalSiteStatus;
use App\Models\FestivalSite;
use App\Models\Votable;
use Livewire\Component;
use Livewire\WithPagination;

class ListSites extends Component
{
    use WithPagination;

    public function getSites()
    {
        return FestivalSite::whereStatus(FestivalSiteStatus::PUBLISHED)
            ->paginate(24);
    }

    public function score($siteId)
    {
        $vote = Votable::where('votable_type', FestivalSite::class)
            ->where('votable_id', $siteId)
            ->selectRaw('votable_id, (sum(vote) / count(vote)) as score')
            ->groupBy('votable_id')
            ->first();

        if(empty($vote)) {
            return 0;
        }

        return $vote->score;
    }

    public function render()
    {
        return view('livewire.festival.list-sites', [
            'sites' => $this->getSites(),
        ]);
    }
}
