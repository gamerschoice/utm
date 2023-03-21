<?php

namespace App\Http\Livewire\Billing;

use Livewire\Component;

class Invoices extends Component
{
    public $invoices = [];

    public function mount()
    {
        $this->invoices = auth()->user()->currentTeam->invoices();
    }
    public function render()
    {
        return view('livewire.billing.invoices');
    }
}
