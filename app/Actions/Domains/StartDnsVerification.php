<?php

namespace App\Actions\Domains;

use App\Models\Domain;
use App\Models\ActiveDnsVerification;
use App\Jobs\VerifyDnsRecords;

class StartDnsVerification
{
    public function start(Domain $domain)
    {
        $record = $domain->dnsVerification()->firstOrCreate(['status' => 'Verifying']);

        VerifyDnsRecords::dispatch($domain);

        return $record;
    }
}