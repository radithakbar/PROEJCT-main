<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('konseling_kelompoks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_bk_id')->constrained('guru_b_k_s')->onDelete('cascade');
            $table->string('nama_kelompok');
            $table->string('kelas');
            $table->string('jurusan'); // RPL, TKJ, MM, BC
            $table->json('anggota_kelompok'); // Simpan dalam bentuk array JSON
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konseling_kelompoks');
    }
};
