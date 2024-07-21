<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;
use App\Models\DonasiModel;
use App\Models\DonasiZakatModel;
use App\Models\infakanakyatimModel;
use App\Models\kasmasjidModel;
use App\Models\zakatModel;

class verifikasiDonasi extends BaseController
{
    protected $dbdatamasjidModel;
    protected $zakatModel;
    protected $donasiModel;

    protected $donasiZakatModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->dbdatamasjidModel = new dbdatamasjidModel();
        $this->zakatModel = new zakatModel();
        $this->donasiModel = new DonasiModel();
        $this->donasiZakatModel = new donasiZakatModel();
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
                'keterangan' => 'Donasi dari ' . $donasi['nama_donatur'],
                'nominal' => $donasi['nominal'],
            ];

            $jenis = $donasi['jenis_donasi'];

            if ($jenis == 'pembangunan') {
                $data['jenis_kas'] = 'masuk';
                $modelKasmasjid->save($data);
                $this->donasiModel->update($id_donasi, $status);
            } else {
                $modelInfakanakyatim->save($data);
                $this->donasiModel->update($id_donasi, $status);
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

    public function verifyDonasiZakat($id_donasi)
    {
        $donasi = $this->donasiZakatModel->find($id_donasi);
        $modelKasmasjid = new zakatModel();
        if ($donasi) {
            $status = ['status' => 'verifikasi'];
            $data = [
                'tgl' => $donasi['created_at'],
                'id_beras' => $donasi['id_beras'],
                'id_masjid' => $donasi['id_masjid'],
                'keterangan' => 'Donasi dari ' . $donasi['nama_donatur'],
                'nominal' => $donasi['nominal'],
            ];
            $this->zakatModel->save($data);
            $this->donasiZakatModel->update($id_donasi, $status);
            return redirect()->back()->with('success', 'Donation verified successfully.');
        } else {
            return redirect()->back()->with('error', 'Donation not found.');
        }
    }

    public function unverifyDonasiZakat($id_donasi)
    {
        if ($this->donasiZakatModel->update($id_donasi, ['status' => 'ditolak'])) {
            return redirect()->back()->with('success', 'Donation deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete donation.');
        }
    }

    public function verifyAllDonasiZakat()
    {
        $donasiAll = $this->donasiZakatModel->findAll();
        foreach ($donasiAll as $key => $donasi) {
            if ($donasi) {
                $status = ['status' => 'verifikasi'];
                $data = [
                    'id_beras' => $donasi['id_beras'],
                    'tgl' => $donasi['created_at'],
                    'id_masjid' => $donasi['id_masjid'],
                    'keterangan' => $donasi['nama_donatur'],
                    'nominal' => $donasi['nominal'],
                ];

                $this->zakatModel->save($data);
                $this->donasiZakatModel->update($donasi['id_donasi'], $status);

            }
        }

        return redirect()->back()->with('success', 'All donations verified successfully.');
    }

    public function unverifyAllDonasiZakat()
    {
        $all = $this->donasiZakatModel->findAll();
        foreach ($all as $item) {
            $this->donasiZakatModel->update($item['id_donasi'], ['status' => 'ditolak']);
        }
        return redirect()->back()->with('success', 'All donations deleted successfully.');
    }

    public function verifyAllDonasi()
    {
        $donasiAll = $this->donasiModel->findAll();
        $modelKasmasjid = new kasmasjidModel();
        $modelInfakanakyatim = new infakanakyatimModel();
        foreach ($donasiAll as $key => $donasi) {
            if ($donasi) {
                $status = ['status' => 'verifikasi'];
                $jenis = $donasi['jenis_donasi'];
                $data = [
                    'tgl' => $donasi['created_at'],
                    'id_masjid' => $donasi['id_masjid'],
                    'keterangan' => $donasi['nama_donatur'],
                    'nominal' => $donasi['nominal'],
                ];
                if ($jenis == 'pembangunan') {
                    $data['jenis_kas'] = 'masuk';
                    $modelKasmasjid->save($data);
                    $this->donasiModel->update($donasi['id_donasi'], $status);
                } else {
                    $modelInfakanakyatim->save($data);
                    $this->donasiModel->update($donasi['id_donasi'], $status);
                }
            }
        }

        return redirect()->back()->with('success', 'All donations verified successfully.');
    }

    public function unverifyAllDonasi()
    {
        $all = $this->donasiModel->findAll();
        foreach ($all as $item) {
            $this->donasiModel->update($item['id_donasi'], ['status' => 'ditolak']);
        }
        return redirect()->back()->with('success', 'All donations deleted successfully.');
    }

    public function VerifikasiZakat($id_masjid)
    {
        // Mengambil data dari ketiga tabel berdasarkan id_masjid
        $db_data_masjid = $this->dbdatamasjidModel->where('id', $id_masjid)->findAll();
        $zakat = $this->zakatModel
            ->where('id_masjid', $id_masjid)->findAll();
        $donasi = $this->donasiZakatModel->where('donasi_zakat.id_masjid', $id_masjid)
            ->select(['id_donasi', 'donasi_zakat.id_masjid', 'donasi_zakat.id_beras', 'nama_donatur', 'ho_telp', 'alamat', 'status', 'bukti_transfer', 'nominal', 'jenis_beras', 'harga', 'created_at'])
            ->join('beras_zakat', 'beras_zakat.id_beras=donasi_zakat.id_beras')->where('status', null)->findAll();

        // Menggabungkan data dalam satu array
        $data = [
            'title' => 'verifikasi Pembayaran Zakat',
            'db_data_masjid' => $db_data_masjid,
            'zakat' => $zakat,
            'donasi' => $donasi, // Menambahkan data donasi
        ];

        // Mengirim data ke view
        return view('userprofile/verifikasiDZakat', $data);
    }
}
