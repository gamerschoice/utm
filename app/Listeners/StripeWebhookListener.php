<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Cashier\Events\WebhookHandled;
use Laravel\Cashier\Cashier;

class StripeWebhookListener
{
    /**
     * Handle the event.
     */
    public function handle(WebhookHandled $event): void
    {
        if($event->payload['type'] === 'customer.subscription.deleted') {
            $team = Cashier::findBillable($event->payload['id']);

            $team->subscriptions()->active()->get()->each(function ($susbcription) {
                $susbcription->cancelNow();
            });
        }
    }
}
