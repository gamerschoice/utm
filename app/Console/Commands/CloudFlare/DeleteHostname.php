<?php

namespace App\Console\Commands\Cloudflare;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Services\Cloudflare;
use App\Exceptions\CloudflareException;

class DeleteHostname extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloudflare:delete-hostname {identifier}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete hostname and SSL by identifier';

    /**
     * Execute the console command.
     */
    public function handle(Cloudflare $cloudflare): void
    {
        $identifier = $this->argument('identifier');
        $response = $cloudflare->deleteCustomHostname( $identifier );
        dd($response);
    }
}
