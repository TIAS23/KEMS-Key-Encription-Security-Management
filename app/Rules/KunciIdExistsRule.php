<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\GKunci;

class KunciIdExistsRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if there is at least one record in the sentrals table where id matches the given value
        return GKunci::where('id', $value)->exists();
    }

    public function message()
    {
        return 'The selected kunci id does not exist.';
    }
}
