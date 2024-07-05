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

        if ($this->request->getMethod() === 'post') {
            $userData = [
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'role' => 'pengurus',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $userModel->insert($userData);
            $userId = $userModel->getInsertID();

            $masjidData = [
                'id_user' => $userId,
                'nama_masjid' => $this->request->getVar('nama_masjid'),
                'nama_pengurus' => $this->request->getVar('nama_pengurus'),
                'provinsi' => $this->request->getVar('provinsi'),
                'kota_kab' => $this->request->getVar('kota'),
                'alamat_masjid' => $this->request->getVar('alamat'),
                'jenis_tipologi' => $this->request->getVar('jenis_tipologi'),
                'tahun_berdiri' => $this->request->getVar('tahun_berdiri'),
                'luas_bangunan' => $this->request->getVar('luas_bangunan'),
                'luas_tanah' => $this->request->getVar('luas_tanah'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $masjidModel->insert($masjidData);

            $session->setFlashdata('success', 'Registrasi berhasil.');
            return redirect()->to('/login');
        }

        return view('auth/registrasi');
    }

    public function donasi()
    {
        return view('auth/donasi');
    }
}
