<?php

namespace App\Controllers;

use App\Models\InfakAnakYatimModel;
use App\Models\DbDataMasjidModel;

class Yatim extends BaseController
{
    protected $infakAnakYatimModel;
    protected $dbDataMasjidModel;

    public function __construct()
    {
        $this->infakAnakYatimModel = new InfakAnakYatimModel();
        $this->dbDataMasjidModel = new DbDataMasjidModel();
    }

    public function index($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbDataMasjidModel->find($id);
            $infak_anak_yatim = $this->infakAnakYatimModel->where('id_masjid', $id)->findAll();

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

    public function handleFormData($id_masjid)
    {
        $data = [
            'id_masjid' => $id_masjid,
            'tgl' => $this->request->getVar('tgl'),
            'keterangan' => $this->request->getVar('keterangan'),
            'nominal' => $this->request->getVar('nominal'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->infakAnakYatimModel->insert($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/yatim/' . $id_masjid);
    }

    public function updateFormData($id_masjid)
    {
        $id_infak = $this->request->getVar('id_infak');
        $data = [
            'tgl' => $this->request->getVar('tgl'),
            'keterangan' => $this->request->getVar('keterangan'),
            'nominal' => $this->request->getVar('nominal'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->infakAnakYatimModel->update($id_infak, $data);
        session()->setFlashdata('success', 'Data berhasil diedit');
        return redirect()->to('/yatim/' . $id_masjid);
    }

    public function viewyatim($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbDataMasjidModel->find($id);
            $infak_anak_yatim = $this->infakAnakYatimModel->where('id_masjid', $id)->findAll();

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

    public function deleteFormData($id_infak)
    {
        $infak = $this->infakAnakYatimModel->find($id_infak);
        if ($infak) {
            $this->infakAnakYatimModel->delete($id_infak);
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data tidak ditemukan');
        }
        return redirect()->to('/yatim/' . $infak['id_masjid']);
    }
}
