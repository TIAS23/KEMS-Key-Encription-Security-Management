<?php

namespace App\Helpers;

class Helper
{
    public static function IDGenerator($model, $trow, $length = 4, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first();

        if (!$data) {
            $og_length = $length;
            $last_number = '';
        } else {
            $code = substr($data->$trow, strlen($prefix) + 1);
            $actual_last_number = (int)$code;
            $incremented_last_number = $actual_last_number + 1;
            $last_number_length = strlen($incremented_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $incremented_last_number;
        }
        $zeros = "";
        for($i=0;$i<$og_length;$i++){
            $zeros.= "0";
        }
        return $prefix . "-" . $zeros . $last_number;
    }
}
?>
