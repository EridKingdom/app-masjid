<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;
use App\Models\tbkegiatanModel;
use App\Models\zakatModel;
use App\Models\infakanakyatimModel;

class Pages extends BaseController
{
    protected $dbdatamasjidModel;
    protected $tbkegiatanModel;
    protected $zakatModel;
    protected $infakanakyatimModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->dbdatamasjidModel = new dbdatamasjidModel();
        $this->tbkegiatanModel = new tbkegiatanModel();
        $this->zakatModel = new zakatModel();
        $this->infakanakyatimModel = new infakanakyatimModel();
    }

    public function index()
    {
        // Mengambil data dari kedua tabel
        $db_data_masjid = $this->dbdatamasjidModel->findAll();
        $kegiatanWithMasjid = $this->tbkegiatanModel->getKegiatanWithMasjid();

        // Mengurutkan data berdasarkan yang terbaru
        usort($kegiatanWithMasjid, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        // Menggabungkan data dalam satu array
        $data = [
            'title' => 'Daftar Masjid dan Postingan',
            'db_data_masjid' => $db_data_masjid,
            'kegiatanWithMasjid' => $kegiatanWithMasjid,
            'showSearch' => true
        ];

        // Mengirim data ke view
        return view('index', $data);
    }

    public function zakat()
    {
        $zakat = $this->zakatModel->findAll();

        // Menggabungkan data dalam satu array
        $data = [
            'title' => 'Daftar Zakat',
            'zakat' => $zakat,
            'showSearch' => false
        ];
        return view('zakat', $data);
    }

    public function infakyatim()
    {
        $infak_anak_yatim = $this->infakanakyatimModel->findAll();

        // Menggabungkan data dalam satu array
        $data = [
            'title' => 'Daftar Infak Anak yatim',
            'infak_anak_yatim' => $infak_anak_yatim,
            'showSearch' => false
        ];
        return view('infakyatim', $data);
    }
    public function details($slug)
    {
        echo $slug;
    }
}
