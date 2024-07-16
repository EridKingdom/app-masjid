<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class lupa extends Controller
{
    public function index()
    {
        return view('auth/lupapassword');
    }

    public function lupa()
    {
        return view('superAdmin/resetpassword');
    }
}
