<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Domain;
use Illuminate\Http\Request;

class Search extends Component
{
    public $term = "";

    public function render(Request $request)
    {
        $team_id = $request->user()->currentTeam->id;

        $domains = Domain::search($this->term)->where('team_id', $team_id)->paginate(10);

        $data = [
            'domains' => $domains,
        ];

        return view('livewire.search', $data);
    }
}
