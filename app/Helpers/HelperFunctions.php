<?php

namespace App\Helpers;

class HelperFunctions
{
    public static function generateRandomNumber($length = 4)
    {
        $numbers = '0123456789';
        $numbersLength = strlen($numbers);
        $randomNumber = '';

        for ($i = 0; $i < $length; $i++) {
            $randomNumber .= $numbers[random_int(0, $numbersLength - 1)];
        }

        return $randomNumber;
    }
}
