<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;
use App\Models\tbkegiatanModel;

class editP extends BaseController
{
    protected $dbdatamasjidModel;
    protected $tbkegiatanModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->dbdatamasjidModel = new DbDataMasjidModel();
        $this->tbkegiatanModel = new tbkegiatanModel();
    }

    public function index()
    {
        try {
            // Mengambil data dari kedua tabel
            $db_data_masjid = $this->dbdatamasjidModel->findAll();
            $tb_kegiatan = $this->tbkegiatanModel->findAll();

            // Debugging: Log the data to see if it's being fetched correctly
            log_message('debug', 'db_data_masjid: ' . print_r($db_data_masjid, true));
            log_message('debug', 'tb_kegiatan: ' . print_r($tb_kegiatan, true));

            // Menggabungkan data dalam satu array
            $data = [
                'title' => 'Daftar Masjid dan Postingan',
                'db_data_masjid' => $db_data_masjid,
                'tb_kegiatan' => $tb_kegiatan,
            ];

            return view('userprofile/editProfile', $data);
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

    public function updateProfile()
    {
        $session = session();
        $userData = $session->get('user_data');
        $id_user = $userData['id_user'] ?? null;
        

        if ($id_user) {
            $data = $this->request->getPost();
            $files = $this->request->getFiles();

            // Handle file uploads
            if ($files['sampul']->isValid() && !$files['sampul']->hasMoved()) {
                    $newName = $files['sampul']->getRandomName();
                    $files['sampul']->move(FCPATH . 'img', $newName);
                    $data['sampul'] = $newName;
            }
            if ($files['gambar1']->isValid() && !$files['gambar1']->hasMoved()) {
                    $newName = $files['gambar1']->getRandomName();
                    $files['gambar1']->move(FCPATH . 'img', $newName);
                    $data['gambar1'] = $newName;

            }
            if ($files['gambar2']->isValid() && !$files['gambar2']->hasMoved()) {
                    $newName = $files['gambar2']->getRandomName();
                    $files['gambar2']->move(FCPATH . 'img', $newName);
                    $data['gambar2'] = $newName;
            }
            if ($files['gambar3']->isValid() && !$files['gambar3']->hasMoved()) {
                    $newName = $files['gambar3']->getRandomName();
                    $files['gambar3']->move(FCPATH . 'img', $newName);
                    $data['gambar3'] = $newName;
            }
            // Update the database
            $currentData = $this->dbdatamasjidModel->where('id_user', $id_user);
            $this->dbdatamasjidModel->update($currentData->id, $data);

            return redirect()->to('/profile')->with('message', 'Profile updated successfully');
        } else {
            return redirect()->to('/login')->with('error', 'User not logged in');
        }
    }
}
