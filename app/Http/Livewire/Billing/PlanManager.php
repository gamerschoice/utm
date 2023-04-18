<?php

namespace App\Http\Livewire\Billing;

use Livewire\Component;
use App\Actions\Billing\ChangeSubscriptionPlan;
use App\Actions\Billing\CreateNewSubscription;
use App\Models\Plan;
use App\Exceptions\TooManyUsersException;
use App\Exceptions\TooManyDomainsException;

class PlanManager extends Component
{
    public $subscription;
    public $plans;
    public $annualPricing;
    public $current;
    public $swapTo;
    public $payment_method;
    public $cardHolderName;

    public $billing_address_1;
    public $billing_address_2;
    public $billing_address_city;
    public $billing_address_state;
    public $billing_country;
    public $billing_postcode;

    public function mount()
    {
        $this->annualPricing = false;
    }

    public function render()
    {
        $this->current = auth()->user()->currentTeam->plan;
        $this->subscription = auth()->user()->currentTeam->subscription('default');
        $this->plans = Plan::available(auth()->user()->currentTeam)->get();

        return view('livewire.billing.plan-manager', [
            'subscribed' => auth()->user()->currentTeam->subscribed('default'),
            'subscription' => $this->subscription,
            'intent' => auth()->user()->currentTeam->createSetupIntent()
        ]);
    }

    public function changePlan(ChangeSubscriptionPlan $planChanger)
    {

        $this->validate(['swapTo' => 'required']);

        $planChanger->execute(auth()->user()->currentTeam, $this->swapTo);
        $this->current = auth()->user()->currentTeam->plan;
        auth()->user()->currentTeam->maximum_domains = $this->current->domains;
        auth()->user()->currentTeam->maximum_members = $this->current->seats;


        return redirect('/billing');

    }

    public function createSubscription(CreateNewSubscription $newSubscription)
    {

        $address = [
            'city' => $this->billing_address_city,
            'country' => $this->billing_country,
            'line1' => $this->billing_address_1,
            'line2' => $this->billing_address_2,
            'state' => $this->billing_address_state,
            'postal_code' => $this->billing_postcode
        ];

        $plan = $this->swapTo;
        $billingCycle = $this->annualPricing ? 'annually' : 'monthly';
        $newSubscription->execute(
            auth()->user()->currentTeam, 
            $plan, 
            $this->payment_method, 
            $billingCycle,
            $address
        );

        return redirect('/billing');

    }
}
