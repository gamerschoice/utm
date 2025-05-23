<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Link extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function domain() : BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

    public function getCreatedAgoAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getHealthCheckedAgoAttribute()
    {
        if($this->health_checked_at)
            return Carbon::parse($this->health_checked_at)->diffForHumans();
        
        return 'never';
    }

    public function getAutoUrlAttribute()
    {

        if($this->domain->shortdomain && $this->domain->shortdomain->status === 'active') {

            return 'https://' . $this->domain->shortdomain->host . '/' . $this->shortlink;

        }

        $query = http_build_query([
            'utm_source' => $this->utm_source,
            'utm_medium' => $this->utm_medium,
            'utm_campaign' => $this->utm_campaign,
            'utm_term' => $this->utm_term,
            'utm_content' => $this->utm_content,
            'utm_source_platform' => $this->utm_source_platform,
            'utm_creative_format' => $this->utm_creative_format,
            'utm_marketing_tactic' => $this->utm_marketing_tactic,
        ]);

        return $this->destination . '?' . $query;

    }

    public function getFullUrlAttribute()
    {

        $collection = collect([
            'utm_source' => $this->utm_source,
            'utm_medium' => $this->utm_medium,
            'utm_campaign' => $this->utm_campaign,
            'utm_term' => $this->utm_term,
            'utm_content' => $this->utm_content,
            'utm_source_platform' => $this->utm_source_platform,
            'utm_creative_format' => $this->utm_creative_format,
            'utm_marketing_tactic' => $this->utm_marketing_tactic,
        ]);

        $filtered = $collection->reject( function( $value, $key ) {
            return ($value === '' || $value === null);
        });

        $query = http_build_query($filtered->toArray());

        return $this->destination . '?' . $query;
    }
}
