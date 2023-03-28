<?php

namespace App\Actions\Domains;

use App\Models\Domain;
use App\Services\CloudFlare;

class DeleteShortDomain
{

    protected $cloudflare;

    public function __construct(CloudFlare $cloudflare)
    {
        $this->cloudflare = $cloudflare;
    }

    /** 
     * works, but..
     *  @todo refactor with jobs in a queue? error handling
     */
    public function delete(Domain $domain)
    {

        $keys = [];
        foreach($domain->links as $link)
        {
            $keys[] = $link->auto_url;
        }

        $this->cloudflare->deleteCustomHostname( $domain->shortdomain->cf_host_identifier );
        $this->cloudflare->deleteWorkerRoute( $domain->shortdomain->cf_route_identifier );
        
        if(!empty($keys))
            $this->cloudflare->bulkDeleteShortlinks( $keys );

        $domain->shortdomain->delete();


    }
}