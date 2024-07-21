<?php

namespace App\Controllers;

use App\Models\zakatModel;
use App\Models\dbdatamasjidModel;
use App\Models\BerasZakatModel; // Added this line

class zakat2 extends BaseController
{
    protected $zakatModel;
    protected $dbdatamasjidModel;
    protected $berasZakatModel; // Added this line

    public function __construct()
    {
        $this->zakatModel = new zakatModel();
        $this->dbdatamasjidModel = new dbdatamasjidModel();
        $this->berasZakatModel = new BerasZakatModel(); // Added this line
    }

    public function index($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbdatamasjidModel->find($id);
            $zakat = $this->zakatModel->select('zakat.id_beras, id_zakat, zakat.id_masjid, tgl, keterangan, nominal, beras_zakat.jenis_beras')
                ->join('beras_zakat', 'beras_zakat.id_beras = zakat.id_beras')
                ->where('zakat.id_masjid', $id)->findAll();

            $beras =  $this->berasZakatModel->where('id_masjid', $id)->findAll();

            // Debugging
            error_log(print_r($masjid, true));
            error_log(print_r($zakat, true));

            $data = [
                'title' => 'Daftar Zakat',
                'masjid' => $masjid,
                'zakat' => $zakat,
                'beras' => $beras,
            ];

            return view('userprofile/zakat2', $data);
        } else {
            return redirect()->to('/path/to/error/page')->with('error', 'ID masjid tidak diberikan');
        }
    }

    public function viewzakat($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbdatamasjidModel->find($id);
            $zakat = $this->zakatModel->select('id_masjid, tgl, keterangan, nominal')->where('id_masjid', $id)->findAll();

            $data = [
                'title' => 'Daftar Zakat',
                'masjid' => $masjid,
                'zakat' => $zakat
            ];

            return view('viewprofil/zakatview', $data);
        } else {
            return redirect()->to('/path/to/error/page')->with('error', 'ID masjid tidak diberikan');
        }
    }
    public function superzakat($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbdatamasjidModel->find($id);
            $zakat = $this->zakatModel->select('id_masjid, tgl, keterangan, nominal')->where('id_masjid', $id)->findAll();

            $data = [
                'title' => 'Daftar Zakat',
                'masjid' => $masjid,
                'zakat' => $zakat
            ];

            return view('viewsuper/zakatsuper', $data);
        } else {
            return redirect()->to('/path/to/error/page')->with('error', 'ID masjid tidak diberikan');
        }
    }

    public function handleFormData($id_masjid)
    {
        $data = [
            'id_masjid' => $id_masjid,
            'id_beras' => $this->request->getPost('id_beras'),
            'tgl' => $this->request->getVar('tgl'),
            'keterangan' => $this->request->getVar('keterangan'),
            'nominal' => $this->request->getVar('nominal')
        ];

        $this->zakatModel->insert($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/zakat2/' . $id_masjid);
    }

    public function updateFormData($id_masjid)
    {
        $id = $this->request->getVar('id_zakat');
        $data = [
            'tgl' => $this->request->getVar('tgl'),
            'keterangan' => $this->request->getVar('keterangan'),
            'id_beras' => $this->request->getVar('id_beras'),
        ];

        $this->zakatModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil diedit');
        return redirect()->to('/zakat2/' . $id_masjid);
    }

    public function deleteFormData($id_zakat)
    {
        $zakat = $this->zakatModel->find($id_zakat);
        if ($zakat) {
            $this->zakatModel->delete($id_zakat);
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data tidak ditemukan');
        }
        return redirect()->to('/zakat2/' . $zakat['id_masjid']);
    }
}
