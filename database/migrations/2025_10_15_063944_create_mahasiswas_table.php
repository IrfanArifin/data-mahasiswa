<?php
// database/migrations/xxxx_create_mahasiswas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tetap menggunakan nama 'mahasiswa'
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 15)->unique();
            $table->string('nama', 100);
            $table->string('jurusan', 50);
            $table->string('email')->nullable();
            $table->timestamps(); // <-- 1. TAMBAHKAN BARIS INI
        });
    }

    public function down(): void
    {
        // 2. SAMAKAN NAMA TABEL DENGAN YANG DI ATAS
        Schema::dropIfExists('mahasiswa'); 
    }
};