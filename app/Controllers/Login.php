<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DbDataMasjidModel;
use App\Models\DonasiModel;
use CodeIgniter\Controller;
use App\Models\ZakatModel;

class Login extends Controller
{
    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = trim($this->request->getVar('password'));

        $user = $model->where('username', $username)->first();

        if ($user) {
            if ($user && $user['password'] === $password) {
                $userData = [
                    'id_user' => $user['id_user'] ?? '',
                    'username' => $user['username'],
                    'logged_in' => true
                ];
                $session->set('user_data', $userData);
                return redirect()->to('/profile');
            } else {
                $session->setFlashdata('msg', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function index()
    {
        return view('auth/login');
    }

    public function registrasi()
    {
        $session = session();
        $userModel = new UserModel();
        $masjidModel = new DbDataMasjidModel();
        $postSampul = $this->request->getFiles('sampul');
        $postGambar1 = $this->request->getFiles('gambar1');
        $postGambar2 = $this->request->getFiles('gambar2');
        $postTakmir = $this->request->getFiles('surat_takmir');
        $postSertifikat = $this->request->getFiles('sertifikat');


        if ($this->request->getMethod() === 'POST') {
            $userData = [
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'role' => 'pengurus',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $uploadedSampulFileName = '';
            foreach ($postSampul['sampul'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'img', $newName); // Simpan file di folder imgpostingan
                    $uploadedSampulFileName = $newName; // Simpan nama file
                }
            }
            $uploadedGambar1FileName = '';
            foreach ($postGambar1['gambar1'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'img', $newName); // Simpan file di folder imgpostingan
                    $uploadedGambar1FileName = $newName; // Simpan nama file
                }
            }
            $uploadedGambar2FileName = '';
            foreach ($postGambar1['gambar2'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'img', $newName); // Simpan file di folder imgpostingan
                    $uploadedGambar2FileName = $newName; // Simpan nama file
                }
            }
            $uploadedTakmirFileName = '';
            foreach ($postTakmir['surat_takmir'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'dokumen', $newName); // Simpan file di folder imgpostingan
                    $uploadedTakmirFileName = $newName; // Simpan nama file
                }
            }
            $uploadedSertifikatFileName = '';
            foreach ($postSertifikat['sertifikat'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'dokumen', $newName); // Simpan file di folder imgpostingan
                    $uploadedSertifikatFileName = $newName; // Simpan nama file
                }
            }


            $userModel->insert($userData);
            $userId = $userModel->getInsertID();

            $masjidData = [
                'id_user' => $userId,
                'sampul' => $uploadedSampulFileName,
                'nama_masjid' => $this->request->getVar('nama_masjid'),
                'nama_pengurus' => $this->request->getVar('nama_pengurus'),
                'provinsi' => $this->request->getVar('provinsi'),
                'gambar1' => $uploadedGambar1FileName,
                'gambar2' => $uploadedGambar2FileName,
                'kota_kab' => $this->request->getVar('kota'),
                'alamat_masjid' => $this->request->getVar('alamat'),
                'surat_takmir' => $uploadedTakmirFileName,
                'sertifikat' => $uploadedSertifikatFileName,
                'jenis_tipologi' => $this->request->getVar('jenis_tipologi'),
                'tahun_berdiri' => $this->request->getVar('tahun_berdiri'),
                'luas_bangunan' => $this->request->getVar('luas_bangunan'),
                'luas_tanah' => $this->request->getVar('luas_tanah'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $masjidModel->insert($masjidData);

            $session->setFlashdata('success', 'Registrasi berhasil, silahkan login.');
            return redirect()->to('/login');
        }

        return view('auth/registrasi');
    }

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
}
