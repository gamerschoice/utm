<?php

namespace App\Http\Livewire\Billing;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Actions\Billing\ChangeSubscriptionPlan;
use App\Models\Plan;

class PlanManager extends Component
{
    public $subscription;
    public $plans;
    public $current;
    public $pricing = 'monthly';
    public $swapTo;

    protected $listeners = ['swapped' => '$refresh'];

    public function mount()
    {
        $this->subscription = auth()->user()->currentTeam->subscriptions()->active()->first();
        $this->plans = Plan::where('active', true)->whereNot('sku', $this->subscription->name)->get();
        $this->current = Plan::where('active', true)->where('sku', $this->subscription->name)->first();
    }

    public function render()
    {
        return view('livewire.billing.plan-manager');
    }

    public function changePlan(ChangeSubscriptionPlan $planChanger)
    {
        $this->validate(['swapTo' => 'required']);

        $planChanger->execute($this->subscription, $this->swapTo);

        $this->current = Plan::where('active', true)->where('sku', $this->swapTo)->first();
        $this->plans = Plan::where('active', true)->whereNot('sku', $this->swapTo)->get();
        $this->emit('swapped');
    }
}
