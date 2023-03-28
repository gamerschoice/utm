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

        $array = [];

        if( ! $event->links )
            return true;


        foreach($event->links as $link)
        {
            if( ! $link->domain->shortdomain || $link->domain->shortdomain->status !== 'active' )
                continue;

            $array[] = [ 'key' => $link->auto_url, 'value' => $link->full_url ];
        }

        if( empty( $array ) )
            return true;

        try {
            $this->cloudflare->bulkCacheShortlinks( $array );
        
        } catch( RequestException $e ) {

        }

    }
}
