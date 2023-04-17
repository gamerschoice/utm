<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Listeners\StripeWebhookListener;

class StripeTest extends TestCase
{
    protected array $payload = [
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

    public function test_extra_seat_cancellation(): void
    {
    }

    public function test_extra_domain_cancellation(): void
    {
    }

    public function test_plan_cancellation(): void 
    {
    }
}
