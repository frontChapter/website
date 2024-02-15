<?php

namespace App\Livewire\Festival;

use App\Models\FestivalSite;
use App\Models\Votable;
use App\Models\Vote;
use Livewire\Attributes\On;
use Livewire\Component;

class VotesResults extends Component
{
    public FestivalSite $site;
    public Vote $vote;
    public $siteVotes;

    public function mount(FestivalSite $site, Vote $vote)
    {
        $this->site = $site;
        $this->vote = $vote;

        $this->score();
    }

    #[On('voted')]
    public function score()
    {
        $this->siteVotes = Votable::where('votables.vote_id', $this->vote->id)
            ->where('votable_type', FestivalSite::class)
            ->where('votable_id', $this->site->id)
            ->selectRaw('vote, count(vote) as count')
            ->groupBy('vote')
            ->get();
    }

    public function render()
    {
        return view('livewire.festival.votes-results');
    }
}
