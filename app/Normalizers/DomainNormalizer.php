<?php

namespace App\Normalizers;

use Pdp\Domain;
use Pdp\TopLevelDomains;

class DomainNormalizer
{
    public function normalize(string $domainName)
    {
        $parsed = parse_url($domainName);
        $domain = Domain::fromIDNA2008($parsed['host']);

        $tlds = TopLevelDomains::fromPath(storage_path('app/tlds.txt'));

        $result = $tlds->resolve($domain);

        return $result->registrableDomain()->toString();
    }
}