<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class checkEmailIsVaild implements Rule
{
    public function passes($attribute, $value)
    {
        return true;
    }
    public function message()
    {
        
    }
}
