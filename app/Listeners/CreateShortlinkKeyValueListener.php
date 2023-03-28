<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Cloudflare;
use AWS\CRT\HTTP\Request;
use Illuminate\Http\Client\RequestException;

class CreateShortlinkKeyValueListener
{

    protected $cloudflare;
    /**
     * Create the event listener.
     */
    public function __construct(Cloudflare $cloudflare)
    {
        $this->cloudflare = $cloudflare;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event)
    {

        if( ! $event->link->domain->shortdomain || $event->link->domain->shortdomain->status !== 'active' )
            return true;


        try {
            $this->cloudflare->cacheShortlink( $event->link );
        
        } catch( RequestException $e ) {

        }

    }
}
