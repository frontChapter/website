<?php

namespace App\Jobs;

use App\Models\FestivalSite;
use App\Models\Votable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\Attributes\WithoutRelations;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessFestivalSitesScore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $festivalSites = FestivalSite::all();

        foreach($festivalSites as $festivalSite) {
            $vote = Votable::where('votable_type', FestivalSite::class)
                ->where('votable_id', $festivalSite->id)
                ->selectRaw('votable_id, (sum(vote) / count(vote)) as score, sum(vote) as count')
                ->groupBy('votable_id')
                ->first();

                if (!empty($vote)) {
                    $festivalSite->score = $vote->score;
                    $festivalSite->count = $vote->count;
                    $festivalSite->save();
                }
        }

    }
}
