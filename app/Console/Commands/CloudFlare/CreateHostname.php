<?php

namespace App\Console\Commands\Cloudflare;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Services\Cloudflare;
use App\Exceptions\CloudflareException;

class CreateHostname extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloudflare:create-hostname {hostname}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create custom hostname and generate TLS';

    /**
     * Execute the console command.
     */
    public function handle(Cloudflare $cloudflare): void
    {
        $hostname = $this->argument('hostname');
        $response = $cloudflare->createCustomHostname( $hostname );
        dd($response);
    }
}
