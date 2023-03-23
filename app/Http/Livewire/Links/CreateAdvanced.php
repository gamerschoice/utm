<?php

namespace App\Http\Livewire\Links;

use App\Models\Link;
use App\Models\Domain;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Rules\MatchesConfiguredDomain;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreateAdvanced extends Component
{

    public $domain_id;

    public $destinations;
    public $destinationsLoaded = [];
    public $errorMessage;

    public $presetSource;
    public $presetMedium;
    public $presetCampaign;

    public function loadDestinations()
    {
        $split = preg_split('/[\r\n]+/', $this->destinations, -1, PREG_SPLIT_NO_EMPTY);
        $validator = Validator::make($split, [
            '*' => 'url',
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
             $this->destinationsLoaded[] = $link;
        }

    }

    public function importLinks()
    {
        foreach($this->destinationsLoaded as $link)
        {
            $linkObj = new Link;
            $linkObj->destination = $link['destination'];
            $linkObj->utm_source = $link['utm_source'];
            $linkObj->utm_medium = $link['utm_medium'];
            $linkObj->utm_campaign = $link['utm_campaign'];
            $linkObj->domain_id = $this->domain_id;
            $linkObj->shortlink = Str::random(8);
            $linkObj->save();
        }
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
