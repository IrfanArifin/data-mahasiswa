<?php

namespace App\Models;

// Gunakan Authenticatable agar model ini bisa dipakai untuk Login
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use Notifiable;

    /**
     * Menonaktifkan timestamps (created_at dan updated_at).
     * WAJIB karena tabel Anda tidak memiliki kolom ini.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    /**
     * Atribut yang harus disembunyikan saat serialisasi (misal: diubah ke JSON).
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}