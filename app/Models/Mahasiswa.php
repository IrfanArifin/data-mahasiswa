<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    // public $timestamps = false; <-- HAPUS BARIS INI

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'email',
    ];
}