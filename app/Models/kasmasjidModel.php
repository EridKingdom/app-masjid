<?php

namespace App\Models;

use CodeIgniter\Model;

class KasMasjidModel extends Model
{
    protected $table = 'kas_masjid';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_masjid',
        'tgl',
        'keterangan',
        'jenis_kas',
        'nominal',
        'created_at',
        'updated_at'
    ];
}
