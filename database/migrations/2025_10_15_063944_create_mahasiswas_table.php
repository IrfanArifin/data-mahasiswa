<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_xxxxxx_create_mahasiswas_table.php
public function up(): void
{
    Schema::create('mahasiswa', function (Blueprint $table) {
        $table->id();
        $table->string('nim', 15)->unique();
        $table->string('nama', 100);
        $table->string('jurusan', 50);
        $table->string('email')->nullable();
        // Laravel otomatis menambahkan created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
