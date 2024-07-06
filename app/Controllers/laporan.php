<?php

namespace App\Controllers;

use App\Models\KasMasjidModel;
use App\Models\DbDataMasjidModel;
use App\Models\TbKegiatanModel;
use App\Models\ZakatModel;
use App\Models\InfakAnakYatimModel;
use CodeIgniter\API\ResponseTrait;

class Laporan extends BaseController
{
    use ResponseTrait;
    protected $kasMasjidModel;
    protected $dbDataMasjidModel;
    protected $tbKegiatanModel;
    protected $zakatModel;
    protected $infakAnakYatimModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->kasMasjidModel = new KasMasjidModel();
        $this->dbDataMasjidModel = new DbDataMasjidModel();
        $this->tbKegiatanModel = new TbKegiatanModel();
        $this->zakatModel = new ZakatModel();
        $this->infakAnakYatimModel = new InfakAnakYatimModel();
    }

    public function index($id = null)
    {
        if ($id !== null) {
            // Query berdasarkan ID masjid yang berelasi
            $kas_masjid = $this->kasMasjidModel->where('id_masjid', $id)->findAll();
            $zakat = $this->zakatModel->where('id_masjid', $id)->findAll();
            $tb_kegiatan = $this->tbKegiatanModel->where('id_masjid', $id)->findAll();
            $infak_anak_yatim = $this->infakAnakYatimModel->where('id_masjid', $id)->findAll();
        } else {
            // Query tanpa filter ID
            $kas_masjid = $this->kasMasjidModel->findAll();
            $zakat = $this->zakatModel->findAll();
            $tb_kegiatan = $this->tbKegiatanModel->findAll();
            $infak_anak_yatim = $this->infakAnakYatimModel->findAll();
        }

        $data = [
            'title' => '3 tabel',
            'kas_masjid' => $kas_masjid,
            'zakat' => $zakat,
            'tb_kegiatan' => $tb_kegiatan,
            'infak_anak_yatim' => $infak_anak_yatim
        ];

        return view('userprofile/laporan', $data);
    }

    public function laporanFilter() {
        $type = $this->request->getVar('type');
        $from = $this->request->getVar('startDate');
        $to = $this->request->getVar('endDate');
        switch ($type) {
            case 'kasTable':
                $kasList =  $this->kasMasjidModel->where("DATE_FORMAT(tgl,'%Y-%m-%d')",'>=',$from)
                ->where("DATE_FORMAT(tgl,'%Y-%m-%d')",'<=',$to);
                return $this->respond($kasList);
                break;

            case 'zakat-table':
                
                break;

            case 'kegiatan-table':
                    # code...
                break;
            case 'infak_anak_yatim-table':
                    # code...
                break;
            
        }
    }
}
