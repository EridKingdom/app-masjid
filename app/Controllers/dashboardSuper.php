<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;
use App\Models\PengajuanPerubahanModel;
use App\Models\tbkegiatanModel;
use App\Models\UserModel;
use App\Models\zakatModel;
use App\Models\infakanakyatimModel;

class dashboardSuper extends BaseController
{
    public function index()
    {
        $modelUser =  new UserModel();
        $modelPengajuan = new PengajuanPerubahanModel();
        $pendaftaran =  $modelUser->where('status', 'pendaftaran')->orWhere('status', 'block')->countAllResults();
        $pengajuan =  $modelPengajuan->where('status', 'pengajuan')->countAllResults();
        $terdaftar = $modelUser->where('status', 'diterima')->countAllResults();
        $data = [
            'pendaftaran' => $pendaftaran,
            'pengajuan' => $pengajuan,
            'terdaftar' => $terdaftar
        ];
        return view('superAdmin/dashboard', $data);
    }
}
