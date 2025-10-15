<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    // Nama tabel eksplisit (default Laravel: 'users', tapi model ini memakai 'Users')
    protected $table = 'users';

    protected $primaryKey = 'id';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    // Kolom yang disembunyikan saat serialisasi
    protected $hidden = [
        'password',
    ];

    // Tipe data enum untuk role (opsional, validasi di model)
    // public const ROLE_ADMIN = 'admin';
    // public const ROLE_VIEWER = 'viewer';
}