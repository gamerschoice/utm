<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\CloudFlare;
use AWS\CRT\HTTP\Request;
use Illuminate\Http\Client\RequestException;

class DeleteShortlinkKeyValueListener
{

    protected $cloudflare;
    /**
     * Create the event listener.
     */
    public function __construct(CloudFlare $cloudflare)
    {
        $this->cloudflare = $cloudflare;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event)
    {

        if( ! $event->link->domain->shortlink_domain )
            return true;

        try {
            $this->cloudflare->deleteShortlink( $event->link->auto_url );
        
        } catch( RequestException $e ) {

        }

    }
}
