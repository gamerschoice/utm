<?php

namespace App\Actions\Billing;

use App\Models\Team;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification; 
use App\Exceptions\TooManyUsersException;
use App\Exceptions\TooManyDomainsException;

class ChangeSubscriptionPlan
{
    public function execute(Team $team, string $planSku)
    {
        try {
            $plan = Plan::where('sku', $planSku)->first();

            $this->guardAgainstTooManyUsers($team, $plan);

            $this->guardAgainstTooManyDomains($team, $plan);

            DB::transaction(function () use ($team, $plan) {
                $team->subscription('default')->skipTrial()->swap($plan->stripe_key);
                $team->update([
                    'plan_id' => $plan->id,
                    'maximum_domains' => $plan->domains,
                    'maximum_members' => $plan->seats
                ]);
            });

            Notification::make() 
                ->title('Subscription planned changed.')
                ->body("You've succesfully changed your subscription plan.")
                ->success()
                ->send(); 

        } catch (TooManyDomainsException $e) {
            $e->render();
        } catch (TooManyUsersException $e) {
            $e->render();
        }
    }

    public function guardAgainstTooManyUsers(Team $team, Plan $plan)
    {
        if($team->allUsers()->count() > $team->maximum_members) {
            throw new TooManyUsersException($team);
        }
    }

    public function guardAgainstTooManyDomains(Team $team, Plan $plan)
    {
        if($plan->domains < $team->domains()->count()) {
            throw new TooManyDomainsException($team);
        }
    }
}