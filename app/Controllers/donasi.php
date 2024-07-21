<?php

namespace App\Controllers;

use App\Models\BerasZakatModel;
use App\Models\DbDataMasjidModel;
use App\Models\DonasiModel;
use App\Models\ZakatModel;
use CodeIgniter\Controller;


class Donasi extends Controller
{
    public function donasi($id)
    {
        $tableMasjid = new DbDataMasjidModel();
        $masjid = $tableMasjid->find($id);
        $data = ['masjid' => $masjid];
        return view('auth/donasi', $data);
    }

    public function storeDonasi()
    {

        $tbDonasi = new DonasiModel();
        $data = $this->request->getPost();


        $transfer = $this->request->getFiles()['bukti_transfer'];
        $uploadedFileName = '';

        if ($transfer->isValid() && !$transfer->hasMoved()) {
            $newName = $transfer->getRandomName();
            $transfer->move(FCPATH . 'transfer', $newName); // Simpan file di folder imgpostingan
            $uploadedFileName = $newName; // Simpan nama file
        }
        $data['bukti_transfer'] = $uploadedFileName;
        $tbDonasi->save($data);
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

    public function konfigurasiZakat($id_masjid)
    {
        $session = session();
        $userData = $session->get('user_data');
        $id_user = $userData['id_user'] ?? null;

        $masjid = [];
        if ($id_user) {
            $db = \Config\Database::connect();
            $query = $db->query("SELECT id AS id_masjid, nama_masjid, deskripsi, alamat_masjid FROM db_data_masjid WHERE id_user = ? AND id = ?", [$id_user, $id_masjid]);
            $result = $query->getRowArray();
            if ($result) {
                $masjid = $result;
            }
        }

        $berasZakatModel = new BerasZakatModel();
        $berasZakat = $berasZakatModel->where('id_masjid', $id_masjid)->findAll();

        $data = [
            'masjid' => $masjid,
            'berasZakat' => $berasZakat,
            'id_masjid' => $id_masjid // Send id_masjid to the view
        ];

        return view('userprofile/konfigurasiZakat', $data);
    }

    public function handleFormData($id_masjid)
    {
        $data = [
            'id_masjid' => $id_masjid,
            'jenis_beras' => $this->request->getVar('jenis_beras'),
            'harga' => $this->request->getVar('harga')
        ];

        $berasZakatModel = new BerasZakatModel();
        $berasZakatModel->insert($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function updateFormData($id_masjid)
    {
        $id = $this->request->getVar('id_beras');
        $data = [
            'jenis_beras' => $this->request->getVar('jenis_beras'),
            'harga' => $this->request->getVar('harga')
        ];

        $berasZakatModel = new BerasZakatModel();
        $berasZakatModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil diedit');
        return redirect()->back()->with('success', 'Data berhasil diEdit');
    }

    public function deleteFormData($id_beras)
    {
        $berasZakatModel = new BerasZakatModel();
        $berasZakat = $berasZakatModel->find($id_beras);
        if ($berasZakat) {
            $berasZakatModel->delete($id_beras);
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data tidak ditemukan');
        }
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
