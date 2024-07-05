<?php

namespace App\Controllers;

use App\Models\infakanakyatimModel;
use App\Models\dbdatamasjidModel;

class yatim extends BaseController
{
    protected $infakanakyatimModel;
    protected $dbdatamasjidModel;

    public function __construct()
    {
        $this->infakanakyatimModel = new infakanakyatimModel();
        $this->dbdatamasjidModel = new dbdatamasjidModel();
    }

    public function index($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbdatamasjidModel->find($id);
            $infak_anak_yatim = $this->infakanakyatimModel->where('id_masjid', $id)->findAll();

            $data = [
                'title' => 'Daftar Infak Anak Yatim',
                'masjid' => $masjid,
                'infak_anak_yatim' => $infak_anak_yatim
            ];

            return view('userprofile/yatim', $data);
        } else {
            return redirect()->to('/path/to/error/page')->with('error', 'ID masjid tidak diberikan');
        }
    }

    public function viewyatim($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbdatamasjidModel->find($id);
            $infak_anak_yatim = $this->infakanakyatimModel->where('id_masjid', $id)->findAll();

            $data = [
                'title' => 'Daftar Infak Anak Yatim',
                'masjid' => $masjid,
                'infak_anak_yatim' => $infak_anak_yatim
            ];

            return view('viewprofil/yatimview', $data);
        } else {
            return redirect()->to('/path/to/error/page')->with('error', 'ID masjid tidak diberikan');
        }
    }

    public function handleFormData($masjid_id = null)
    {
        $tanggal = $this->request->getPost('tgl');
        $keterangan = $this->request->getPost('keterangan');
        $nominal = $this->request->getPost('nominal');

        // Validasi data yang diterima
        if (!$tanggal || !$keterangan || !$nominal) {
            return redirect()->back()->with('error', 'Semua field harus diisi!');
        }

        // Proses penyimpanan data ke database
        $data = [
            'tgl' => $tanggal,
            'keterangan' => $keterangan,
            'nominal' => $nominal,
            'id_masjid' => $masjid_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Misalkan Anda memiliki model yang bertanggung jawab untuk menyimpan data
        $saved = $this->infakanakyatimModel->save($data);

        if ($saved) {
            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }
}
