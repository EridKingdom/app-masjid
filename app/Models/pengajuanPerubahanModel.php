<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanPerubahanModel extends Model
{
    protected $table = 'pengajuan_perubahan';
    protected $primaryKey = 'id_ajuan';
    protected $allowedFields = [
        'id_masjid',
        'status',
        'nama_pengurus',
        'email',
        'username',
        'gambar_ktp',
        'no_telp',
        'alamat_pengurus',
        'role',
        'password',
        'created_at',
        'updated_at'
    ];

    public function getPengajuanById($id)
    {
        // Log query yang dijalankan
        log_message('debug', 'Query: ' . $this->where('id_ajuan', $id)->getCompiledSelect());

        return $this->where('id_ajuan', $id)->first();
    }

    public function getPengajuanWithMasjidStatus($keyword = null)
    {
        $builder = $this->db->table($this->table)
            ->select('pengajuan_perubahan.*, db_data_masjid.status')
            ->join('db_data_masjid', 'db_data_masjid.id = pengajuan_perubahan.id_masjid', 'left'); // Use left join to include all pengajuan records

        if ($keyword) {
            $builder->groupStart()
                ->like('nama_pengurus', $keyword)
                ->orLike('email', $keyword)
                ->orLike('username', $keyword)
                ->orLike('alamat_pengurus', $keyword)
                ->groupEnd();
        }

        return $builder->get()->getResultArray();
    }

    public function getPengajuanByMasjidId($masjidId)
    {
        return $this->select('pengajuan_perubahan.*, db_data_masjid.status')
            ->join('db_data_masjid', 'db_data_masjid.id = pengajuan_perubahan.id_masjid')
            ->where('pengajuan_perubahan.id_masjid', $masjidId)
            ->where('db_data_masjid.status', 'diterima')
            ->findAll();
    }
}
