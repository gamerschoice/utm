<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Domain;
use Illuminate\Http\Request;

class AppNavigationMenu extends \Laravel\Jetstream\Http\Livewire\NavigationMenu
{

    public $domains;

    public function mount()
    {

    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        //$team_id = auth()->user()->currentTeam->id;
        $this->domains = auth()->user()->currentTeam->domains()->limit(10)->get();

        return view('navigation-menu');
    }
}