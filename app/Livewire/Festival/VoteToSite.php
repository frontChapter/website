<?php

namespace App\Livewire\Festival;

use App\Models\FestivalSite;
use App\Models\Vote;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Livewire\Attributes\Validate;
use Livewire\Component;
use WireUi\Traits\Actions;

class VoteToSite extends Component
{
    use Actions;
    use WithRateLimiting;

    public FestivalSite $site;
    public Vote $vote;

    #[Validate('required|integer|min:1|max:5')]
    public int $selectedVote = 0;

    public function mount(FestivalSite $site, Vote $vote)
    {
        if (empty(auth()->user()->email_verified_at)) {
            return $this->redirect(\route('festival-site'));
        }
        $this->site = $site;
        $this->vote = $vote;
    }

    public function updatedSelectedVote()
    {
        try {
            if(empty(auth()->user()->email_verified_at)) {
                return $this->redirect(\route('festival-site'));
            }
            $this->rateLimit(10);
            $this->validateOnly('selectedVote');

            if (
                !$this
                ->vote
                ->festivalSites()
                ->wherePivot('user_id', auth()->id())
                ->updateExistingPivot($this->site->id, [
                    'vote' => $this->selectedVote,
                ])
            ) {
                $this
                    ->vote
                    ->festivalSites()
                    ->attach($this->site->id, [
                        'vote' => $this->selectedVote,
                        'user_id' => auth()->id(),
                    ]);
            }

            $this->dispatch('voted');
            // $this->notification()->success(
            //     $title = __('Vote Saved'),
            //     $description = __('Your vote was successfully saved')
            // );
        } catch (TooManyRequestsException $exception) {
            $this->notification()->error(
                $title = __('Slow down'),
            );
        }
    }

    public function render()
    {
        return view('livewire.festival.vote-to-site');
    }
}
