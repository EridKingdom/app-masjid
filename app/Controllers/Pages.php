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
        $zakat = $this->zakatModel->select('zakat.id_beras, id_zakat, zakat.id_masjid, tgl, keterangan, nominal, beras_zakat.jenis_beras, db_data_masjid.nama_masjid')
            ->join('beras_zakat', 'beras_zakat.id_beras = zakat.id_beras')
            ->join('db_data_masjid', 'db_data_masjid.id = zakat.id_masjid') // Tambahkan join ini
            ->findAll();

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

    public function searchMasjid()
    {
        $keyword = $this->request->getVar('keyword');
        $provinsi = $this->request->getVar('provinsi');
        $kota = $this->request->getVar('kota');

        $db = \Config\Database::connect();
        $builder = $db->table('db_data_masjid');
        $builder->select('db_data_masjid.*, user.status, user.nama_pengurus');
        $builder->join('user', 'user.id_user = db_data_masjid.id_user');
        $builder->where('user.status', 'diterima');

        if ($keyword) {
            $builder->like('db_data_masjid.nama_masjid', $keyword);
        }
        if ($provinsi) {
            $builder->like('db_data_masjid.provinsi', $provinsi);
        }
        if ($kota) {
            $builder->like('db_data_masjid.kota_kab', $kota);
        }

        $query = $builder->get();
        $db_data_masjid = $query->getResultArray();

        $data = [
            'title' => 'Daftar Masjid',
            'db_data_masjid' => $db_data_masjid,
            'showSearch' => true
        ];

        return view('pencarianmasjid/tbmasjid', $data);
    }
}
