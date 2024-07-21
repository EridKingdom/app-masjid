<?php

namespace App\Controllers;

use App\Models\Agenda;
use App\Models\AgendaModel;
use App\Models\dbdatamasjidModel;
use App\Models\tbkegiatanModel;

class profile extends BaseController
{
    protected $dbdatamasjidModel;
    protected $tbkegiatanModel;
    protected $agendaModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->dbdatamasjidModel = new dbdatamasjidModel();
        $this->tbkegiatanModel = new tbkegiatanModel();
        $this->agendaModel = new AgendaModel();
    }

    public  function getAgenda($id_masjid, $date)
    {
        $agenda = $this->agendaModel->where('tgl', $date)->where('id_masjid', $id_masjid)->findAll();
        return $this->response->setJSON($agenda);
    }

    public function tambahAgenda($id_masjid)
    {
        $data = $this->request->getPost();
        $data['id_masjid'] = $id_masjid;
        $this->agendaModel->save($data);
        return redirect()->back();
    }

    public function hapusAgenda()
    {

        $ids = $this->request->getVar('ids');
        if (count($ids) > 0) {
            $this->agendaModel->delete($ids);
        }
        return $this->response->setJSON(['success' => true]);
    }

    public function index()
    {
        try {
            // Mengambil data dari kedua tabel
            $db_data_masjid = $this->dbdatamasjidModel->findAll();
            $tb_kegiatan = $this->tbkegiatanModel->findAll();
            $tipe_postingan_list = $this->tbkegiatanModel->getUniqueTipePostingan();
            $agenda = $this->agendaModel->findAll();

            // Debugging: Log the data to see if it's being fetched correctly
            log_message('debug', 'db_data_masjid: ' . print_r($db_data_masjid, true));
            log_message('debug', 'tb_kegiatan: ' . print_r($tb_kegiatan, true));

            // Menggabungkan data dalam satu array
            $data = [
                'title' => 'Daftar Masjid dan Postingan',
                'db_data_masjid' => $db_data_masjid,
                'tb_kegiatan' => $tb_kegiatan,
                'tipe_postingan_list' => $tipe_postingan_list,
                'agenda' => $agenda
            ];

            return view('userprofile/profile', $data);
        } catch (\Exception $e) {
            // Log the error message
            log_message('error', $e->getMessage());
            // Show a custom error page
            return view('errors/custom_error', ['message' => $e->getMessage()]);
        }
    }

    public function details($slug)
    {
        echo $slug;
    }
}
