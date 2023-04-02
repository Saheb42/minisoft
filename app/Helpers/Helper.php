<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Helper{
    public static function get_count($t_name, $f_name, $f_value)
    {

        // dd($t_name.' - '.$f_name.' - '.$f_value);
        $data = DB::table($t_name)
        ->select(
            '*'
        )
        ->where($f_name, $f_value)
        ->get();

        return $data;
    }
}

