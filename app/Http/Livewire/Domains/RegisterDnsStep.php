<?php

namespace App\Http\Livewire\Domains;

use Spatie\LivewireWizard\Components\StepComponent;
use App\Models\Domain;
use App\Actions\Domains\StartShortnameProcess;
use App\Rules\IsValidDomain;

class RegisterDnsStep extends StepComponent
{
    public $newShortlinkDomain;
    public $errorMessage = null;
    public $domain;

    public function mount()
    {
        $this->domain = Domain::find($this->state()->forStep('create-domain-step')['domain']['id']);
    }
    
    public function render()
    {
        return view('livewire.domains.register-dns-step');
    }

    public function saveShortlinkDomain(StartShortnameProcess $action)
    {
        $data = $this->validate([
            'newShortlinkDomain' => [
                new IsValidDomain()
            ]
        ]);
        

        $shortDomain = $action->start(Domain::find($this->state()->forStep('create-domain-step')['domain']['id']), $this->newShortlinkDomain);
    }
}
