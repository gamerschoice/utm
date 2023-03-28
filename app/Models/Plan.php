<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Queries\PlanQueries;

class Plan extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function newEloquentBuilder($query): Builder
    {
        return new PlanQueries($query);
    }
    
}
