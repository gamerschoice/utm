<?php

namespace App\Http\Livewire\Links;

use App\Models\Link;
use App\Models\Domain;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Rules\MatchesConfiguredDomain;

class CreateAdvanced extends Component
{

    public $destinations;

    public function getFormattedDestinationsProperty()
    {
        return preg_split('/[\r\n]+/', $this->destinations, -1, PREG_SPLIT_NO_EMPTY);
    }

    public function mount(Request $request)
    {

    }

    public function render()
    {
        return view('livewire.links.advanced');
    }

}
