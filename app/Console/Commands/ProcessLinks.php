<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Exception;
use App\Models\Link;
use App\Jobs\LinkHealth;

class ProcessLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-links';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Processes each link in the database and dispatches jobs (i.e. LinkHealth)';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $links = Link::all();
        foreach($links as $link)
        {
            LinkHealth::dispatch( $link );
        }
    }
}
