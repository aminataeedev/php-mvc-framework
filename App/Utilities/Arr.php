<?php

namespace App\Utilities;

class Arr
{
    public static function prettify($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
    public static function toLower($arr) {
        return array_map('strtolower', $arr);
    }
}