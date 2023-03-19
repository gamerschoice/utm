<?php

namespace App\Http\Livewire\Teams;

use Livewire\Component;
use App\Actions\Teams\StartDnsVerification;

class DnsStatus extends Component
{
    public $team;
    public $status;

    public function mount()
    {
        $this->status = $this->team->dns_configured;
    }

    public function render()
    {
        return view('livewire.teams.dns-status');
    }

    public function checkDnsRecords(StartDnsVerification $process)
    {
        $process->start($this->team);
        
        $this->emitUp('saved');
    }
}
