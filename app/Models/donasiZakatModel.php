<?php

namespace App\Models;

use CodeIgniter\Model;

class DonasiZakataModel extends Model
{
    protected $table = 'donasi';
    protected $primaryKey = 'id_donasi';
    protected $allowedFields = [
        'id_masjid',
        'id_beras',
        'nama_donatur',
        'ho_telp',
        'alamat',
        'bukti_transfer',
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
