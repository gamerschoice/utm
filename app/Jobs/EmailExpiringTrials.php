<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\TrialExpiring;
use App\Models\Team;
use Laravel\Cashier\Subscription;

class EmailExpiringTrials implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        /**
         * $teams = Team::onTrial()->get(); 
         * $teams->each(function (Team $team) {
         *      if($team->trial_ends_at->isTomorrow()) {
         *          Mail::to($team->owner->email)->send(new TrialExpiring);
         *      }
         * });
         */
        
        $trials = Subscription::query()->onTrial()->get();
        $trials->each( function (Subscription $subscription) {
            $team = $subscription->owner();
            if($subscription->trial_ends_at->isTomorrow()) {
                Mail::to($team->owner->email)->send(new TrialExpiring);
            }
        });


    }
}
