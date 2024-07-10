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

    public function update($id_kegiatan)
    {
        $tbKegiatanModel =  new TbKegiatanModel();
        $posting = $tbKegiatanModel->find($id_kegiatan);
        return view('userprofile/editPostingan', $posting);
    }

    public function store()
    {
        $idMasjid = $this->request->getPost('id_masjid');
        $postType = $this->request->getPost('postType');
        $tgl = $this->request->getPost('tgl');
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
            'tgl' => $tgl,
            'gambar_kegiatan' => $uploadedFileName, // Simpan nama file sebagai string
            'judul_kegiatan' => $judulKegiatan, // Menggunakan input pengguna untuk judul
            'tipe_postingan' => $postType,
            'deskripsi_kegiatan' => $deskripsiKegiatan, // Menggunakan input pengguna untuk deskripsi
        ];

        // Log data yang akan dimasukkan
        log_message('debug', 'Data yang akan dimasukkan (before save): ' . json_encode($data));

        if ($tbKegiatanModel->save($data)) {
            log_message('debug', 'Data berhasil disimpan');
            // Set flash data
            session()->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            log_message('error', 'Data gagal disimpan');
        }

        return redirect()->to('/profile');
    }

    public function edit($id_kegiatan)
    {
        $tbKegiatanModel = new TbKegiatanModel();
        $existingData = $tbKegiatanModel->find($id_kegiatan);

        if (!$existingData) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $idMasjid = $this->request->getPost('id_masjid');
        $postType = $this->request->getPost('postType');
        $tgl = $this->request->getPost('tgl');
        $judulKegiatan = $this->request->getPost('judul_kegiatan');
        $deskripsiKegiatan = $this->request->getPost('deskripsi_kegiatan');
        $postMedia = $this->request->getFiles('postMedia');

        // Debugging
        log_message('debug', 'Deskripsi Kegiatan (after validation): ' . $deskripsiKegiatan);

        // Proses file yang diunggah
        $uploadedFileName = $existingData['gambar_kegiatan']; // Default to existing file name
        foreach ($postMedia['postMedia'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'imgpostingan', $newName);
                $uploadedFileName = $newName;
            }
        }

        // Log file upload status
        log_message('debug', 'Uploaded File Name: ' . $uploadedFileName);

        // Update konten postingan dan path file ke database
        $data = [
            'id_masjid' => $idMasjid,
            'tgl' => $tgl,
            'gambar_kegiatan' => $uploadedFileName, // Simpan nama file sebagai string
            'judul_kegiatan' => $judulKegiatan, // Menggunakan input pengguna untuk judul
            'tipe_postingan' => $postType,
            'deskripsi_kegiatan' => $deskripsiKegiatan, // Menggunakan input pengguna untuk deskripsi
        ];

        // Log data yang akan dimasukkan
        log_message('debug', 'Data yang akan dimasukkan (before save): ' . json_encode($data));

        if ($tbKegiatanModel->update($id_kegiatan, $data)) {
            log_message('debug', 'Data berhasil diperbarui');
        } else {
            log_message('error', 'Data gagal diperbarui');
        }

        return redirect()->to('/profile')->with('message', 'Post berhasil diperbarui');
    }

    public function delete($id_kegiatan)
    {
        $tbKegiatanModel = new TbKegiatanModel();
        $tbKegiatanModel->delete($id_kegiatan);
        return redirect()->to('/profile')->with('message', 'Post berhasil dihapus');
    }
}
