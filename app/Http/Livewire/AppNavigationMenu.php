<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Domain;
use Illuminate\Http\Request;

class AppNavigationMenu extends \Laravel\Jetstream\Http\Livewire\NavigationMenu
{

    public $domains;
    public $totalDomains;

    public function mount()
    {
        $team_id = auth()->user()->currentTeam->id;
        $this->domains = Domain::where('team_id', $team_id)->take(10)->get();

        $this->totalDomains = Domain::where('team_id', $team_id)->count();
    }
}