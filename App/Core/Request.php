<?php

namespace App\Core;

class Request
{
    private $params;
    private $agent;
    private $ip;
    private $method;

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
    }

    public function __get(string $key)
    {
        return $this->input($key);
    }

    public function input($key): string|null
    {
        return $this->params[$key] ?? null;
    }

    public function isset($key)
    {
        return isset($this->params[$key]);
    }

    public function params(): array
    {
        return $this->params;
    }

    public function agent(): string
    {
        return $this->agent;
    }

    public function method(): string
    {
        return $this->method;
    }

    public function ip(): string
    {
        return $this->ip;
    }

    public function redirect($route)
    {
        header('Location: ' . site_url($route));
        die();
    }
}