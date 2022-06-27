<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidExpression implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
	    $par_open = substr_count($value, '(');
	    $par_close = substr_count($value, ')');

	    if ($par_open === $par_close) {
		    return true;
	    } else {
			return false;
	    }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'L\'espressione non è valida.';
    }
}
