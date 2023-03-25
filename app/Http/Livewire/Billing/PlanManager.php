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

    public function mount()
    {
        $this->subscription = auth()->user()->currentTeam->subscription('default');
        $this->plans = Plan::available()->get();
        $this->annualPricing = false;
    }

    public function render()
    {
        $this->current = auth()->user()->currentTeam->plan;

        return view('livewire.billing.plan-manager', [
            'subscribed' => auth()->user()->currentTeam->subscribed('default'),
            'intent' => auth()->user()->currentTeam->createSetupIntent()
        ]);
    }

    public function changePlan(ChangeSubscriptionPlan $planChanger)
    {
        // dd($this->all());
        $this->validate(['swapTo' => 'required']);

        $planChanger->execute(auth()->user()->currentTeam, $this->swapTo);
        $this->current = auth()->user()->currentTeam->plan;

        $this->emit('$refresh');
    }

    public function createSubscription(CreateNewSubscription $newSubscription)
    {
        $data = $this->validate([
            'cardHolderName' => 'required'
        ]);

        $plan = 'personal';

        $newSubscription->execute(auth()->user()->currentTeam, $plan, $this->payment_method);
        $this->emit('$refresh');
    }
}
