<?php
namespace App\Http\Livewire\Links\Wizard;
use Spatie\LivewireWizard\Components\StepComponent;

class SelectSource extends StepComponent
{

    public $source = 'custom';
    public $presets;
    public $purpose;

    public function mount()
    {
        $state = $this->state()->forStep('choose-purpose');
        $this->purpose = $state['purpose'];
        $this->presets = config('presets');
    }

    public function render()
    {
        return view('livewire.links.wizard.source');
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Traffic Source',
            'number' => '02',
        ];
    }
}