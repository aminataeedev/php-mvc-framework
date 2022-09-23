<?php

namespace App\Models;

use App\Models\Contracts\MySQLBaseModal;

class User extends MySQLBaseModal
{
    protected $table = 'users';
    protected $primary_key = 'id';
}