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

    /**
     * array of shortlink urls with link id as key
     */
    public function bulkDelete(array $links)
    {

        $link_ids = array_keys($links);
        $shortlink_urls = array_values($links);

        try {
            $this->cloudflare->bulkDeleteShortlinks( $shortlink_urls );
        } catch( RequestException $e ) {
            return false;
        }

        Link::whereIn('id', $link_ids)->delete();

    }

    public function delete(Link $link)
    {

        try {
            $this->cloudflare->deleteShortlink( $link->auto_url );
        } catch (RequestException $e) {
            return false;
        }

        $link->delete();

        return true;

    }

}