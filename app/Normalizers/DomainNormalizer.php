<?php

namespace App\Normalizers;

use Pdp\Domain;
use Pdp\Rules;
use Pdp\TopLevelDomains;
use Illuminate\Support\Facades\Storage;

class DomainNormalizer
{
    public function normalize(string $domainName)
    {
        $domain = Domain::fromIDNA2008($domainName);

        $suffixList = Rules::fromString(Storage::get('suffixes.txt'));

        $result = $suffixList->resolve($domain);

        return $result->registrableDomain()->toString();
    }
}