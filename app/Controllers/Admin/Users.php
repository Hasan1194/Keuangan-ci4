<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
