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

    public function index()
    {
        // Mengambil data dari ketiga tabel
        $db_data_masjid = $this->dbdatamasjidModel->findAll();
        $zakat = $this->zakatModel->findAll();
        $donasi = $this->donasiModel->findAll();

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
        if ($donasi) {
            $zakatData = [
                'tgl' => $donasi['create_at'],
                'id_masjid' => $donasi['id_masjid'],
                'keterangan' => $donasi['nama_donatur'],
                'nominal' => $donasi['nominal'],
            ];
            if ($this->zakatModel->save($zakatData)) {
                $this->donasiModel->delete($id_donasi);
                return redirect()->back()->with('success', 'Donation verified successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to verify donation.');
            }
        } else {
            return redirect()->back()->with('error', 'Donation not found.');
        }
    }

    public function unverifyDonasi($id_donasi)
    {
        if ($this->donasiModel->delete($id_donasi)) {
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
                    'tgl' => $donasi['create_at'],
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
