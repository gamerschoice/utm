<?php

namespace App\Console\Commands\Cloudflare;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Services\Cloudflare;
use App\Exceptions\CloudflareException;

class ListWorkerRoutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloudflare:list-worker-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List worker routes';

    /**
     * Execute the console command.
     */
    public function handle(Cloudflare $cloudflare): void
    {
        $response = $cloudflare->listWorkerRoutes();
        dd($response);
    }
}
