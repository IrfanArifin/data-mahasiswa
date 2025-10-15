<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan ini
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Tambahkan ini untuk API Token

class User extends Authenticatable
{
    // Tambahkan trait yang diperlukan
    use HasApiTokens, HasFactory, Notifiable;

    // public $timestamps = false; <-- HAPUS BARIS INI

    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token', // Tambahkan ini
    ];

    // Tambahkan ini untuk hashing password otomatis (best practice)
    protected $casts = [
        'password' => 'hashed',
    ];
}