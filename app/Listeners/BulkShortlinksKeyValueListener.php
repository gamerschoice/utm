<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Cloudflare;
use AWS\CRT\HTTP\Request;
use Illuminate\Http\Client\RequestException;

class BulkShortlinksKeyValueListener
{

    protected Cloudflare $cloudflare;
    
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

            $links = collect($array)->chunk(10000);
            foreach($links as $chunk) {
                $this->cloudflare->bulkCacheShortlinks( $chunk->toArray() );
            }
        
        } catch( RequestException $e ) {
            
        }

    }
}
