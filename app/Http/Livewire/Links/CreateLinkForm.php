<?php

namespace App\Http\Livewire\Links;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Rules\MatchesConfiguredDomain;
use App\Actions\Links\CreateLink;


class CreateLinkForm extends Component
{
    public $team;
    public $destination;

    public function mount(Request $request)
    {
        $this->team = $request->user()->currentTeam;
    }

    public function render()
    {
        return view('livewire.links.create-link-form');
    }

    public function createLink(CreateLink $creator)
    {
        $link = $creator->create($this->team, $this->validate([
            'destination' => [
                'required',
                'url',
                new MatchesConfiguredDomain($this->team)
            ]
        ]));

        return redirect()->route('links.show', $link);
    }
}
