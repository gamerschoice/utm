<?php

namespace App\Http\Livewire\Links\Wizard;
use Spatie\LivewireWizard\Components\StepComponent;
use App\Models\Link;
use Illuminate\Support\Str;

class CustomiseLink extends StepComponent
{
    public $destination;
    public $domain;

    public $utm_source;
    public $utm_medium;
    public $utm_campaign;
    public $utm_term;
    public $utm_content;
    public $utm_source_platform;
    public $utm_creative_format;
    public $utm_marketing_tactic;
    public $notes;

    public $link;

    public function saveLink() 
    {

        $link = Link::create([
            'domain_id' => $this->domain['id'],
            'destination' => $this->destination,
            'utm_source' => $this->utm_source,
            'utm_medium' => $this->utm_medium,
            'utm_campaign' => $this->utm_campaign,
            'utm_term' => $this->utm_term,
            'utm_content' => $this->utm_content,
            'utm_source_platform' => $this->utm_source_platform,
            'utm_creative_format' => $this->utm_creative_format,
            'utm_marketing_tactic' => $this->utm_marketing_tactic,
            'notes' => $this->notes,
            'shortlink' => Str::random(8)
        ]);

        $this->link = $link;
        $this->emit('linkCreated', $link);
    }

    public function mount() 
    {
        $state = $this->state();
        $this->utm_medium = ( $state->forStep('choose-purpose')['purpose'] === 'custom' ) ? '' : $state->forStep('choose-purpose')['purpose'];
        $this->utm_campaign = ( $state->forStep('choose-purpose')['campaign'] === 'custom' ) ? '' : $state->forStep('choose-purpose')['campaign'];
        if( array_key_exists('source', $state->forStep('select-source')) ) {
            $this->utm_source = ( $state->forStep('select-source')['source'] === 'custom' ) ? '' : $state->forStep('select-source')['source'];    
        } else {
            $this->utm_source = '';
        }
        $this->destination = $state->forStep('destination')['destination'];
    }

    public function render()
    {
        return view('livewire.links.wizard.customise');
    }

    public function resetWizard()
    {
        
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Link Details',
            'number' => '04',
        ];
    }
}