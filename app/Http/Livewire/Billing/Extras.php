<?php

namespace App\Http\Livewire\Billing;

use Livewire\Component;
use Filament\Notifications\Notification;

class Extras extends Component
{


    public $team;

    public $domain_quantity;
    public $seat_quantity;

    public function mount()
    {
        $this->domain_quantity = 1;
        $this->seat_quantity = 1;
    }

    public function addExtraDomains()
    {
        $added = $this->team->newSubscription('extra_domains', env('STRIPE_DOMAIN_KEY'))
            ->quantity( $this->domain_quantity )
            ->create();

        if(!$added) {
            Notification::make() 
            ->title('Subscription failed')
            ->body('Sorry! We couldn\'t add your subscription at this time. Please try again later. If the problem persists, please reach out to support.')
            ->danger()
            ->send(); 
            return false;
        }
            

        $this->team->maximum_domains += $this->domain_quantity;
        $this->team->save();

        Notification::make() 
            ->title('Subscription added')
            ->body('Thank you for subscribing! Your subscription plan is now active')
            ->success()
            ->send(); 

        $this->emit('$refresh');

    }

    public function cancelExtraDomains()
    {

        if( $this->team->domains->count() > $this->team->plan->domains ) {
            Notification::make() 
                ->title('Cannot cancel extras')
                ->body("You're currently using more domains than your plan allows if you remove these extras. Please remove your extra domains before cancelling.")
                ->danger()
                ->send();
            return;
        }


        $quantity_extra = $this->team->subscription('extra_domains')->quantity;
        $cancelled = $this->team->subscription('extra_domains')->cancel();
        if($cancelled) {

            Notification::make() 
                ->title('Extra domain subscription cancelled')
                ->success()
                ->send(); 

        }

        $this->emit('$refresh');

    }


    public function cancelExtraSeats()
    {

        if( $this->team->allUsers()->count() > $this->team->plan->seats ) {
            Notification::make() 
                ->title('Cannot cancel extras')
                ->body("You're currently using more seats than your plan allows if you remove these extras. Please remove your extra domains before cancelling.")
                ->danger()
                ->send(); 
            return;
        }


        $quantity_extra = $this->team->subscription('extra_seats')->quantity;
        $cancelled = $this->team->subscription('extra_seats')->cancel();
        if($cancelled) {

            Notification::make() 
                ->title('Extra seats subscription cancelled')
                ->success()
                ->send(); 

        }

        $this->emit('$refresh');

    }

    public function addExtraSeats()
    {
        $added = $this->team->newSubscription('extra_seats', env('STRIPE_SEAT_KEY'))
            ->quantity( $this->seat_quantity )
            ->create();

        if(!$added) {
            Notification::make() 
            ->title('Subscription failed')
            ->body('Sorry! We couldn\'t add your subscription at this time. Please try again later. If the problem persists, please reach out to support.')
            ->danger()
            ->send(); 
            return false;
        }

        $this->team->maximum_members += $this->seat_quantity;
        $this->team->save();

        Notification::make() 
            ->title('Subscription added')
            ->body('Thank you for subscribing! Your subscription plan is now active')
            ->success()
            ->send(); 

        $this->emit('$refresh');

    }
    
    public function render()
    {
        $this->team = auth()->user()->currentTeam;

        return view('livewire.billing.extras', [
            'team' => $this->team,
            'subscription' => $this->team->subscription('default'),
            'domain_extra_subscription' => $this->team->subscription('extra_domains'),
            'seat_extra_subscription' => $this->team->subscription('extra_seats'),
        ]);
    }



}
