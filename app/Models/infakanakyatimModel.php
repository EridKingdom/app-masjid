<?php

namespace App\Models;

use CodeIgniter\Model;

class InfakAnakYatimModel extends Model
{
    protected $table = 'infak_anak_yatim';
    protected $primaryKey = 'id_infak';
    protected $allowedFields = [
        'id_masjid',
        'tgl',
        'keterangan',
        'nominal',
        'created_at',
        'updated_at'
    ];
}
