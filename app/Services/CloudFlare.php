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
    ) {}


    public function test() {
        return $this->listCustomHostnames();
    }



    public function listCustomHostnames()
    {
        $response = Http::withToken( $this->apiToken )
                        ->get( $this->baseUrl . '/custom_hostnames');
        
        
        $response->throwUnlessStatus(200);

        $json = $response->json();
        $response->throwIf($json['success'] === false);

        return $json['result'];
    }

}