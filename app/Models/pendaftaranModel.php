<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranMasjidModel extends Model
{
    protected $table = 'pendaftaran_masjid';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_user',
        'sampul',
        'nama_masjid',
        'provinsi',
        'deskripsi',
        'kota_kab',
        'alamat_masjid',
        'no_rekening',
        'nama_bank',
        'gambar1',
        'gambar2',
        'gambar3',
        'created_at',
        'updated_at'
    ];

    public function getMasjidById($id)
    {
        // Log query yang dijalankan (kode lama)
        log_message('debug', 'Query: ' . $this->where('id', $id)->getCompiledSelect());

        // Kode lama
        $result = $this->where('id', $id)->first();

        // Log query yang dijalankan (kode baru)
        log_message('debug', 'Query with join: ' . $this->where('pendaftaran_masjid.id', $id)->join('user', 'user.id = pendaftaran_masjid.id_user')->getCompiledSelect());

        // Kode baru
        $resultWithJoin = $this->where('pendaftaran_masjid.id', $id)
            ->join('user', 'user.id = pendaftaran_masjid.id_user')
            ->first();

        return [
            'old_result' => $result,
            'new_result' => $resultWithJoin
        ];
    }
}
