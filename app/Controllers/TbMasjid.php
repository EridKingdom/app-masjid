<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;


class TbMasjid extends BaseController
{
    use ResponseTrait;
    protected $dbdatamasjidModel;
    public function __construct()
    {
        $this->dbdatamasjidModel = new dbdatamasjidModel();
    }

    public function index()
    {
        // Mengambil data masjid dengan status 'diterima'
        $db = \Config\Database::connect();
        $builder = $db->table('db_data_masjid');
        $builder->select('db_data_masjid.*, user.status, user.nama_pengurus');
        $builder->join('user', 'user.id_user = db_data_masjid.id_user');
        $builder->where('user.status', 'diterima');
        $query = $builder->get();
        $db_data_masjid = $query->getResultArray();

        $data = [
            'title' => 'Daftar Masjid',
            'db_data_masjid' => $db_data_masjid,
            'showSearch' => true
        ];

        return view('pencarianmasjid/tbmasjid', $data);
    }

    public function details($slug)
    {
        echo $slug;
    }

    public function block()
    {
        $userIds = $this->request->getVar('userIds');
        $userModel = new UserModel();
        $userModel->update($userIds, ['status' => 'block']);
        return $this->respond(['message' => 'success']);
    }

    public function daftarmasjid()
    {
        $keyword = $this->request->getVar('keyword'); // Mendapatkan keyword dari query string
        if ($keyword) {
            $db_data_masjid = $this->dbdatamasjidModel
                ->groupStart()
                ->like('nama_masjid', $keyword)
                ->orLike('nama_pengurus', $keyword)
                ->orLike('provinsi', $keyword)
                ->orLike('kota_kab', $keyword)
                ->orLike('alamat_masjid', $keyword)
                ->groupEnd()
                ->join('user', 'user.id_user=db_data_masjid.id_user')
                ->where('user.status', 'diterima')
                ->findAll();
        } else {
            $db_data_masjid = $this->dbdatamasjidModel->join('user', 'user.id_user=db_data_masjid.id_user')
                ->where('user.status', 'diterima')->findAll();
        }

        $data = [
            'title' => 'Daftar Masjid',
            'db_data_masjid' => $db_data_masjid,
            'showSearch' => true
        ];

        return view('superAdmin/daftarmasjid', $data);
    }

    public function daftarmasjidWithStatus()
    {
        $keyword = $this->request->getVar('keyword'); // Mendapatkan keyword dari query string
        $db_data_masjid = $this->dbdatamasjidModel->getMasjidWithUserStatus($keyword);

        $data = [
            'title' => 'Daftar Masjid dengan Status',
            'db_data_masjid' => $db_data_masjid,
            'showSearch' => true
        ];

        return view('superAdmin/daftarmasjid', $data);
    }
}
