<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Isbn implements InvokableRule
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
        $isbns = explode(';', $value);

        foreach ($isbns as $isbn) {
            if (!preg_match('/^(?=[0-9]*$)(?:.{10}|.{13})$/', $isbn)) {
                $fail('The :attribute number(s) must be 10 or 13 digits long');
            }
        }
    }
}
