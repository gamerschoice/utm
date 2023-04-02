<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Link;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Carbon\Carbon;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;


class LinkHealth implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $link;
    /**
     * Create a new job instance.
     */
    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $response = Http::connectTimeout(3)->head( $this->link->destination );
            $this->link->health_status_code = $response->status();
        } catch(ConnectionException|RequestException $e) {
            $this->link->health_status_code = 0;
        }
        
        $this->link->health_checked_at = Carbon::now();
        $this->link->save();

    }

    public function uniqueId(): string
    {
        return $this->link->id;
    }
}
