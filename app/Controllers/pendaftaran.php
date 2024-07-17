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
        return view('superAdmin/ajukan');
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
