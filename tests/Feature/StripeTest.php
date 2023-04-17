<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Listeners\StripeWebhookListener;

class StripeTest extends TestCase
{

    public function test_extra_seat_cancellation(): void
    {
        $payloadSeat = [
            'data' => [
                'object' => [
                    'customer' => 'cus_NeSqyPvxrNmitC',
                    'plan' => [
                        'id' => env('STRIPE_SEAT_KEY')
                    ],
                ],
            ],
            'type' => 'customer.subscription.deleted',
        ];
        $listener = new StripeWebhookListener;
        //$listener->cancelSeatExtra( $payloadSeat );
        //assert something....

    }

    public function test_extra_domain_cancellation(): void
    {
        $payloadDomain = [
            'data' => [
                'object' => [
                    'customer' => 'cus_NeSqyPvxrNmitC',
                    'plan' => [
                        'id' => env('STRIPE_DOMAIN_KEY')
                    ],
                ],
            ],
            'type' => 'customer.subscription.deleted',
        ];
        $listener = new StripeWebhookListener;
        //$listener->cancelDomainExtra( $payloadDomain );
        //assert something....
    }

    public function test_plan_cancellation(): void 
    {
        $payloadPlan = [
            'data' => [
                'object' => [
                    'customer' => 'cus_NeSqyPvxrNmitC',
                    'plan' => [
                        'id' => 'price_1Mt9uiHwvhcWXVfovLNANFnD'
                    ],
                ],
            ],
            'type' => 'customer.subscription.deleted',
        ];
        $listener = new StripeWebhookListener;
        //$listener->cancelPlan( $payloadPlan );
        //assert something....
    }
}
