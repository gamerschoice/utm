<?php

namespace App\Http\Livewire\Domains;

use Spatie\LivewireWizard\Components\WizardComponent;

class CreateDomainWizard extends WizardComponent
{

    public function steps(): array
    {
        return [
            CreateDomainStep::class,
            RegisterDnsStep::class
        ];
    }
}
