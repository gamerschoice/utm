<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{
    use HasFactory, HasUuids, Searchable, SoftDeletes;

    public $guarded = ['id'];

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return [
            'domain' => $this->domain,
            'team_id' => $this->team_id,
        ];
    }

    public function getLinkCountAttribute()
    {
        return count($this->links);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function team(): HasOne
    {
        return $this->hasOne(Team::class);
    }

    public function dnsVerification()
    {
        return $this->hasOne(DnsVerification::class);
    }
    
}
