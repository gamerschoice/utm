<?php

namespace App\Actions\Domains;

use App\Models\Domain;
use App\Models\Team;
use App\Models\ActiveDnsVerification;
use App\Jobs\VerifyDnsRecords;
use App\Normalizers\DomainNormalizer;
use App\Exceptions\DomainLimitException;
use App\Services\CloudFlare;

class AttachShortlinkDomain
{

    protected DomainNormalizer $normalizer;
    protected CloudFlare $cloudflare;

    public function __construct(DomainNormalizer $normalizer, CloudFlare $cloudflare)
    {
        $this->normalizer = $normalizer;
        $this->cloudflare = $cloudflare;
    }

    public function preAttach(Domain $domain, string $shortlink_domain)
    {
        /**
         * 
         * validate $shortlink_domain string? i.e. remove unacceptable characters
         * 
         * $domain->shortlink_domain = $shortlink_domain;
         * $domain->save();
         * 
         * $userRecordsToAdd = $cloudflare->createCustomHostname( $shortlink_domain );
         * 
         * ...
         */

    }


    /*
    public function create(string $domainName, Team $team)
    {
        if($team->canRegisterDomain()) {
            $team->domains()->create([
                'domain' => $this->normalizer->normalize($domainName),
                'dns_configured' => false
            ]);
        } else {
            throw new DomainLimitException($team);
        }
    }
    */
}