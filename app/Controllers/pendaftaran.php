<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class Pendaftaran extends Controller
{
    public function pendaftaran()
    {

        $db = $db = \Config\Database::connect();
        $sql = 'SELECT db_data_masjid.id, db_data_masjid.sampul, db_data_masjid.nama_masjid, db_data_masjid.surat_takmir, db_data_masjid.sertifikat, user.nama_pengurus, user.username, user.email  FROM db_data_masjid INNER JOIN user ON db_data_masjid.id_user=user.id_user where user.status = "pendaftaran";';

        $userMasjid = $db->query($sql)->getResultArray();

        $data = ['userMasjid' => $userMasjid];

        return view('superAdmin/register', $data);
    }

    public function pengajuan()
    {
        return view('superAdmin/ajukan');
    }
}
