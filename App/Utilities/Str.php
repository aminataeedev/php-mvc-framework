<?php

namespace App\Utilities;

class Str
{
    public static function prettify($arr) {
        echo '<pre>';
            print_r($arr);
        echo '</pre>';
    }
}