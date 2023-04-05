<?php

namespace App\Http\Livewire\Billing;

use Livewire\Component;
use App\Actions\Billing\ChangeSubscriptionPlan;
use App\Actions\Billing\CreateNewSubscription;
use App\Models\Plan;
use App\Exceptions\TooManyUsersException;
use App\Exceptions\TooManyDomainsException;
use Filament\Notifications\Notification;

class PaymentMethod extends Component
{

    public $hasPaymentMethod;
    public $paymentMethod;
    public $new_payment_method_id;

    public function mount()
    {

    }


    public function savePaymentMethod()
    {
        $updated = auth()->user()->currentTeam->updateDefaultPaymentMethod( $this->new_payment_method_id );
        if($updated) {
            Notification::make() 
                ->title('Payment method updated.')
                ->success()
                ->send(); 
        }
        $this->emit('$refresh');
    }

    public function render()
    {
        $this->hasPaymentMethod = auth()->user()->currentTeam->hasPaymentMethod();
        $this->paymentMethod = [];
        
        if($this->hasPaymentMethod)
            $this->paymentMethod = auth()->user()->currentTeam->defaultPaymentMethod()->toArray();

        return view('livewire.billing.payment-method', [
            'intent' => auth()->user()->currentTeam->createSetupIntent(),
            'hasPaymentMethod' => $this->hasPaymentMethod,
            'paymentMethod' => $this->paymentMethod,
        ]);
    }

}
