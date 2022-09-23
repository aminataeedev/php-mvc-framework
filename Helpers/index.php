<?php

function site_url($route)
{
    return $_ENV['DOMAIN'] . $route;
}

function asset_url($route)
{
    return site_url('/Assets') . $route;
}

function view($file_name, $data = [])
{
    extract($data);
    $path = str_replace('.', '/', $file_name);
    include_once BASE_PATH . "views/$path.php";
}