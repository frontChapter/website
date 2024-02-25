<?php

namespace App\Livewire\Festival;

use App\Models\FestivalSite;
use App\Models\Vote;
use Livewire\Attributes\On;
use Livewire\Component;

class Voting extends Component
{
    public FestivalSite $site;
    public $votes;

    public int $level = 1;
    public bool $showModal = false;

    public function mount(FestivalSite $site)
    {
        $this->site = $site;
        $this->getVotes();
    }

    private function getVotes()
    {
        $this->votes = Vote::all();
    }

    public function previousLevel()
    {
        if($this->level > 1) {
            $this->level--;
        }
    }

    public function updatedShowModal()
    {
        $this->level = 1;
    }

    // #[On('voted')]
    public function nextLevel()
    {
        if($this->level <= count($this->votes)) {
            $this->level++;
        }
    }

    public function render()
    {
        return view('livewire.festival.voting', [
            'votes' => $this->votes,
        ]);
    }
}
