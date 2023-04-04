<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Plan;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class StripeWebhookController extends CashierController
{
    /**
     * Handle a Stripe webhook.
     *
     * @param  array  $payload
     * @return Response
     */
    public function handleCustomerSubscriptionDeleted(array $payload)
    {

        $subscriptionId = $payload['data']['object']['id'];
        $customerId = $payload['data']['object']['customer'];
        $priceId = $payload['data']['object']['plan']['id'];

        /*
        $plan = Plan::where('stripe_key', $priceId)
                    ->orWhere('stripe_key_annual', $priceId)
                    ->first();
        */

    }

}