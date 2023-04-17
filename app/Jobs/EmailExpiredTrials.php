<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\TrialExpired;
use App\Models\Team;

class EmailExpiredTrials implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $teams = Team::expiredTrial()->get();

        $teams->each(function (Team $team) {
            if(! $team->trial_ends_at->isToday()) {
                Mail::to($team->owner->email)->send(new TrialExpired);
            }
        });
    }
}
