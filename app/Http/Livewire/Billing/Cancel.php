<?php

namespace App\Http\Livewire\Billing;

use Livewire\Component;
use Filament\Notifications\Notification;

class Cancel extends Component
{

    public $subscription;
    public $team;

    public $confirmCancel = false;

    public function mount()
    {

    }
    
    public function render()
    {
        $this->team = auth()->user()->currentTeam;
        $this->subscription = $this->team->subscription('default');

        return view('livewire.billing.cancel', [
            'subscription' => $this->subscription
        ]);
    }

    public function cancelSubscription()
    {
        $cancelled = $this->subscription->cancel();
        if($cancelled) {
            Notification::make() 
                ->title('Your subscription has been cancelled.')
                ->body('You can continue using your account until your current billing cycle ends.')
                ->success()
                ->send(); 
        }
        $this->emit('$refresh');

    }

}
