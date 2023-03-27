<?php

namespace App\Normalizers;

use Pdp\Domain;
use Pdp\Rules;
use Pdp\TopLevelDomains;

class DomainNormalizer
{
    public function normalize(string $domainName)
    {
        $parsed = parse_url($domainName);
        $domain = Domain::fromIDNA2008($parsed['host']);

        $suffixList = Rules::fromPath(storage_path('app/suffixes.txt'));

        $result = $suffixList->resolve($domain);

        return $result->registrableDomain()->toString();
    }
}