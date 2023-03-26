<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Carbon\Carbon;

class CloudFlare {

    #protected string $apiToken;
    #protected string $baseUrl;

    public function __construct(
        private readonly string $apiToken,
        private readonly string $baseUrl,
        private readonly string $zone,
    ) {}


    public function test() {

        //return $this->createCustomHostname('go4.ethptc.com');

        //return $this->cacheShortlink('https://go2.ethptc.com/XYZ2', 'https://utmwise.com/?utm_source=test&utm_medium=test');
    }

    public function createCustomHostname(string $hostname)
    {
        $url = $this->baseUrl . '/zones/' . $this->zone . '/custom_hostnames';

        $payload = [
            'hostname' => $hostname,
            'ssl' => [
                'bundle_method' => 'ubiquitous',
                'method' => 'txt',
                'type' => 'dv',
                'settings' => [
                    'ciphers' => ['ECDHE-RSA-AES128-GCM-SHA256', 'AES128-SHA'],
                    'early_hints' => 'off',
                    'http2' => 'on',
                    'min_tls_version' => '1.0',
                    'tls_1_3' => 'on'
                ],
                'wildcard' => false
            ]
        ];

        $response = Http::withToken( $this->apiToken )
            ->post( $url, $payload );

        return $this->handleResponse( $response );
    }

    public function createWorkerRoute( string $hostname )
    {
        $url = $this->baseUrl . '/zones/' . $this->zone . '/workers/routes';
        $response = Http::withToken( $this->apiToken )
                        ->post( $url, [
                            'pattern' => $hostname . '/*',
                            'script' => 'utmwise-shortlinker'
                        ]);

        return $this->handleResponse( $response );
    }

    public function deleteWorkerRoute( string $worker_route_id )
    {
        $url = $this->baseUrl . '/zones/' . $this->zone . '/workers/routes/' . $worker_route_id;
        $response = Http::withToken( $this->apiToken )
                        ->delete( $url );

        return $this->handleResponse( $response );
    }

    public function listCustomHostnames()
    {
        $url = $this->baseUrl . '/zones/' . $this->zone . '/custom_hostnames';
        $response = Http::withToken( $this->apiToken )
                        ->get( $url );

        
        return $this->handleResponse( $response );
    }

    public function getCustomHostname( string $identifier )
    {
        $url = $this->baseUrl . '/zones/' . $this->zone . '/custom_hostnames/' . $identifier;
        $response = Http::withToken( $this->apiToken )
                        ->get( $url );

        return $this->handleResponse( $response );
    }

    /**
     * deletes custom hostname from cloudflare and any issued certificates
     */
    public function deleteCustomHostname( string $identifier )
    {
        $url = $this->baseUrl . '/zones/' . $this->zone . '/custom_hostnames/' . $identifier;
        $response = Http::withToken( $this->apiToken )
                        ->delete( $url );

        return $this->handleResponse( $response );
    }



    public function cacheShortlink( string $shortlink_url, string $destination_url )
    {
        $url = $this->baseUrl . '/accounts/' . config('services.cloudflare.accountId') . '/storage/kv/namespaces/' . env('CF_WORKER_KV_NAMESPACE') . '/values/' . urlencode($shortlink_url);
        $response = Http::withToken( $this->apiToken )
                        ->put( $url, [
                            'metadata' => [ 'created_at' => Carbon::now() ],
                            'value' => $destination_url
                        ]);

        return $this->handleResponse( $response );
    }

    public function deleteShortlink(string $shortlink_url)
    {
        $url = $this->baseUrl . '/accounts/' . config('services.cloudflare.accountId') . '/storage/kv/namespaces/' . env('CF_WORKER_KV_NAMESPACE') . '/values/' . urlencode($shortlink_url);
        $response = Http::withToken( $this->apiToken )
                        ->delete( $url );

        return $this->handleResponse( $response );
    }


    protected function handleResponse( Response $response )
    {
        $response->throwUnlessStatus(200);
        return $response->json();
    }

}