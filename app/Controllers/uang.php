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
    public function superkasmasjid($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbdatamasjidModel->find($id);
            $kas_masjid = $this->kasmasjidModel->where('id_masjid', $id)->findAll();

            $data = [
                'title' => 'Kas Masjid',
                'masjid' => $masjid,
                'kas_masjid' => $kas_masjid
            ];

            return view('viewsuper/uangkassuper', $data);
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
    public function updateFormData($id_masjid)
    {
        $id_transaksi = $this->request->getVar('id_transaksi');
        $data = [
            'tgl' => $this->request->getVar('tgl'),
            'keterangan' => $this->request->getVar('keterangan'),
            'jenis_kas' => $this->request->getVar('jenis_kas'),
            'nominal' => $this->request->getVar('nominal')
        ];

        if ($id_transaksi) {
            $this->kasmasjidModel->update($id_transaksi, $data);
            return redirect()->to('/uangkas/' . $id_masjid)->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->to('/uangkas/' . $id_masjid)->with('error', 'ID transaksi tidak ditemukan.');
        }
    }

    public function deleteFormData()
    {
        $ids = $this->request->getPost('id_transaksi');
        if ($ids && is_array($ids)) {
            foreach ($ids as $id_transaksi) {
                $kas = $this->kasmasjidModel->find($id_transaksi);
                if ($kas) {
                    $this->kasmasjidModel->delete($id_transaksi);
                }
            }
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data tidak ditemukan');
        }
        return redirect()->back();
    }
}
