<?php

namespace App\Http\Livewire\Links;

use App\Models\Link;
use App\Models\Domain;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Rules\MatchesConfiguredDomain;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Filament\Notifications\Notification; 

class CreateAdvanced extends Component
{

    public $domain_id;

    public $destinations;
    public $destinationsLoaded = [];
    public $errorMessage;

    public $presetSource;
    public $presetMedium;
    public $presetCampaign;


    public function resetData() 
    {
        $this->resetDestinationsLoaded();
        $this->presetSource = '';
        $this->presetMedium = '';
        $this->presetCampaign = '';
        $this->errorMessage = '';
        $this->destinations = '';

    }
    public function resetDestinationsLoaded()
    {
        $this->destinationsLoaded = [];
    }

    public function loadDestinations()
    {
        $this->resetDestinationsLoaded();

        $split = preg_split('/[\r\n]+/', $this->destinations, -1, PREG_SPLIT_NO_EMPTY);
        $validator = Validator::make($split, [
            '*' => [
                'url',
                new MatchesConfiguredDomain(
                    Domain::find($this->domain_id)
                )
            ]
        ]);
        
        if ($validator->fails()) {
            $this->destinationsLoaded = [];
            $this->errorMessage = 'Cannot process. Invalid URL(s) detected.';
            return false;
        }

        foreach($validator->validated() as $url) {
            $link = [];
            $link['destination'] = $url;
            $link['utm_source'] = $this->presetSource;
            $link['utm_medium'] = $this->presetMedium;
            $link['utm_campaign'] = $this->presetCampaign;
            $link['utm_term'] = '';
            $link['utm_content'] = '';
            $link['utm_source_platform'] = '';
            $link['utm_creative_format'] = '';
            $link['utm_marketing_tactic'] = '';
            $link['notes'] = '';
            $this->destinationsLoaded[] = $link;
        }

    }

    /**
     * @todo probably a much better way of doing this.
     */
    public function importLinks()
    {
        foreach($this->destinationsLoaded as $link)
        {
            $linkObj = new Link;
            $linkObj->destination = $link['destination'];
            $linkObj->utm_source = $link['utm_source'];
            $linkObj->utm_medium = $link['utm_medium'];
            $linkObj->utm_campaign = $link['utm_campaign'];
            $linkObj->utm_term = $link['utm_term'];
            $linkObj->utm_content = $link['utm_content'];
            $linkObj->utm_source_platform = $link['utm_source_platform'];
            $linkObj->utm_creative_format = $link['utm_creative_format'];
            $linkObj->utm_marketing_tactic = $link['utm_marketing_tactic'];
            $linkObj->notes = $link['notes'];
            $linkObj->domain_id = $this->domain_id;
            $linkObj->shortlink = Str::random(8);
            $linkObj->save();
        }

        Notification::make() 
            ->title('Links imported')
            ->body('Your links have been imported successfully.')
            ->success()
            ->send(); 

        $this->resetData();

    }

    public function mount(Request $request)
    {
        $this->domain_id = $request->domain_id;
    }

    public function render()
    {
        return view('livewire.links.advanced');
    }

}
