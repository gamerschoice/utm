<?php

namespace App\Actions\Links;

use App\Models\Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use App\Services\CloudFlare;

class UpdateLink
{

    protected $cloudflare;

    public function __construct( CloudFlare $cloudflare ) {

        $this->cloudflare = $cloudflare;

    }

    public function update(Link $link)
    {
        try {

            if($link->getOriginal('destination') !== $link->destination) {

                $this->cloudflare->cacheShortlink( $link );

            }

            $link->save();

            return $link;

        } catch (QueryException $e) {

            return false;

        }
    }
}