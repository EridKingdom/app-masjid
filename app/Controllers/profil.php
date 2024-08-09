<?php

namespace App\Controllers;

use App\Models\dbdatamasjidModel;
use App\Models\tbkegiatanModel;
use App\Models\UserModel;
use App\Models\AgendaModel;


class Profil extends BaseController
{
    protected $dbdatamasjidModel;
    protected $tbkegiatanModel;
    protected $UserModel;
    protected $agendaModel;

    public function __construct()
    {
        // Menginisialisasi model dalam satu konstruktor
        $this->dbdatamasjidModel = new dbdatamasjidModel();
        $this->tbkegiatanModel = new tbkegiatanModel();
        $this->UserModel = new UserModel();
        $this->agendaModel = new AgendaModel();
    }

    public function index($id = null)
    {
        try {
            if ($id !== null) {
                // Mengambil data masjid berdasarkan ID
                $masjid = $this->dbdatamasjidModel->orderBy('created_at', 'DESC')->find($id);

                if (!$masjid) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Masjid dengan ID ' . $id . ' tidak ditemukan');
                }

                // Mengambil data pengurus terkait
                $pengurus = $this->UserModel
                    ->select('nama_pengurus, no_telp, email')
                    ->where('id_user', $masjid['id_user'])
                    ->first();

                // Mengambil kegiatan terkait
                $tb_kegiatan = $this->tbkegiatanModel->where('id_masjid', $id)->findAll();
                $tipe_postingan_list = $this->tbkegiatanModel->getUniqueTipePostingan();
                $agenda = $this->agendaModel->where('id_masjid', $id)->findAll();
                // Logging data untuk debugging
                log_message('debug', 'Masjid: ' . print_r($masjid, true));
                log_message('debug', 'Kegiatan: ' . print_r($tb_kegiatan, true));
                log_message('debug', 'Agenda: ' . print_r($agenda, true));

                // Menyiapkan data untuk view
                $data = [
                    'title' => 'Profil Masjid',
                    'masjid' => $masjid,
                    'pengurus' => $pengurus,
                    'tb_kegiatan' => $tb_kegiatan,
                    'tipe_postingan_list' => $tipe_postingan_list,
                    'agenda' => $agenda,
                ];

                return view('profil', $data);
            } else {
                // Jika tidak ada ID yang diberikan, tampilkan pesan kesalahan
                throw new \CodeIgniter\Exceptions\PageNotFoundException('ID masjid tidak diberikan');
            }
        } catch (\Exception $e) {
            // Mencatat pesan kesalahan
            log_message('error', $e->getMessage());
            // Menampilkan halaman kesalahan khusus
            return view('errors/custom_error', ['message' => $e->getMessage()]);
        }
    }

    public function getAgenda($id_masjid, $date)
    {
        try {
            $sudah = [];
            $belum = [];
            $agenda = $this->agendaModel->where('tgl', $date)->where('id_masjid', $id_masjid)->findAll();
            if(date("Y-m-d") > $date) {
                $sudah = $agenda;
            } elseif (date("Y-m-d") < $date) {
                $belum = $agenda;
            } elseif (date("Y-m-d") == $date) {
                $belum = array_values(array_filter($agenda, function ($a)
                {
                    if (time() <= strtotime($a['jam_agenda'])) {
                        return $a;
                    }
                }));
                $sudah = array_values(array_filter($agenda, function ($b)
                {
                    if (time() > strtotime($b['jam_agenda'])) {
                        return $b;
                    }
                }));
            }

            log_message('debug', 'Agenda: ' . print_r($agenda, true)); // Logging data agenda
            return $this->response->setJSON(['belum' => $belum, 'sudah' => $sudah]);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['error' => $e->getTraceAsString()]);
        }
    }

    public function getAgendaByMonth($id_masjid, $month, $year)
    {
        try {
            $agenda = $this->agendaModel->getAgendaByMonth($id_masjid, $month, $year);
            return $this->response->setJSON($agenda);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function getHighlightedDates($id_masjid)
    {
        try {
            $dates = $this->agendaModel->select('tgl')->where('id_masjid', $id_masjid)->findAll();
            return $this->response->setJSON($dates);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function superP($id = null)
    {
        try {
            if ($id !== null) {
                // Mengambil data masjid berdasarkan ID
                $masjid = $this->dbdatamasjidModel->orderBy('created_at', 'DESC')->find($id);

                if (!$masjid) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Masjid dengan ID ' . $id . ' tidak ditemukan');
                }

                // Mengambil kegiatan terkait
                $tb_kegiatan = $this->tbkegiatanModel->where('id_masjid', $id)->findAll();
                $tipe_postingan_list = $this->tbkegiatanModel->getUniqueTipePostingan();

                // Menyiapkan data untuk view
                $data = [
                    'title' => 'Profil Masjid',
                    'masjid' => $masjid,
                    'tb_kegiatan' => $tb_kegiatan,
                    'tipe_postingan_list' => $tipe_postingan_list, // Menambahkan tipe postingan ke data
                ];

                return view('viewsuper/profilsuper', $data);
            } else {
                // Jika tidak ada ID yang diberikan, tampilkan pesan kesalahan
                throw new \CodeIgniter\Exceptions\PageNotFoundException('ID masjid tidak diberikan');
            }
        } catch (\Exception $e) {
            // Mencatat pesan kesalahan
            log_message('error', $e->getMessage());
            // Menampilkan halaman kesalahan khusus
            return view('errors/custom_error', ['message' => $e->getMessage()]);
        }
    }

    public function details($slug)
    {
        echo $slug;
    }

    public function waktuSholat($id = null)
    {
        try {
            if ($id !== null) {
                // Mengambil data masjid berdasarkan ID
                $masjid = $this->dbdatamasjidModel->orderBy('created_at', 'DESC')->find($id);

                if (!$masjid) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Masjid dengan ID ' . $id . ' tidak ditemukan');
                }

                // Mengambil kegiatan terkait
                $tb_kegiatan = $this->tbkegiatanModel->where('id_masjid', $id)->findAll();

                // Menyiapkan data untuk view
                $data = [
                    'title' => 'Profil Masjid',
                    'masjid' => $masjid,
                    'tb_kegiatan' => $tb_kegiatan,
                ];

                return view('viewprofil/waktusholat', $data);
            } else {
                // Jika tidak ada ID yang diberikan, tampilkan pesan kesalahan
                throw new \CodeIgniter\Exceptions\PageNotFoundException('ID masjid tidak diberikan');
            }
        } catch (\Exception $e) {
            // Mencatat pesan kesalahan
            log_message('error', $e->getMessage());
            // Menampilkan halaman kesalahan khusus
            return view('errors/custom_error', ['message' => $e->getMessage()]);
        }
    }

    public function biodataP($id = null)
    {
        try {
            if ($id !== null) {
                // Mengambil data masjid berdasarkan ID
                $masjid = $this->dbdatamasjidModel->orderBy('created_at', 'DESC')->find($id);

                if (!$masjid) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Masjid dengan ID ' . $id . ' tidak ditemukan');
                }

                // Mengambil data pengurus terkait dengan join
                $pengurus = $this->UserModel
                    ->select('user.nama_pengurus, user.no_telp, user.email, user.alamat_pengurus, user.gambar_ktp')
                    ->join('db_data_masjid', 'user.id_user = db_data_masjid.id_user')
                    ->where('db_data_masjid.id', $id)
                    ->first();

                if (!$pengurus) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengurus untuk masjid dengan ID ' . $id . ' tidak ditemukan');
                }

                // Menyiapkan data untuk view
                $data = [
                    'title' => 'Biodata Pengurus',
                    'masjid' => $masjid,
                    'pengurus' => $pengurus,
                ];

                return view('viewsuper/biodatapengurus', $data);
            } else {
                // Jika tidak ada ID yang diberikan, tampilkan pesan kesalahan
                throw new \CodeIgniter\Exceptions\PageNotFoundException('ID masjid tidak diberikan');
            }
        } catch (\Exception $e) {
            // Mencatat pesan kesalahan
            log_message('error', $e->getMessage());
            // Menampilkan halaman kesalahan khusus
            return view('errors/custom_error', ['message' => $e->getMessage()]);
        }
    }
}