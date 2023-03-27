<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\CloudFlare;
use App\Models\Shortdomain;
use Exception;

class VerifyShortDomain implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $cloudflare;

    public $uniqueFor = 3600;

    public $shortdomain;
 
    /**
     * The unique ID of the job.
     */
    public function uniqueId(): string
    {
        return $this->shortdomain->id;
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
     * Create a new job instance.
     */
    public function __construct(Shortdomain $shortdomain)
    {
        $this->shortdomain = $shortdomain;
    }

    /**
     * Execute the job.
     */
    public function handle(CloudFlare $cloudflare): void
    {
        $data = $cloudflare->getCustomHostname($this->shortdomain->cf_host_identifier);

        if($data['result']['status'] == 'active') {
            $this->setupWorkerRoutes($cloudflare);
        } else {
            throw new Exception();
        }
    }

    private function setupWorkerRoutes(Cloudflare $cloudflare)
    {
        $result = $cloudflare->createWorkerRoute($this->shortdomain->host);

        $this->shortdomain->update([
            'cf_route_identifier' => $result['result']['id'],
            'status' => 'active'
        ]);
    }
}
