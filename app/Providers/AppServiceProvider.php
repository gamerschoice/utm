<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use App\Models\Team;
use Livewire\Livewire;
use App\Http\Livewire\Domains\CreateDomainStep;
use App\Http\Livewire\Domains\RegisterDnsStep;

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
        
        Cashier::useCustomerModel(Team::class);
    }
}
