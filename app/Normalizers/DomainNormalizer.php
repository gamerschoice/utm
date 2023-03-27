<?php

namespace App\Normalizers;

use Pdp\Domain;
use Pdp\Rules;
use Pdp\TopLevelDomains;

class DomainNormalizer
{
    public function normalize(string $domainName)
    {
        $domain = Domain::fromIDNA2008($domainName);

        $suffixList = Rules::fromPath(Storage::get('suffixes.txt'));

        $result = $suffixList->resolve($domain);

        return $result->registrableDomain()->toString();
    }
}