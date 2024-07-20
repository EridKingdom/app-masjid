<?php

namespace App\Controllers;

use App\Models\kasmasjidModel;
use App\Models\dbdatamasjidModel;
use App\Models\DonasiModel;
use App\Models\tbkegiatanModel;
use App\Models\zakatModel;
use App\Models\infakanakyatimModel;

class verifikasiDonasi extends BaseController
{
    protected $dbdatamasjidModel;
    protected $zakatModel;
    protected $donasiModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->dbdatamasjidModel = new dbdatamasjidModel();
        $this->zakatModel = new zakatModel();
        $this->donasiModel = new DonasiModel();
    }

    public function index($id_masjid)
    {
        // Mengambil data dari ketiga tabel berdasarkan id_masjid
        $db_data_masjid = $this->dbdatamasjidModel->where('id', $id_masjid)->findAll();
        $zakat = $this->zakatModel->where('id_masjid', $id_masjid)->findAll();
        $donasi = $this->donasiModel->where('id_masjid', $id_masjid)->where('status', null)->findAll();

        // Menggabungkan data dalam satu array
        $data = [
            'title' => 'verifikasi Pembayaran Zakat',
            'db_data_masjid' => $db_data_masjid,
            'zakat' => $zakat,
            'donasi' => $donasi, // Menambahkan data donasi
        ];

        // Mengirim data ke view
        return view('userprofile/verifikasiDonasi', $data);
    }

    public function verifyDonasi($id_donasi)
    {
        $donasi = $this->donasiModel->find($id_donasi);
        $modelKasmasjid = new kasmasjidModel();
        $modelInfakanakyatim = new infakanakyatimModel();
        if ($donasi) {
            $status = ['status' => 'verifikasi'];
            $data = [
                'tgl' => $donasi['created_at'],
                'id_masjid' => $donasi['id_masjid'],
                'keterangan' => 'Donasi dari '.$donasi['nama_donatur'],
                'nominal' => $donasi['nominal'],
            ];

            $jenis = $donasi['jenis_donasi'];

            if($jenis == 'pembangunan') {
                $data['jenis_kas'] = 'masuk';
                $modelKasmasjid->save($data);
                $this->donasiModel->update($id_donasi, $status);

            } else {
                $modelInfakanakyatim->save($data);
                $this->donasiModel->update($id_donasi,$status);
            }
            return redirect()->back()->with('success', 'Donation verified successfully.');
        } else {
            return redirect()->back()->with('error', 'Donation not found.');
        }
    }

    public function unverifyDonasi($id_donasi)
    {
        if ($this->donasiModel->update($id_donasi, ['status' => 'ditolak'])) {
            return redirect()->back()->with('success', 'Donation deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete donation.');
        }
    }

    public function verifyAllDonasi()
    {
        $donasiAll = $this->donasiModel->findAll();
        foreach ($donasiAll as $key => $donasi) {
            if ($donasi) {
                $zakatData = [
                    'tgl' => $donasi['created_at'],
                    'id_masjid' => $donasi['id_masjid'],
                    'keterangan' => $donasi['nama_donatur'],
                    'nominal' => $donasi['nominal'],
                ];
                if ($this->zakatModel->save($zakatData)) {
                    $this->donasiModel->delete($donasi['id_donasi']);
                }
            }
        }

        return redirect()->back()->with('success', 'All donations verified successfully.');
    }

    public function unverifyAllDonasi()
    {
        if ($this->donasiModel->delete()) {
            return redirect()->back()->with('success', 'All donations deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete all donations.');
        }
    }
}
