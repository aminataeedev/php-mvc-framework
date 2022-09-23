<?php

use App\Middleware\Contract\MiddlewareInterface;

class BlockFireFox implements MiddlewareInterface
{
    public function handle()
    {
        global $request;
        var_dump($request);
    }
}