<?php

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;

class PlanQueries extends Builder
{
    public function available($team = null)
    {
        if($team->plan) {
            return $this->whereNot('id', $team->plan->id)->where('active', true);
        }

        return $this->where('active', true);
    }
}