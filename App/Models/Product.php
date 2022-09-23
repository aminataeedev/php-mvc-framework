<?php

namespace App\Models;

use App\Models\Contracts\JSONBaseModel;

class Product extends JSONBaseModel
{
    protected $table = 'products';

    public function __construct()
    {

    }
}