<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;
use App\Models\tbkegiatanModel;

class profile extends BaseController
{
    protected $dbdatamasjidModel;
    protected $tbkegiatanModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->dbdatamasjidModel = new dbdatamasjidModel();
        $this->tbkegiatanModel = new tbkegiatanModel();
    }

    public function index()
    {
        try {
            // Mengambil data dari kedua tabel
            $db_data_masjid = $this->dbdatamasjidModel->findAll();
            $tb_kegiatan = $this->tbkegiatanModel->findAll();
            $tipe_postingan_list = $this->tbkegiatanModel->getUniqueTipePostingan();

            // Debugging: Log the data to see if it's being fetched correctly
            log_message('debug', 'db_data_masjid: ' . print_r($db_data_masjid, true));
            log_message('debug', 'tb_kegiatan: ' . print_r($tb_kegiatan, true));

            // Menggabungkan data dalam satu array
            $data = [
                'title' => 'Daftar Masjid dan Postingan',
                'db_data_masjid' => $db_data_masjid,
                'tb_kegiatan' => $tb_kegiatan,
                'tipe_postingan_list' => $tipe_postingan_list, // Menambahkan tipe postingan ke data
            ];

            return view('userprofile/profile', $data);
        } catch (\Exception $e) {
            // Log the error message
            log_message('error', $e->getMessage());
            // Show a custom error page
            return view('errors/custom_error', ['message' => $e->getMessage()]);
        }
    }

    public function details($slug)
    {
        echo $slug;
    }
}
