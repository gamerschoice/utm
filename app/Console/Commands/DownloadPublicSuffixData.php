<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Exception;

class DownloadPublicSuffixData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-public-suffix-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Downloads the Public Suffix Data from Mozilla and stores it to S3';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $response = Http::get('https://publicsuffix.org/list/public_suffix_list.dat');

        if(! Storage::put('suffixes.txt', $response->body())) {
            throw Exception("Unable to store Public Suffix list.");
        }
    }
}
