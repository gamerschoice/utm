<?php

namespace App\Http\Livewire\Billing;

use Livewire\Component;
use App\Actions\Billing\ChangeSubscriptionPlan;
use App\Models\Plan;

class PlanManager extends Component
{
    public $subscription;
    public $plans;
    public $current;
    public $annualPricing;
    public $swapTo;

    protected $listeners = ['swapped' => '$refresh'];

    public function mount()
    {
        $this->subscription = auth()->user()->currentTeam->subscription('default');
        $this->plans = Plan::available(auth()->user()->currentTeam)->get();
        $this->current = auth()->user()->currentTeam->plan;
        $this->annualPricing = false;
    }

    public function render()
    {
        return view('livewire.billing.plan-manager');
    }

    public function changePlan(ChangeSubscriptionPlan $planChanger)
    {
        $this->validate(['swapTo' => 'required']);

        $planChanger->execute(auth()->user()->currentTeam, $this->swapTo);

        $this->current = Plan::where('active', true)->where('sku', $this->swapTo)->first();
        $this->plans = Plan::where('active', true)->whereNot('sku', $this->swapTo)->get();

        $this->emit('swapped');
    }

    public function createSubscription()
    {
        # code...
    }
}
