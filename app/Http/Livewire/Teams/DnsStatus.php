<?php

namespace App\Http\Livewire\Teams;

use Livewire\Component;
use App\Actions\Teams\StartDnsVerification;

class DnsStatus extends Component
{
    public $team;
    public $stated;
    public $status;

    public function mount()
    {
        $this->status = $this->team->dns_configured;
        $this->verification = $this->team->dnsVerification;
    }

    public function render()
    {
        return view('livewire.teams.dns-status');
    }

    public function checkDnsRecords(StartDnsVerification $process)
    {
        $record = $process->start($this->team);
        $this->verification = $record;
        
        $this->emitUp('saved');
    }
}
