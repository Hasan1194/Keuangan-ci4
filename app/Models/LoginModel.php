<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'admin';
    protected $allowedFields = ['nama','email', 'password'];
}
