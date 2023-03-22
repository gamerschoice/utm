<?php

namespace App\Http\Livewire\Domains;

use Spatie\LivewireWizard\Components\StepComponent;

class CreateDomainStep extends StepComponent
{
    public function render()
    {
        return view('livewire.domains.create-domain-step');
    }
}
