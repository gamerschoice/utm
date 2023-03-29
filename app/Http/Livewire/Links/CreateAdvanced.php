<?php

namespace App\Http\Livewire\Links;

use App\Models\Link;
use App\Models\Domain;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Rules\MatchesConfiguredDomain;
use Illuminate\Support\Facades\Validator;
use App\Actions\Links\CreateLink;

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

        $split = ['items' => preg_split('/[\r\n]+/', $this->destinations, -1, PREG_SPLIT_NO_EMPTY) ];
        $validator = Validator::make($split, [
            'items' => [ 'required','array','max:50' ],
            'items.*' => [
                'url',
                new MatchesConfiguredDomain(
                    Domain::find($this->domain_id)
                )
            ]
        ]);
        
        /**
         * DEFINTELY a better way of doing these error messages
         */
        if ($validator->fails()) {
            $this->destinationsLoaded = [];
            
            $this->errorMessage = 'Cannot process. Invalid URL(s) detected.';
            
            if(array_key_exists('items', $split))
                if(count($split['items']) > 50)
                    $this->errorMessage = 'Too may URLs detected. Maximum of 50 will be accepted in one go.';

            
            return false;
        }
        
        $validated = $validator->validated();

        foreach($validated['items'] as $url) {
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
    public function importLinks( CreateLink $creator )
    {

        $creator->createBulk( Domain::find($this->domain_id), $this->destinationsLoaded );

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
