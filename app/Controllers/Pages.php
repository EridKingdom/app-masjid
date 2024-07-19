<?php

namespace App\Controllers;

use App\Models\DbDataMasjidModel;
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
        $this->dbdatamasjidModel = new DbDataMasjidModel();
        $this->tbkegiatanModel = new tbkegiatanModel();
        $this->zakatModel = new zakatModel();
        $this->infakanakyatimModel = new infakanakyatimModel();
    }

    public function index()
    {
        // Mengambil data masjid dengan status 'diterima'
        $db = \Config\Database::connect();
        $builder = $db->table('db_data_masjid');
        $builder->select('db_data_masjid.*, user.status');
        $builder->join('user', 'user.id_user = db_data_masjid.id_user');
        $builder->where('user.status', 'diterima');
        $query = $builder->get();
        $db_data_masjid = $query->getResultArray();

        // Mengambil data kegiatan
        $kegiatanWithMasjid = $this->tbkegiatanModel->getKegiatanWithMasjid();

        // Mengambil tipe postingan unik
        $tipe_postingan_list = $this->tbkegiatanModel->getUniqueTipePostingan();

        // Mengurutkan data berdasarkan yang terbaru
        usort($kegiatanWithMasjid, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        // Menggabungkan data dalam satu array
        $data = [
            'title' => 'Daftar Masjid dan Postingan',
            'db_data_masjid' => $db_data_masjid,
            'kegiatanWithMasjid' => $kegiatanWithMasjid,
            'tipe_postingan_list' => $tipe_postingan_list, // Menambahkan tipe postingan ke data
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
