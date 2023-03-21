<?php

namespace App\Actions\Billing;

use Laravel\Cashier\Subscription;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class ChangeSubscriptionPlan
{
    public function execute(Subscription $subscription, string $planSku)
    {
        $plan = Plan::where('sku', $planSku)->first();

        DB::transaction(function () use ($subscription, $plan) {
            $subscription->swap($plan->stripe_key);
            $subscription->update(['name' => $plan->sku]);
        });
    }
}