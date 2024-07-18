<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;


class Pendaftaran extends Controller
{
    use ResponseTrait;
    public function pendaftaran()
    {

        $db = $db = \Config\Database::connect();
        $sql = 'SELECT db_data_masjid.id, db_data_masjid.sampul, db_data_masjid.nama_masjid, db_data_masjid.surat_takmir, db_data_masjid.sertifikat, user.nama_pengurus, user.username, user.email, user.id_user  FROM db_data_masjid INNER JOIN user ON db_data_masjid.id_user=user.id_user where user.status = "pendaftaran";';

        $userMasjid = $db->query($sql)->getResultArray();

        $data = ['userMasjid' => $userMasjid];

        return view('superAdmin/register', $data);
    }

    public function pengajuan()
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT pengajuan_perubahan.id_ajuan, 
                pengajuan_perubahan.nama_pengurus as pengurus_baru,
                pengajuan_perubahan.email as email_baru,
                pengajuan_perubahan.username as username_baru,
                pengajuan_perubahan.gambar_ktp as gambar_ktp_baru,
                pengajuan_perubahan.no_telp as no_telp_baru,
                pengajuan_perubahan.alamat_pengurus as alamat_pengurus_baru,
                user.nama_pengurus,
                user.email,
                user.username,
                user.gambar_ktp,
                user.no_telp,
                user.alamat_pengurus,
                db_data_masjid.nama_masjid
                from pengajuan_perubahan INNER JOIN db_data_masjid ON db_data_masjid.id = pengajuan_perubahan.id_masjid INNER JOIN user ON db_data_masjid.id_user = user.id_user';

        $userData = $db->query($sql)->getResultArray();

        $data = ['userData' => $userData];
        return view('superAdmin/ajukan', $data);
    }

    public  function  getDataPerubahanJson()
    {

    }

    public function userRegisterAction()
    {
        $modelUser = new UserModel();
       $action =  $this->request->getVar('action');
       $userIds = $this->request->getVar('userIds');
       if(count($userIds) > 0) {
           $users =$modelUser->where('id_user',$userIds);
           if($action == 'validate'){
             $users->update($userIds, ['status' => 'diterima']);
           } else {
               $users->update($userIds, ['status' => 'ditolak']);
           }
       }

       return  $this->respond(['status' =>  200]);

    }
}
