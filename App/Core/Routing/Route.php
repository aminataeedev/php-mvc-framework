<?php

namespace App\Core\Routing;

class Route
{
    private static $routes = [];

    public static function get($uri, $action, $middlewares = [])
    {
        self::add('get', $uri, $action, $middlewares);
    }

    public static function add($methods, $uri, $action, $middlewares = [])
    {
        $_methods = is_array($methods) ? $methods : [$methods];
        self::$routes = [...self::$routes, ['methods' => $_methods, 'uri' => $uri, 'action' => $action, 'middlewares' => $middlewares]];
    }

    public static function post($uri, $action, $middlewares = [])
    {
        self::add('post', $uri, $action, $middlewares);
    }

    public static function put($uri, $action, $middlewares = [])
    {
        self::add('put', $uri, $action, $middlewares);
    }

    public static function delete($uri, $action, $middlewares = [])
    {
        self::add('delete', $uri, $action, $middlewares);
    }

    public static function options($uri, $action, $middlewares = [])
    {
        self::add('options', $uri, $action, $middlewares);
    }

    public static function routes()
    {
        return self::$routes;
    }
}
