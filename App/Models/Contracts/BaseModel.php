<?php

namespace App\Models\Contracts;

abstract class BaseModel implements CRUDInterface
{
    public $attributes = [];
    protected $connection;
    protected $table;
    protected $page_size = 15;
    protected $primary_key;

    public function __construct()
    {

    }

    public function getAllAttributes()
    {
        return $this->attributes;
    }

    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    public function __set($key, $value)
    {
        if (!$key or !array_key_exists($key, $this->attributes)) return false;
        $this->attributes[$key] = $value;
    }

    public function getAttribute($key)
    {
        if (!$key or !array_key_exists($key, $this->attributes)) return null;
        return $this->attributes[$key];
    }
}
