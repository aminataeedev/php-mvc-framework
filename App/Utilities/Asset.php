<?php

namespace App\Utilities;
class Asset
{
    public static function get(string $fileName): string
    {
        return BASE_PATH . '/assets/' . $fileName;
    }

    public static function css(string $fileName): string
    {
        return BASE_PATH . '/assets/css/' . $fileName;
    }

    public static function js(string $fileName): string
    {
        return BASE_PATH . '/assets/js/' . $fileName;
    }

    public static function img(string $fileName): string
    {
        return BASE_PATH . '/assets/image/' . $fileName;
    }
}