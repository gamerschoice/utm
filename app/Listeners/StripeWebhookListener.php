<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Cashier\Events\WebhookHandled;
use Laravel\Cashier\Cashier;

class StripeWebhookListener
{

    public function cancelSeatExtra($payload)
    {
        $team = Cashier::findBillable($payload['data']['object']['customer']);
        $team->maximum_members = $team->plan->seats;
        $team->save();
    }

    public function cancelDomainExtra($payload) 
    {
        $team = Cashier::findBillable($payload['data']['object']['customer']);
        $team->maximum_domains = $team->plan->domains;
        $team->save();
    }

    public function cancelPlan($payload)
    {
        $team = Cashier::findBillable($payload['data']['object']['customer']);

        $team->subscriptions()->active()->get()->each(function ($susbcription) {
            $susbcription->cancelNow();
        });
    }

    /**
     * Handle the event.
     */
    public function handle(WebhookHandled $event): void
    {
        if($event->payload['type'] === 'customer.subscription.deleted') {

            $stripe_price_key = $event->payload['data']['object']['plan']['id'];

            switch( $stripe_price_key ) {
                case env('STRIPE_DOMAIN_KEY'):
                    $this->cancelDomainExtra($event->payload);
                    break;
                case env('STRIPE_SEAT_KEY'):
                    $this->cancelSeatExtra($event->payload);
                    break;
                default:
                    $this->cancelPlan($event->payload);
                    break;
            }

        }
    }

}
