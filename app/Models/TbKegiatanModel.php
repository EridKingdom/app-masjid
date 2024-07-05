<?php

namespace App\Models;

use CodeIgniter\Model;

class TbKegiatanModel extends Model
{
    protected $table = 'tb_kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $allowedFields = [
        'id_masjid',
        'tgl',
        'gambar_kegiatan',
        'judul_kegiatan',
        'tipe_postingan',
        'deskripsi_kegiatan',
        'created_at',
        'updated_at'
    ];

    public function getKegiatanWithMasjid()
    {
        return $this->select('tb_kegiatan.*, db_data_masjid.nama_masjid, db_data_masjid.sampul')
            ->join('db_data_masjid', 'db_data_masjid.id = tb_kegiatan.id_masjid')
            ->findAll();
    }
}
