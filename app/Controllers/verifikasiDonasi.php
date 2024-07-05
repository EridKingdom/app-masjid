<?php

namespace App\Controllers;

use App\Models\kasmasjidModel;
use App\Models\dbdatamasjidModel;
use App\Models\DonasiModel;
use App\Models\tbkegiatanModel;
use App\Models\zakatModel;
use App\Models\infakanakyatimModel;

class verifikasiDonasi extends BaseController
{
    protected $dbdatamasjidModel;
    protected $zakatModel;
    protected $donasiModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->dbdatamasjidModel = new dbdatamasjidModel();
        $this->zakatModel = new zakatModel();
        $this->donasiModel = new DonasiModel();
    }

    public function index()
    {
        // Mengambil data dari ketiga tabel
        $db_data_masjid = $this->dbdatamasjidModel->findAll();
        $zakat = $this->zakatModel->findAll();
        $donasi = $this->donasiModel->findAll();

        // Menggabungkan data dalam satu array
        $data = [
            'title' => 'verifikasi Pembayaran Zakat',
            'db_data_masjid' => $db_data_masjid,
            'zakat' => $zakat,
            'donasi' => $donasi, // Menambahkan data donasi
        ];

        // Mengirim data ke view
        return view('userprofile/verifikasiDonasi', $data);
    }
}
