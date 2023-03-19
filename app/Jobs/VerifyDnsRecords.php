<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Team;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class VerifyDnsRecords implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Team $team;

    /**
     * The number of seconds after which the job's unique lock will be released.
     *
     * @var int
     */
    public $uniqueFor = 3600;

    /**
     * Create a new job instance.
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function uniqueId()
    {
        return $this->team->id;
    }

    /**
    * Calculate the number of seconds to wait before retrying the job.
    *
    * @return array<int, int>
    */
    public function backoff(): array
    {
        return [60, 300, 900, 3600];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // php artisan app:dns-lookup
        $exitCode = Artisan::call('app:dns-lookup', [
            'host' => $this->cleanHost($this->team)
        ]);

        if($exitCode === 0) {
            $this->team->update([
                'dns_configured' => true
            ]);
        }
    }

    public function cleanHost(Team $team)
    {
        $host = parse_url($team->website)['host'];

        if(Str::startsWith($host, 'www.')) {
            return Str::substr($host, 4);
        }

        return $host;
    }
}
