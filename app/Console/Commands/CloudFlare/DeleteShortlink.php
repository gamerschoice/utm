<?php

namespace App\Console\Commands\Cloudflare;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Services\Cloudflare;
use App\Exceptions\CloudflareException;

class DeleteShortlink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloudflare:delete-shortlink {shortlink}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete shortlink by key (shortlink url)';

    /**
     * Execute the console command.
     */
    public function handle(Cloudflare $cloudflare): void
    {
        $shortlink = $this->argument('shortlink');
        $response = $cloudflare->deleteShortlink( $shortlink );
        dd($response);
    }
}
