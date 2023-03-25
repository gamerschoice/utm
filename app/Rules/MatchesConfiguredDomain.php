<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Domain;
use Illuminate\Support\Str;

class MatchesConfiguredDomain implements ValidationRule
{

    public $domain;

    public function __construct( $domain )
    {
        $this->domain = $domain;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $configuredDomain = $this->domain->domain;
        $desinationHost = parse_url($value);

        if(! array_key_exists('host', $desinationHost)) {
            $fail('The :attribute was not a viable URL.');
        } else {

            if(! Str::endsWith($configuredDomain, $desinationHost['host']))
            {
                $fail("The :attribute was not on {$configuredDomain}.");
            }
        
        }
      
    }
}
