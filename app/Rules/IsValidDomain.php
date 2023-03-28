<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Pdp\Domain;
use Pdp\Rules;
use Pdp\SyntaxError;

class IsValidDomain implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $domain = Domain::fromIDNA2008($value);
        } catch (SyntaxError $e) {
            $fail($e->getMessage());
        }
    }
}
