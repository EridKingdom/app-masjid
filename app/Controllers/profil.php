<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;
use App\Models\tbkegiatanModel;

class Profil extends BaseController
{
    protected $dbdatamasjidModel;
    protected $tbkegiatanModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->dbdatamasjidModel = new dbdatamasjidModel();
        $this->tbkegiatanModel = new tbkegiatanModel();
    }

    public function index($id = null)
    {
        try {
            if ($id !== null) {
                // Mengambil data masjid berdasarkan ID
                $masjid = $this->dbdatamasjidModel->orderBy('created_at', 'DESC')->find($id);

                if (!$masjid) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Masjid dengan ID ' . $id . ' tidak ditemukan');
                }

                // Mengambil kegiatan terkait
                $tb_kegiatan = $this->tbkegiatanModel->where('id_masjid', $id)->findAll();

                // Menyiapkan data untuk view
                $data = [
                    'title' => 'Profil Masjid',
                    'masjid' => $masjid,
                    'tb_kegiatan' => $tb_kegiatan,
                ];

                return view('profil', $data);
            } else {
                // Jika tidak ada ID yang diberikan, tampilkan pesan kesalahan
                throw new \CodeIgniter\Exceptions\PageNotFoundException('ID masjid tidak diberikan');
            }
        } catch (\Exception $e) {
            // Mencatat pesan kesalahan
            log_message('error', $e->getMessage());
            // Menampilkan halaman kesalahan khusus
            return view('errors/custom_error', ['message' => $e->getMessage()]);
        }
    }

    public function details($slug)
    {
        echo $slug;
    }

    public function waktuSholat($id = null)
    {
        try {
            if ($id !== null) {
                // Mengambil data masjid berdasarkan ID
                $masjid = $this->dbdatamasjidModel->orderBy('created_at', 'DESC')->find($id);

                if (!$masjid) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Masjid dengan ID ' . $id . ' tidak ditemukan');
                }

                // Mengambil kegiatan terkait
                $tb_kegiatan = $this->tbkegiatanModel->where('id_masjid', $id)->findAll();

                // Menyiapkan data untuk view
                $data = [
                    'title' => 'Profil Masjid',
                    'masjid' => $masjid,
                    'tb_kegiatan' => $tb_kegiatan,
                ];

                return view('viewprofil/waktusholat', $data);
            } else {
                // Jika tidak ada ID yang diberikan, tampilkan pesan kesalahan
                throw new \CodeIgniter\Exceptions\PageNotFoundException('ID masjid tidak diberikan');
            }
        } catch (\Exception $e) {
            // Mencatat pesan kesalahan
            log_message('error', $e->getMessage());
            // Menampilkan halaman kesalahan khusus
            return view('errors/custom_error', ['message' => $e->getMessage()]);
        }
    }
}
