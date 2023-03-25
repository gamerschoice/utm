<?php

namespace App\Actions\Billing;

use App\Models\Team;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class CreateNewSubscription
{
    public function execute(Team $team, string $planSku, string $paymentMethod)
    {

        $plan = Plan::where('sku', $planSku)->first();

        DB::transaction(function () use ($team, $plan, $paymentMethod) {
            $team->newSubscription('default', $plan->stripe_key)
                ->skipTrial()
                ->create($paymentMethod);
        });
    }
}