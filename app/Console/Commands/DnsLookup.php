<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Str;


class DnsLookup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dns-lookup {host}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Look up DNS for a given team and verify that the CNAME Record exists.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $host = $this->argument('host');

        $process = Process::run("dig go.{$host} A +short");

        if($process->seeInOutput('connection timed out;')) {
            throw new Exception;
        }

        if($process->seeInOutput(config('services.redirection.ip'))) {
            return $this->exitCode();
        }

        return 1;
    }
}
