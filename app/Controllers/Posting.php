<?php

namespace App\Controllers;

use App\Models\TbKegiatanModel;
use CodeIgniter\Controller;

class Posting extends Controller
{
    public function create()
    {
        return view('userprofile/buatPostingan');
    }

    public function store()
    {
        $idMasjid = $this->request->getPost('id_masjid');
        $postType = $this->request->getPost('postType');
        $judulKegiatan = $this->request->getPost('judulKegiatan');
        $deskripsiKegiatan = $this->request->getPost('deskripsiKegiatan');
        $postMedia = $this->request->getFiles('postMedia');

        // Debugging

        // Validasi input
        log_message('debug', 'Deskripsi Kegiatan (before validation): ' . $deskripsiKegiatan);

        if (!$this->validate([
            'deskripsiKegiatan' => 'required|min_length[3]',
            'postMedia.*' => 'uploaded[postMedia]|max_size[postMedia,10240]|ext_in[postMedia,jpg,jpeg,png,mp4]',
        ])) {
            log_message('error', 'Validation failed: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        log_message('debug', 'Deskripsi Kegiatan (after validation): ' . $deskripsiKegiatan);

        // Proses file yang diunggah
        $uploadedFileName = '';
        foreach ($postMedia['postMedia'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'imgpostingan', $newName); // Simpan file di folder imgpostingan
                $uploadedFileName = $newName; // Simpan nama file
            }
        }

        // Log file upload status
        log_message('debug', 'Uploaded File Name: ' . $uploadedFileName);

        // Simpan konten postingan dan path file ke database
        $tbKegiatanModel = new TbKegiatanModel();
        $data = [
            'id_masjid' => $idMasjid,
            'tgl' => date('Y-m-d H:i:s'),
            'gambar_kegiatan' => $uploadedFileName, // Simpan nama file sebagai string
            'judul_kegiatan' => $judulKegiatan, // Menggunakan input pengguna untuk judul
            'tipe_postingan' => $postType,
            'deskripsi_kegiatan' => $deskripsiKegiatan, // Menggunakan input pengguna untuk deskripsi
        ];

        // Log data yang akan dimasukkan
        log_message('debug', 'Data yang akan dimasukkan (before save): ' . json_encode($data));

        if ($tbKegiatanModel->save($data)) {
            log_message('debug', 'Data berhasil disimpan');
        } else {
            log_message('error', 'Data gagal disimpan');
        }

        return redirect()->to('/profile')->with('message', 'Post berhasil dibuat');
    }
}
