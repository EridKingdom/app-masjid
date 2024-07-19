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

    public function lupa($id_user, $from = null)
    {
        $userModel = new UserModel();
        $user = $userModel->where('id_user', $id_user)->where('status_password', 'reset')->first();
        if($user) {
            return view('superAdmin/resetpassword', ['user' => $user, 'from' => $from]);
        } else {
            return redirect()->to($from == 'admin' ? '/' :'/resetter-password')->with('warning', 'User tidak ditemukan');
        }

    }

    public function ubah()
    {
        $id_user = $this->request->getVar('id_user');
        $from = $this->request->getVar('from');
        $password = $this->request->getVar('password');
        $confirm_password = $this->request->getVar('confirm_password');

        if($password != $confirm_password) {
            return redirect()->back()->with('warning', 'Konfirmasi password tidak sama');
        }

        $userModel = new UserModel();
        $user = $userModel->where('id_user', $id_user)->where('status_password', 'reset')->first();
        if($user) {
            $data = [
                'password' => $password,
                'status_password' => 'done'
            ];
            $userModel->update($user['id_user'], $data);
            return redirect()->to($from == 'admin' ?'/resetter-password' : '/login')->with('success', 'Berhasil mengubah password');
        } else {
            return redirect()->back()->with('warning', 'User tidak ditemukan');
        }
    }

    public function resseter()
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT user.id_user, db_data_masjid.sampul, db_data_masjid.nama_masjid, user.nama_pengurus, user.username, user.email, user.password,  user.no_telp 
                FROM user 
                INNER JOIN db_data_masjid ON user.id_user = db_data_masjid.id_user 
                WHERE user.status_password = "reset";';

        $userMasjid = $db->query($sql)->getResultArray();

        $data = ['userMasjid' => $userMasjid];

        return view('superAdmin/paswordresetter', $data);
    }
}
