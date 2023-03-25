<?php

namespace App\Exceptions;

use Exception;
use App\Models\Team;

class DomainLimitException extends Exception
{
    public function __construct(Team $team)
    {
        $this->team = $team;
    }
}
