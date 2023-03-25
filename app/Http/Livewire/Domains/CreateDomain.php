<?php

namespace App\Http\Livewire\Domains;

use Spatie\LivewireWizard\Components\WizardComponent;

class CreateDomain extends WizardComponent
{

    public function steps(): array
    {
        return [
            CreateDomainStep::class,
            RegisterDnsStep::class
        ];
    }
}
