<?php

namespace App\Models;

use CodeIgniter\Model;

class BerasZakatModel extends Model
{
    protected $table = 'beras_zakat';
    protected $primaryKey = 'id_beras';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false; // Assuming there are no timestamp columns
    protected $dateFormat = 'datetime'; // Set to a valid format

    // Add the allowedFields property
    protected $allowedFields = [
        'id_masjid',
        'jenis_beras',
        'harga'
    ];

    // Kolom yang harus dianggap sebagai tanggal
    protected $dates = [];
}
