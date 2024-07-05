<?php

namespace App\Controllers;

use App\Models\kasmasjidModel;
use App\Models\dbdatamasjidModel; // Pastikan ini sesuai dengan lokasi dan nama file model Anda

class uang extends BaseController
{
    protected $dbdatamasjidModel;
    protected $kasmasjidModel;


    public function __construct()
    {
        $this->kasmasjidModel = new kasmasjidModel();
        $this->dbdatamasjidModel = new dbdatamasjidModel(); // Pastikan ini sesuai dengan nama kelas yang benar
    }


    public function index($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbdatamasjidModel->find($id);
            $kas_masjid = $this->kasmasjidModel->where('id_masjid', $id)->findAll();

            $data = [
                'title' => 'Kas Masjid',
                'masjid' => $masjid,
                'kas_masjid' => $kas_masjid
            ];

            return view('userprofile/uangkas', $data);
        } else {
            return redirect()->to('/path/to/error/page')->with('error', 'ID masjid tidak diberikan');
        }
    }
    public function viewkasmasjid($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbdatamasjidModel->find($id);
            $kas_masjid = $this->kasmasjidModel->where('id_masjid', $id)->findAll();

            $data = [
                'title' => 'Kas Masjid',
                'masjid' => $masjid,
                'kas_masjid' => $kas_masjid
            ];

            return view('viewprofil/uangkasview', $data);
        } else {
            return redirect()->to('/path/to/error/page')->with('error', 'ID masjid tidak diberikan');
        }
    }

    public function handleFormData($masjid_id = null)
    {
        $tanggal = $this->request->getPost('tgl');
        $keterangan = $this->request->getPost('keterangan');
        $jenis_kas = $this->request->getPost('jenis_kas');
        $nominal = $this->request->getPost('nominal');


        // Validasi data yang diterima
        if (!$tanggal || !$keterangan || !$jenis_kas || !$nominal) {
            return redirect()->back()->with('error', 'Semua field harus diisi!');
        }

        // Proses penyimpanan data ke database
        $data = [
            'tgl' => $tanggal,
            'keterangan' => $keterangan,
            'jenis_kas' => $jenis_kas,
            'nominal' => $nominal,
            'id_masjid' => $masjid_id
        ];

        // Misalkan Anda memiliki model yang bertanggung jawab untuk menyimpan data
        $saved = $this->kasmasjidModel->save($data); // Corrected property name

        if ($saved) {
            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }
}
