<?php

namespace App\Models;

use CodeIgniter\Model;



class AgendaModel extends Model
{

    protected $table = 'agenda';
    protected $primaryKey = 'id_agenda';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'id_masjid',
        'tgl',
        'jam_agenda',
        'status',
        'nama_agenda',
        'created_at',
        'updated_at'
    ];

    protected $allowedFields = [
        'id_masjid',
        'tgl',
        'jam_agenda',
        'status',
        'nama_agenda',
        'created_at',
        'updated_at'
    ];

    // Kolom yang harus dianggap sebagai tanggal
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
