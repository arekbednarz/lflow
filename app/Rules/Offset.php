<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Offset implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (is_numeric($value) && !($value % 20 == 0)) {
            $fail('The :attribute must be a multiple of 20');
        }
    }
}
