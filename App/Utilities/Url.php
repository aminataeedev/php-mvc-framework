<?php

namespace App\Utilities;

class Url {
    public static function current(): string {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }
    public static function get_query_params() {
        return $_SERVER['QUERY_STRING'];
    }
    public static function current_uri(): string {
        return $_SERVER['REQUEST_URI'];
    }
    public static function current_url(): string {
        return strtok(self::current_uri(), '?');
    }
}
