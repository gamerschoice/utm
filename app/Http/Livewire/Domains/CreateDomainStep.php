<?php

namespace App\Http\Livewire\Domains;

use Spatie\LivewireWizard\Components\StepComponent;
use App\Actions\Domains\CreateDomain;
use Filament\Notifications\Notification; 
use App\Exceptions\DomainLimitException;
use Filament\Notifications\Actions\Action;
use App\Rules\IsValidDomain; 

class CreateDomainStep extends StepComponent
{
    public $domainName;
    public $domain;

    public function render()
    {
        return view('livewire.domains.create-domain-step');
    }

    public function createDomain(CreateDomain $creator)
    {
        $data = $this->validate([
            'domainName' => [
                'required',
                new IsValidDomain
            ]
        ]);

        try {
            $this->domain = $creator->create($this->domainName, auth()->user()->currentTeam);
            $this->emitTo('app-navigation-menu', 'refresh-navigation-menu');

            Notification::make() 
                ->title('Domain registered.')
                ->body("You've registered your domain.")
                ->success()
                ->send(); 


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
