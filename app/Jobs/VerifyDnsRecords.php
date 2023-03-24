<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Domain;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class VerifyDnsRecords implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Domain $domain;

    /**
     * The number of seconds after which the job's unique lock will be released.
     *
     * @var int
     */
    public $uniqueFor = 3600;

    /**
     * Create a new job instance.
     */
    public function __construct(Domain $domain)
    {
        $this->domain = $domain;
    }

    public function uniqueId()
    {
        return $this->domain->id;
    }

    /**
    * Calculate the number of seconds to wait before retrying the job.
    *
    * @return array<int, int>
    */
    public function backoff(): array
    {
        return [60, 300, 900, 3600];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // php artisan app:dns-lookup
        $exitCode = Artisan::call('app:dns-lookup', [
            'host' => $this->cleanHost($this->domain)
        ]);

        if($exitCode === 0) {
            $this->domain->update([
                'dns_configured' => true
            ]);

            $this->domain->dnsVerification->update([
                'status' => 'Verified'
            ]);
        }
    }

    public function cleanHost(Domain $domain)
    {
        /*
        $host = parse_url($domain->shortlink_domain)['host'];

        if(Str::startsWith($host, 'www.')) {
            return Str::substr($host, 4);
        }

        return $host;
        */

        return $domain->shortlink_domain;
    }
}
