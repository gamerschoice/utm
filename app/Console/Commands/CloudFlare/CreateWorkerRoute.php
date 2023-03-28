<?php

namespace App\Console\Commands\Cloudflare;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Services\Cloudflare;
use App\Exceptions\CloudflareException;

class CreateWorkerRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloudflare:create-worker-route {hostname}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create worker route for hostname';

    /**
     * Execute the console command.
     */
    public function handle(Cloudflare $cloudflare): void
    {
        $hostname = $this->argument('hostname');
        $response = $cloudflare->createWorkerRoute( $hostname );
        dd($response);
    }
}
