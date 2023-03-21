<?php

namespace App\Actions\Billing;

use App\Models\Team;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class ChangeSubscriptionPlan
{
    public function execute(Team $team, string $planSku)
    {

        $plan = Plan::where('sku', $planSku)->first();

        DB::transaction(function () use ($team, $plan) {
            $team->subscription('default')->swap($plan->stripe_key);
        });
    }
}