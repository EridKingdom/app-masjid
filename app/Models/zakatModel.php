<?php

namespace App\Models;

use CodeIgniter\Model;

class ZakatModel extends Model
{
    protected $table = 'zakat';
    protected $primaryKey = 'id_zakat';
    protected $allowedFields = [
        'tgl',
        'id_masjid',
        'keterangan',
        'id_beras',
        'nominal',
        'created_at',
        'updated_at'
    ];
}
