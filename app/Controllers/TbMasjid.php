<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;

class TbMasjid extends BaseController
{
    protected $dbdatamasjidModel;
    public function __construct()
    {
        $this->dbdatamasjidModel = new dbdatamasjidModel();
    }


    public function index()
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
                ->findAll();
        } else {
            $db_data_masjid = $this->dbdatamasjidModel->findAll();
        }

        $data = [
            'title' => 'Daftar Masjid',
            'db_data_masjid' => $db_data_masjid,
            'showSearch' =>  true
        ];



        return view('pencarianmasjid/tbMasjid', $data);
    }
    public function details($slug)
    {
        echo $slug;
    }
}
