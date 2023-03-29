<?php

namespace App\Actions\Domains;

use App\Models\Domain;
use App\Services\Cloudflare;

class DeleteShortDomain
{

    protected $cloudflare;

    public function __construct(Cloudflare $cloudflare)
    {
        $this->cloudflare = $cloudflare;
    }

    /** 
     * works, but..
     *  @todo refactor with jobs in a queue?
     * clear any existing createHostname etc related jobs in queue?
     */
    public function delete(Domain $domain)
    {

        if(!$domain->shortdomain)
            return false;


        $this->cloudflare->deleteCustomHostname( $domain->shortdomain->cf_host_identifier );

        if($domain->shortdomain->status === 'active') {

            $keys = [];
            foreach($domain->links as $link)
            {
                $keys[] = $link->auto_url;
            }

            if($domain->shortdomain->cf_route_identifier)
                $this->cloudflare->deleteWorkerRoute( $domain->shortdomain->cf_route_identifier );
            
            if(!empty($keys))
                $this->cloudflare->bulkDeleteShortlinks( $keys );

        }

        $domain->shortdomain->delete();


    }
}