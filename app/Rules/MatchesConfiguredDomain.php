<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Team;
use Illuminate\Support\Str;

class MatchesConfiguredDomain implements ValidationRule
{

    public function __construct()
    {
    
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        /**
         * @todo refactor
         */

        /*
        $configuredHost = parse_url($this->team->website)['host'];
        $desinationHost = parse_url($value);

        if(! array_key_exists('host', $desinationHost)) {
            $fail('The :attribute was not a viable URL.');
        }

        if(! Str::endsWith($configuredHost, $desinationHost['host']))
        {
            $fail("The :attribute was not on {$configuredHost}.");
        }
        */
    }
}
