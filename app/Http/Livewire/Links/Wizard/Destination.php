<?php
namespace App\Http\Livewire\Links\Wizard;
use App\Models\Domain;
use Spatie\LivewireWizard\Components\StepComponent;
use App\Rules\MatchesConfiguredDomain;

class Destination extends StepComponent
{

    public $destination;
    public $domain;

    protected function rules() : array
    {
        return [
            'destination' => [
                'required',
                'url',
                new MatchesConfiguredDomain()
            ]
        ];
    }

    public function validateDestination()
    {
        $this->validate();

        $this->nextStep();

    }

    public function render( )
    {
        return view('livewire.links.wizard.destination');
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Destination',
            'number' => '03',
        ];
    }
}