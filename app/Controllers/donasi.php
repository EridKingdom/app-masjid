<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DbDataMasjidModel;
use App\Models\DonasiModel;
use CodeIgniter\Controller;
use App\Models\ZakatModel;

class Donasi extends Controller
{
    public function donasi()
    {
        $tableMasjid = new DbDataMasjidModel();
        $allMasjid = $tableMasjid->findAll();
        $masjidOptions = array_map(function ($value) {
            return [
                'id' => $value['id'],
                'nama_masjid' => $value['nama_masjid'],
            ];
        }, $allMasjid);
        $masjidBank = array_map(function ($value) {
            return [
                'id' => $value['id'],
                'nama_masjid' => $value['nama_masjid'],
                'no_rekening' => $value['no_rekening'],
                'nama_bank' => $value['nama_bank'],
            ];
        }, $allMasjid);
        $data = ['masjidList' => $masjidBank, 'masjidOptions' => $masjidOptions];
        return view('auth/donasi', $data);
    }

    public function storeDonasi()
    {
        $tbDonasi = new DonasiModel();
        $tbDonasi->save($this->request->getPost());
        $tbZakat = new ZakatModel();
        $zakat = $tbZakat->findAll();

        $data = [
            'title' => 'Daftar Zakat',
            'zakat' => $zakat,
            'showSearch' => false
        ];
        $session = session();
        $session->setFlashdata('success', '*');
        return redirect()->to('/bukti-donasi')->with('donasiData', $tbDonasi);
    }
    public function uploadbuktiDonasi()
    {
        $tbDonasi = new DonasiModel();
        $tbDonasi = $tbDonasi->findAll();

        // Menggabungkan data dalam satu array
        $data = [
            'title' => 'Daftar Donasi',
            'donasi' => $tbDonasi,

        ];
        return view('uploadbuktidonasi', $data);
    }
    public function uploadBuktiTransfer()
    {
        $session = session();
        $donasiModel = new DonasiModel();

        // Get the uploaded file
        $postMedia = $this->request->getFiles('postMedia');

        // Validate the file
        if (!$this->validate([
            'postMedia.*' => 'uploaded[postMedia]|max_size[postMedia,10240]|ext_in[postMedia,jpg,jpeg,png,mp4]',
        ])) {
            $session->setFlashdata('error', 'Gagal mengupload bukti transfer. File tidak valid.');
            return redirect()->to('/bukti-donasi')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Process the uploaded file
        $uploadedFileName = '';
        foreach ($postMedia['postMedia'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'img', $newName); // Simpan file di folder img
                $uploadedFileName = $newName; // Simpan nama file
            }
        }

        // Get the ID of the donation to update
        $donasiId = $this->request->getPost('donasi_id');

        // Update the database record
        $donasiModel->update($donasiId, ['bukti_transfer' => $uploadedFileName]);

        $session->setFlashdata('success', 'Bukti transfer berhasil diupload.');
        return redirect()->to('/bukti-donasi');
    }
    public function donasiZakat()
    {
        // Assuming you need to send some data to the view, similar to the `donasi` method
        $tableMasjid = new DbDataMasjidModel();
        $allMasjid = $tableMasjid->findAll();
        $masjidOptions = array_map(function ($value) {
            return [
                'id' => $value['id'],
                'nama_masjid' => $value['nama_masjid'],
                'no_rekening' => $value['no_rekening'],
                'nama_bank' => $value['nama_bank'],
            ];
        }, $allMasjid);

        $data = ['masjidList' => $masjidOptions];
            return view('donasiZakat', $data); // Ensure the view path matches the actual location of your view file
    }
    public function konfigurasiZakat()
    {
        return view('userprofile/konfigurasiZakat');
    }
    
}
