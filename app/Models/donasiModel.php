<?php

namespace App\Models;

use CodeIgniter\Model;

class DonasiModel extends Model
{
    protected $table = 'donasi';
    protected $primaryKey = 'id_donasi';
    protected $allowedFields = [
        'id_masjid',
        'nama_donatur',
        'ho_telp',
        'alamat',
        'jenis_donasi',
        'bukti_transfer',
        'status',
        'nominal',
        'create_at',
        'update_at'
    ];

    public function getDonasiById($id)
    {
        // Log query yang dijalankan
        log_message('debug', 'Query: ' . $this->where('id_donasi', $id)->getCompiledSelect());

        return $this->where('id_donasi', $id)->first();
    }
}
