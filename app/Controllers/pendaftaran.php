<?php

namespace App\Controllers;

use App\Models\DbDataMasjidModel;
use App\Models\PengajuanPerubahanModel;
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
                pengajuan_perubahan.nama_pengurus as nama_pengurus_baru,
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
                from pengajuan_perubahan INNER JOIN db_data_masjid ON db_data_masjid.id = pengajuan_perubahan.id_masjid INNER JOIN user ON db_data_masjid.id_user = user.id_user
                where pengajuan_perubahan.status = "pengajuan" or pengajuan_perubahan.status = "block";';

        $userData = $db->query($sql)->getResultArray();

        $data = ['userData' => $userData];
        return view('superAdmin/ajukan', $data);
    }

    public  function  perubahanDataAction()
    {
        $modelUser = new UserModel();
        $modelMasjid = new DbDataMasjidModel();
        $modelPengajuan = new PengajuanPerubahanModel();
        $action =  $this->request->getVar('action');
        $ids = $this->request->getVar('ids');
        if(count($ids) > 0) {
            $ajuans =$modelPengajuan->where('id_ajuan',$ids)->findAll();
            foreach ($ajuans as $ajuan) {
                $masjid = $modelMasjid->where('id',$ajuan['id_masjid'])->first();
                if($action == 'validate'){
                    $user = $modelUser->where('id_user',$masjid['id_user'])->first();
                  $data = [
                      'nama_pengurus' => $ajuan['nama_pengurus'],
                      'email' => $ajuan['email'],
                      'username' => $ajuan['username'],
                      'gambar_ktp' => $ajuan['gambar_ktp'],
                      'no_telp' => $ajuan['no_telp'],
                      'alamat_pengurus' => $ajuan['alamat_pengurus'],
                      'password' => $ajuan['password'],
                  ];

                    if($modelUser->update($user['id_user'],$data)) {
                        $ajuan['status'] = 'diterima';
                        $modelPengajuan->update($ajuan['id_ajuan'],$ajuan);
                    }
                } else {
                    $ajuan['status'] = 'ditolak';
                    $modelPengajuan->update($ajuan['id_ajuan'],$ajuan);
                }
            }

        }
        return  $this->respond(['status' =>  200]);
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
