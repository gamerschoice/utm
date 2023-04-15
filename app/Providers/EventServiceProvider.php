<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\LinkCreated;
use App\Events\BulkLinksCreated;
use App\Listeners\CreateShortlinkKeyValueListener;
use App\Listeners\BulkShortlinksKeyValueListener;
use Laravel\Cashier\Events\WebhookHandled;
use App\Listeners\StripeWebhookListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        LinkCreated::class => [
            CreateShortlinkKeyValueListener::class,
        ],
        BulkLinksCreated::class => [
            BulkShortlinksKeyValueListener::class,
        ],
        WebhookHandled::class => [
            StripeWebhookListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
