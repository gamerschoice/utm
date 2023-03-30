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
        $added = $this->team->newSubscription('extra_domains', 'price_1MrPH6HwvhcWXVfoukyWcAgZ')
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

        /**
         * @todo check if user can reduce domains by $quantity_extra
         */

        $quantity_extra = $this->team->subscription('extra_domains')->quantity();
        $cancelled = $this->team->subscription('extra_domains')->cancel();
        if($cancelled) {
            $this->team->maximum_domains -= $quantity_extra;
            $this->team->save();

            Notification::make() 
                ->title('Extra domain subscription cancelled')
                ->success()
                ->send(); 

        }

        $this->emit('$refresh');

    }


    public function cancelExtraSeats()
    {

        /**
         * @todo check if user can reduce domains by $quantity_extra
         */

        $quantity_extra = $this->team->subscription('extra_seats')->quantity();
        $cancelled = $this->team->subscription('extra_seats')->cancel();
        if($cancelled) {
            $this->team->maximum_members -= $quantity_extra;
            $this->team->save();

            Notification::make() 
                ->title('Extra seats subscription cancelled')
                ->success()
                ->send(); 

        }

        $this->emit('$refresh');

    }

    public function addExtraSeats()
    {
        $added = $this->team->newSubscription('extra_seats', 'price_1MrPHTHwvhcWXVfoGWqgeN11')
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
