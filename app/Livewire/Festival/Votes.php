<?php

namespace App\Livewire\Festival;

use App\Models\FestivalSite;
use App\Models\Votable;
use App\Models\Vote;
use Livewire\Attributes\On;
use Livewire\Component;

class Votes extends Component
{
    public FestivalSite $site;
    public $votes;

    public function mount(FestivalSite $site)
    {
        $this->site = $site;
        $this->getVotes();
    }

    public function getVotes()
    {
        $this->votes = Vote::all();
    }

    public function score()
    {
        $vote = Votable::where('votable_type', FestivalSite::class)
            ->where('votable_id', $this->site->id)
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
        return view('livewire.festival.votes', [
            'votes' => $this->votes,
        ]);
    }
}
