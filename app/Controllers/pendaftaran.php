<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PendaftaranMasjidModel;
use CodeIgniter\Controller;


class Pendaftaran extends Controller
{
    public function pendaftaran()
    {
        return view('superAdmin/register');
    }

    public function pengajuan()
    {
        return view('superAdmin/ajukan');
    }
}
