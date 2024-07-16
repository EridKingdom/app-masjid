<?php

namespace App\Models;

use CodeIgniter\Model;

class DbDataMasjidModel extends Model
{
    protected $table = 'db_data_masjid';
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
        'tahun_berdiri',
        'luas_bangunan',
        'surat_takmir',
        'sertifikat',
        'luas_tanah',
        'jenis_tipologi',
        'gambar1',
        'gambar2',
        'gambar3',
        'created_at',
        'updated_at'
    ];

    public function getMasjidById($id)
    {
        // Log query yang dijalankan
        log_message('debug', 'Query: ' . $this->where('id', $id)->getCompiledSelect());

        return $this->where('id', $id)->first();
    }
}
