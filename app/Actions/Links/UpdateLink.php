<?php

namespace App\Actions\Links;

use App\Models\Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use App\Services\Cloudflare;

class UpdateLink
{

    protected $cloudflare;

    public function __construct( Cloudflare $cloudflare ) {

        $this->cloudflare = $cloudflare;

    }

    public function update(Link $link)
    {

        try {

            /** 
             * ONLY want to call cloudflare update
             * IF any field EXCEPT notes is updated
             * i.e. if ONLY the notes field is updated, who cares
             * = cut down on pointless API calls and KV i/o usage
             * */

             $dirty = $link->isDirty([
                'destination', 'utm_source', 'utm_medium',
                'utm_campaign', 'utm_term', 'utm_content', 'utm_source_platform',
                'utm_creative_format', 'utm_marketing_tactic'
             ]);

            if($dirty && $link->domain->shortdomain && $link->domain->shortdomain->status === 'active') {
                $this->cloudflare->cacheShortlink( $link );
            }

            $link->save();

            return $link;

        } catch (QueryException $e) {

            return false;

        }
    }
}