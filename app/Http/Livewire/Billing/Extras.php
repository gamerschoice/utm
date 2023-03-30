<?php

namespace App\Http\Livewire\Billing;

use Livewire\Component;
use Filament\Notifications\Notification;

class Extras extends Component
{


    public $team;

    public function mount()
    {

    }
    
    public function render()
    {
        $this->team = auth()->user()->currentTeam;

        return view('livewire.billing.extras', [
            'team' => $this->team,
            'subscription' => $this->team->subscription('default')
        ]);
    }



}
