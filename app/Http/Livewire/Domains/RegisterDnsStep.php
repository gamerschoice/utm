<?php

namespace App\Http\Livewire\Domains;

use Spatie\LivewireWizard\Components\StepComponent;

class RegisterDnsStep extends StepComponent
{
    public function render()
    {
        return view('livewire.domains.register-dns-step');
    }
}
