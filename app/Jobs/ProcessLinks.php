<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Link;
use App\Jobs\LinkHealth;

class ProcessLinks implements ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, SerializesModels;


    public function __construct()
    {
        
    }


    /**
     * Execute the job.
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
