<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;
use App\Models\tbkegiatanModel;
use App\Models\zakatModel;
use App\Models\infakanakyatimModel;

class dashboardSuper extends BaseController
{
    public function index()
    {
        return view('superAdmin/dashboard');
    }
}
