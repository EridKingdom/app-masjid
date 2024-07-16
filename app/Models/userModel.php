<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'username',
        'password',
        'email',
        'gambar_ktp',
        'status',
        'alamat_pengurus',
        'no_telp',
        'nama_pengurus',
        'role',
        'created_at',
        'updated_at'
];

    public function validateLogin($username, $password)
    {
        $user = $this->where('username', $username)->first();

        if ($user) {
            return password_verify($password, $user['password']);
        }

        return false;
    }
}
