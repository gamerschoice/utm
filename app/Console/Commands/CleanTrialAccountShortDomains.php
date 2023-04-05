<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\DeleteShortDomain as DeleteShortDomainJob;
use App\Models\Team;
use App\Models\Domain;

class CleanTrialAccountShortDomains extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-trial-account-short-domains';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Triggers a clean up process for any short domains that are on trial accounts that did not subscribe.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Team::with('domains.shortdomain')->where('plan_id', null)->get()->each(function (Team $team) {
            $team->domains->each(function (Domain $domain) {
                if($domain->shortdomain) {
                    DeleteShortDomainJob::dispatch($domain);
                }
            });
        });
    }
}
