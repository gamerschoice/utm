<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use App\Models\Team;
use Livewire\Livewire;
use App\Http\Livewire\Domains\CreateDomainStep;
use App\Http\Livewire\Domains\RegisterDnsStep;
use App\Http\Livewire\Links\Wizard\ChoosePurpose;
use App\Http\Livewire\Links\Wizard\SelectSource;
use App\Http\Livewire\Links\Wizard\Destination;
use App\Http\Livewire\Links\Wizard\CustomiseLink;
use App\Services\CloudFlare;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('create-domain-step', CreateDomainStep::class);
        Livewire::component('register-dns-step', RegisterDnsStep::class);
        Livewire::component('choose-purpose', ChoosePurpose::class);
        Livewire::component('select-source', SelectSource::class);
        Livewire::component('destination', Destination::class);
        Livewire::component('customise-link', CustomiseLink::class);
        Cashier::useCustomerModel(Team::class);

        $this->app->singleton(
            abstract: CloudFlare::class,
            concrete: fn () => new CloudFlare(
                apiToken: strval(config('services.cloudflare.token')),
                baseUrl: strval(config('services.cloudflare.url')),
            ),
        );
    }
}
