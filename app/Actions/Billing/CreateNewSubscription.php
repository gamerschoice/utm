<?php

namespace App\Actions\Billing;

use App\Models\Team;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class CreateNewSubscription
{
    public function execute(Team $team, string $planSku, string $paymentMethod, string $billingCycle, array $billing_address)
    {

        $plan = Plan::where('sku', $planSku)->first();
        $price_key = ($billingCycle == 'monthly') ? $plan->stripe_key : $plan->stripe_key_annual;

        DB::transaction(function () use ($team, $plan, $paymentMethod, $price_key, $billing_address) {
            $team->newSubscription('default', $price_key)
                ->skipTrial()
                ->create($paymentMethod, [
                    'name' => $team->owner->name,
                    'email' => $team->owner->email,
                    'address' => $billing_address
                ]);
        });
    }
}