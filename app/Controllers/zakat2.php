<?php

namespace App\Controllers;

use App\Models\zakatModel;
use App\Models\dbdatamasjidModel;

class zakat2 extends BaseController
{
    protected $zakatModel;
    protected $dbdatamasjidModel;

    public function __construct()
    {
        $this->zakatModel = new zakatModel();
        $this->dbdatamasjidModel = new dbdatamasjidModel();
    }

    public function index($id = null)
    {
        if ($id !== null) {
            $masjid = $this->dbdatamasjidModel->find($id);
            $zakat = $this->zakatModel->select('id_zakat, id_masjid, tgl, keterangan, nominal')->where('id_masjid', $id)->findAll();

            // Debugging
            error_log(print_r($masjid, true));
            error_log(print_r($zakat, true));

            $data = [
                'title' => 'Daftar Zakat',
                'masjid' => $masjid,
                'zakat' => $zakat
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

    public function handleFormData($id_masjid)
    {
        $data = [
            'id_masjid' => $id_masjid,
            'tgl' => $this->request->getVar('tgl'),
            'keterangan' => $this->request->getVar('keterangan'),
            'nominal' => $this->request->getVar('nominal')
        ];

        $this->zakatModel->insert($data);
        return redirect()->to('/zakat2/' . $id_masjid);
    }

    public function updateFormData($id_masjid)
    {
        $id = $this->request->getVar('id_zakat');
        $data = [
            'tgl' => $this->request->getVar('tgl'),
            'keterangan' => $this->request->getVar('keterangan'),
            'nominal' => $this->request->getVar('nominal')
        ];

        $this->zakatModel->update($id, $data);
        return redirect()->to('/zakat2/' . $id_masjid);
    }
}
