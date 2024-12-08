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
        Schema::create('minat_bakats', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama siswa
            $table->string('kelas'); // Kelas siswa
            $table->text('deskripsi')->nullable(); 
            $table->text('minat')->nullable(); 
            $table->text('bakat')->nullable(); // Deskripsi minat dan bakat siswa
            // Deskripsi minat dan bakat siswa
            // Deskripsi minat dan bakat siswa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minat_bakat');
    }
};
