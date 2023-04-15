<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\Cloudflare;
use App\Events\BulkLinksCreated;
use App\Models\ShortDomain;
use App\Actions\Links\CreateLink;
use Illuminate\Support\Facades\Mail;
use App\Mail\DnsVerified;
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
    public function __construct(ShortDomain $shortdomain)
    {
        $this->shortdomain = $shortdomain;
    }

    /**
     * Execute the job.
     */
    public function handle(Cloudflare $cloudflare, CreateLink $creator ): void
    {
        $data = $cloudflare->getCustomHostname($this->shortdomain->cf_host_identifier);

        if($data['result']['status'] == 'active') {
            $this->setupWorkerRoutes($cloudflare);
            $this->cacheDomainShortlinks($this->shortdomain);

            $user = $this->shortdomain->domain->team->owner;
            Mail::to($user->email)->send(new DnsVerified( $this->shortdomain->host ));

        } else {
            throw new Exception("Short Domain not active yet, will retry.");
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

    private function cacheDomainShortlinks(ShortDomain $shortdomain)
    {
    
        $links = $shortdomain->domain->links->chunk(10000);
        foreach($links as $chunk) {
            BulkLinksCreated::dispatch($chunk);
        }
        
    }
}
