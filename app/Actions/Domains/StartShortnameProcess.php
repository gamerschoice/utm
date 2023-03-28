<?php

namespace App\Actions\Domains;

use App\Models\Domain;
use App\Enums\ShortdomainStatus;
use App\Services\CloudFlare;
use App\Exceptions\CloudflareException;
use Exception;
use Filament\Notifications\Notification;
use App\Jobs\VerifyShortDomain;

class StartShortnameProcess
{
    public $cloudflare;

    public function __construct(CloudFlare $cloudflare)
    {
        $this->cloudflare = $cloudflare;
    }

    public function start(Domain $domain, string $host)
    {
        try {
            $result = $this->cloudflare->createCustomHostname($host);

            $cf_host_identifier = $result['result']['id'];
            $dns_status = $result['result']['status'];

            $shortdomain = $domain->shortdomain()->firstOrCreate([
                'host' => $host,
                'status' => $dns_status,
                'cf_host_identifier' => $cf_host_identifier,
            ]);

            VerifyShortDomain::dispatch($shortdomain);

            return $shortdomain;
        } catch (CloudflareException $e) {
            Notification::make() 
                ->title('Unable to configure short domain.')
                ->body($e->getMessage())
                ->warning()
                ->send(); 
        }
    }
}