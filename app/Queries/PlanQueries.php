<?php

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Team;

class PlanQueries extends Builder
{
    public function available(Team $team = null)
    {
        if($team) {
            return $this->whereNot('id', $team->plan->id)->where('active', true);
        }

        return $this->where('active', true);
    }
}