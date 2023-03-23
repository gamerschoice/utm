<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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
