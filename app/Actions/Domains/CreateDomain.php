<?php

namespace App\Actions\Domains;

use App\Models\Domain;
use App\Models\Team;
use App\Models\ActiveDnsVerification;
use App\Jobs\VerifyDnsRecords;
use App\Normalizers\DomainNormalizer;
use App\Exceptions\DomainLimitException;

class CreateDomain
{
    public function __construct(DomainNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function create(string $domainName, Team $team)
    {
        if($team->canRegisterDomain()) {
            return $team->domains()->create([
                'domain' => $this->normalizer->normalize($domainName),
                'dns_configured' => false
            ]);
        } else {
            throw new DomainLimitException($team);
        }
    }
}