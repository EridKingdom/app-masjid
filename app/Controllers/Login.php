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

                // ketika role adalah superAdmin
                if ($user['role'] == 'superAdmin') {
                    $userData = [
                        'id_user' => $user['id_user'] ?? '',
                        'username' => $user['username'],
                        'logged_in' => true,
                        'role' => $user['role']
                    ];
                    $session->set('user_data', $userData);

                    return redirect()->to('/dashboardSuper');
                }

                // ketika status user == diterima
                if ($user['status'] == 'diterima') {
                    $userData = [
                        'id_user' => $user['id_user'] ?? '',
                        'username' => $user['username'],
                        'logged_in' => true,
                        'role' => $user['role']
                    ];
                    $session->set('user_data', $userData);
                    return redirect()->to('/profile');
                }
                // ketika status user == ditolak
                elseif($user['status'] == 'ditolak') {
                    $session->setFlashdata('msg', 'Pendaftaran Anda ditolak');
                    return redirect()->back();
                } else {
                    $session->setFlashdata('msg', 'Pendaftaran Anda sedang diverifkasi');
                    return redirect()->back();
                }

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
        $ktpImage = $this->request->getFiles('gambar_ktp');
        $postTakmir = $this->request->getFiles('surat_takmir');
        $postSertifikat = $this->request->getFiles('sertifikat');


        if ($this->request->getMethod() === 'POST') {
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
            foreach ($postGambar2['gambar2'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'img', $newName); 
                    $uploadedGambar2FileName = $newName;
                }
            }
            $uploadedTakmirFileName = '';
            foreach ($postTakmir['surat_takmir'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'dokumen', $newName);
                    $uploadedTakmirFileName = $newName;
                }
            }
            $uploadedSertifikatFileName = '';
            foreach ($postSertifikat['sertifikat'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'dokumen', $newName);
                    $uploadedSertifikatFileName = $newName; // Simpan nama file
                }
            }

            $uploadedKtpFileName = '';
            foreach ($ktpImage['gambar_ktp'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'dokumen', $newName);
                    $uploadedKtpFileName = $newName;
                }
            }

            $userData = [
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'role' => 'pengurus',
                'nama_pengurus' => $this->request->getVar('nama_pengurus'),
                'gambar_ktp' => $uploadedKtpFileName,
                'email' => $this->request->getVar('email'),
                'alamat_pengurus' => $this->request->getVar('alamat_pengurus'),
                'no_telp' => $this->request->getVar('no_telp'),
                'status' => 'pendaftaran',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $userModel->insert($userData);
            $userId = $userModel->getInsertID();


            $masjidData = [
                'id_user' => $userId,
                'sampul' => $uploadedSampulFileName,
                'nama_masjid' => $this->request->getVar('nama_masjid'),
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

            $session->setFlashdata('success', 'Registrasi berhasil, silahkan tunggu verifikasi.');
            return redirect()->to('/login');
        }

        return view('auth/registrasi');
    }
}
