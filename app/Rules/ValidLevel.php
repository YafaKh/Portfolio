<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class ValidLevel implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  string  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if ($value !== 'Beginner' && $value !== 'Intermediate' && $value !== 'Expert') {
            $fail('This is not a valid level option!');
        }
    }
}
