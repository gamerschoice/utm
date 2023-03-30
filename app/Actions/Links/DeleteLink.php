<?php

namespace App\Actions\Links;

use App\Models\Link;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\RequestException;
use App\Services\Cloudflare;

class DeleteLink
{

    protected $cloudflare;

    public function __construct( Cloudflare $cloudflare ) {
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

        return Link::whereIn('id', $link_ids)->delete();

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