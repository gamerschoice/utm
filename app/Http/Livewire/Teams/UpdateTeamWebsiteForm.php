<?php

namespace App\Http\Livewire\Teams;

use Livewire\Component;
use Illuminate\Http\Request;

class UpdateTeamWebsiteForm extends Component
{
    public $url;
    public $team;

    protected $rules = [
        'url' => 'required|url'
    ];

    public function mount()
    {
        $this->url = $this->team->website;
    }

    public function render()
    {
        return view('livewire.teams.update-team-website-form');
    }

    public function updateUrl()
    {
        $this->validate();

        $this->team->update(['website' => $this->url]);

        $this->emitUp('saved');
    }
}
