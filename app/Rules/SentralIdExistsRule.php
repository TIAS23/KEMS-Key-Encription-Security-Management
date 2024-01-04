<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Sentral;

class SentralIdExistsRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if there is at least one record in the sentrals table where id matches the given value
        return Sentral::where('id', $value)->exists();
    }

    public function message()
    {
        return 'The selected sentral id does not exist.';
    }
}
