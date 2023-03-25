<?php

namespace App\Http\Livewire\Domains;

use Spatie\LivewireWizard\Components\StepComponent;
use App\Actions\Domains\CreateDomain;
use Filament\Notifications\Notification; 
use App\Exceptions\DomainLimitException;
use Filament\Notifications\Actions\Action; 

class CreateDomainStep extends StepComponent
{
    public $domainName;

    public function render()
    {
        return view('livewire.domains.create-domain-step');
    }

    public function createDomain(CreateDomain $creator)
    {
        $data = $this->validate([
            'domainName' => [
                'required',
                'url'
            ]
        ]);

        try {
            $creator->create($this->domainName, auth()->user()->currentTeam);
            $this->emitTo('app-navigation-menu', 'refresh-navigation-menu');
            $this->nextStep();
        } catch (DomainLimitException $e) {
            Notification::make() 
                ->title('Cannot register another domain.')
                ->body("You've used all the available domains on your current plan.")
                ->warning()
                ->actions([ 
                    Action::make('Upgrade')
                        ->color('primary')
                        ->button(),
                ]) 
                ->send(); 
        }
    }
}
