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
    
        DB::update(
            'UPDATE links SET destination = REPLACE(destination, ?, ?) where domain_id = ?',
            [
               $this->domain->domain,
               $this->newDomain,
               $this->domain->id
            ]
        );
    
    }
}
