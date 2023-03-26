<?php

namespace App\Actions\Links;

use App\Models\Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Http\Client\RequestException;
use App\Services\CloudFlare;

class DeleteLink
{

    protected $cloudflare;

    public function __construct( CloudFlare $cloudflare ) {
        $this->cloudflare = $cloudflare;
    }

    public function delete(Link $link)
    {

        try {
            $this->cloudflare->deleteShortlink( $link->shortlink_url );
        } catch (RequestException $e) {
            return false;
        }

        $link->delete();

        return true;

    }
    
}