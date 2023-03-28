<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Domain;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Events\BulkLinksCreated;

class RenameDomainLinks implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Domain $domain;
    public string $newDomain;

    /**
     * Create a new job instance.
     */
    public function __construct(Domain $domain, string $newDomain)
    {
        $this->domain = $domain;
        $this->newDomain = $newDomain;
    }

    public function uniqueId()
    {
        return $this->domain->id;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {

        try {
            DB::beginTransaction();

            DB::update(
                'UPDATE links SET destination = REPLACE(destination, ?, ?) where domain_id = ?',
                [
                   $this->domain->domain,
                   $this->newDomain,
                   $this->domain->id
                ]
            );

            DB::commit();

            if( 
                $this->domain->shortdomain && 
                $this->domain->shortdomain->status === 'active') {

                $links = $this->domain->links;
                
                BulkLinksCreated::dispatch($links);

            }


        } catch (QueryException $e) {
            DB::rollback();
        }
    

    
    }
}
