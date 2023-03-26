<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class CloudFlare {

    #protected string $apiToken;
    #protected string $baseUrl;

    public function __construct(
        private readonly string $apiToken,
        private readonly string $baseUrl,
        private readonly string $zone,
    ) {}


    public function test() {

        return $this->listCustomHostnames();
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

    protected function handleResponse( Response $response )
    {
        $response->throwUnlessStatus(200);
        return $response->json();
    }

}