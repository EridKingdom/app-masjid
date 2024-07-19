<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class lupa extends Controller
{
    public function index()
    {
        return view('auth/lupapassword');
    }

    public function forgotPasswordRequest()
    {
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->where('email', $email)->first();
        if($user) {
            $userModel->update($user['id_user'], ['status_password' => 'reset']);
            return redirect()->to('/login')->with('success', 'Reset password berhasil diajukan untuk disetujui admin');

        } else {
            session()->setFlashdata('error', 'Username atau email tidak ditemukan');
            return redirect()->back();
        }
    }

    public function lupa()
    {
        return view('superAdmin/resetpassword');
    }

    public function resseter()
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT user.id_user, db_data_masjid.sampul, db_data_masjid.nama_masjid, user.nama_pengurus, user.username, user.email, user.password 
                FROM user 
                INNER JOIN db_data_masjid ON user.id_user = db_data_masjid.id_user 
                WHERE user.status = "reset";';

        $userMasjid = $db->query($sql)->getResultArray();

        $data = ['userMasjid' => $userMasjid];

        return view('superAdmin/paswordresetter', $data);
    }
}
