<?php

namespace App\Helpers;

class Helper{
    public static function unserialize_Ajax_Data($req)
    {
        $data = [];
        parse_str($req,$data);
        return $data;
    }
}