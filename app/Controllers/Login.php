<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DbDataMasjidModel;
use CodeIgniter\Controller;


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
                    'logged_in' => true,
                    'role' => $user['role']
                ];
                $session->set('user_data', $userData);
                if($user['role'] == 'superAdmin') {
                    return redirect()->to('/dashboardSuper');
                }
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
}
