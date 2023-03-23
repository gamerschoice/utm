<?php

namespace App\Http\Livewire\Links;
use App\Models\Domain;
use Spatie\LivewireWizard\Components\WizardComponent;

class CreateLink extends WizardComponent
{

    public $domain;

    public function initialState(): array
    {
        return [
            'choose-purpose' => [
                'domain' => $this->domain,
            ],
            'destination' => [
                'domain' => $this->domain,
                'destination' => 'https://' . $this->domain->domain . '/'
            ],
            'customise-link' => [
                'domain' => $this->domain
            ]
        ];
    }

    public function steps(): array
    {
        return [
            Wizard\ChoosePurpose::class,
            Wizard\SelectSource::class,
            Wizard\Destination::class,
            Wizard\CustomiseLink::class
        ];
    }
}
