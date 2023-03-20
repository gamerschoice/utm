<?php

namespace App\Actions\Teams;

use App\Models\Team;
use App\Models\ActiveDnsVerification;
use App\Jobs\VerifyDnsRecords;

class StartDnsVerification
{
    public function start(Team $team)
    {
        $record = $team->dnsVerification()->firstOrCreate(['status' => 'Verifying']);

        VerifyDnsRecords::dispatch($team);

        return $record;
    }
}