<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;
use App\Models\tbkegiatanModel;
use App\Models\UserModel;

class Profil extends BaseController
{
    protected $dbdatamasjidModel;
    protected $tbkegiatanModel;
    protected $UserModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->dbdatamasjidModel = new dbdatamasjidModel();
        $this->tbkegiatanModel = new tbkegiatanModel();
        $this->UserModel = new UserModel();
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
                $tipe_postingan_list = $this->tbkegiatanModel->getUniqueTipePostingan();

                // Menyiapkan data untuk view
                $data = [
                    'title' => 'Profil Masjid',
                    'masjid' => $masjid,
                    'tb_kegiatan' => $tb_kegiatan,
                    'tipe_postingan_list' => $tipe_postingan_list, // Menambahkan tipe postingan ke data
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

    public function superP($id = null)
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
                $tipe_postingan_list = $this->tbkegiatanModel->getUniqueTipePostingan();

                // Menyiapkan data untuk view
                $data = [
                    'title' => 'Profil Masjid',
                    'masjid' => $masjid,
                    'tb_kegiatan' => $tb_kegiatan,
                    'tipe_postingan_list' => $tipe_postingan_list, // Menambahkan tipe postingan ke data
                ];

                return view('viewsuper/profilsuper', $data);
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

    public function biodataP($id = null)
    {
        try {
            if ($id !== null) {
                // Mengambil data masjid berdasarkan ID
                $masjid = $this->dbdatamasjidModel->orderBy('created_at', 'DESC')->find($id);

                if (!$masjid) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Masjid dengan ID ' . $id . ' tidak ditemukan');
                }

                // Mengambil data pengurus terkait dengan join
                $pengurus = $this->UserModel
                    ->select('user.nama_pengurus, user.no_telp, user.email, user.alamat_pengurus, user.gambar_ktp')
                    ->join('db_data_masjid', 'user.id_user = db_data_masjid.id_user')
                    ->where('db_data_masjid.id', $id)
                    ->first();

                if (!$pengurus) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengurus untuk masjid dengan ID ' . $id . ' tidak ditemukan');
                }

                // Menyiapkan data untuk view
                $data = [
                    'title' => 'Biodata Pengurus',
                    'masjid' => $masjid,
                    'pengurus' => $pengurus,
                ];

                return view('viewsuper/biodatapengurus', $data);
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
