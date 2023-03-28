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
        $this->domains = [];

        $this->totalDomains;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->domains = auth()->user()->currentTeam->domains()->limit(10)->get();
        $this->totalDomains = auth()->user()->currentTeam->domains()->count();

        return view('navigation-menu');
    }
}