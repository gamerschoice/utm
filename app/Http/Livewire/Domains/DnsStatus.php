<?php

namespace App\Http\Livewire\Domains;

use Livewire\Component;
use App\Actions\Domains\StartDnsVerification;

class DnsStatus extends Component
{
    public $domain;
    public $stated;
    public $status;

    public function mount()
    {
        $this->status = $this->domain->dns_configured;
        $this->verification = $this->domain->dnsVerification;
    }

    public function render()
    {
        return view('livewire.domains.dns-status');
    }

    public function checkDnsRecords(StartDnsVerification $process)
    {
        $record = $process->start($this->domain);
        $this->verification = $record;
        
        $this->emitUp('saved');
    }
}
