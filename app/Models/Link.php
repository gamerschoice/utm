<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'shortlink',
        'published'
    ];

    public function getFullUrlAttribute()
    {
        $query = http_build_query([
            'utm_source' => $this->utm_source,
            'utm_medium' => $this->utm_medium,
            'utm_campaign' => $this->utm_campaign,
            'utm_term' => $this->utm_term,
            'utm_content' => $this->utm_content
        ]);

        return $this->destination . '?' . $query;
    }
}
