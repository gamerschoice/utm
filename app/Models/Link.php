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

    public function getAutoUrlAttribute()
    {

        if($this->domain->dns_configured && $this->domain->shortlink_domain) {

            return 'https://' . $this->domain->shortlink_domain . '/' . $this->shortlink;

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
}
