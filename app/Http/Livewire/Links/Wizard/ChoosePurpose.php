<?php
namespace App\Http\Livewire\Links\Wizard;
use Spatie\LivewireWizard\Components\StepComponent;
use App\Models\Link;

class ChoosePurpose extends StepComponent
{

    public $purpose = 'custom';
    public $domain;

    public $campaign;

    public $distinctCampaigns;


    public function mount()
    {
        $distinctCampaigns = Link::select('utm_campaign')
            ->distinct()
            ->where('domain_id', $this->domain['id'])
            ->get()
            ->toArray();

        foreach($distinctCampaigns as $campaign) {
            if(!$campaign['utm_campaign'])
                continue;

            $this->distinctCampaigns[] = $campaign['utm_campaign'];
        }
    }

    public function validatePurpose()
    {
        if($this->purpose == 'custom') {
            $this->showStep('destination');
        } else {
            $this->nextStep();
        }
    }

    public function setCampaign(string $campaign)
    {
        $this->campaign = $campaign;
    }

    public function render()
    {
        $test = $this->campaign;

        $campaigns = array_filter($this->distinctCampaigns, function($value) use ($test) {
            if($value === $test)
                return false;
            
            return strpos($value, $test) !== false;
        });

        return view('livewire.links.wizard.purpose', [
            'campaigns' => $campaigns
        ]);
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Campaign',
            'number' => '01',
        ];
    }
}