<?php

namespace App\Actions\Teams;

use App\Models\Team;
use App\Jobs\VerifyDnsRecords;

class StartDnsVerification
{
    public function start(Team $team)
    {
        VerifyDnsRecords::dispatch($team);
    }
}