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
        Schema::create('antrian', function (Blueprint $table) {
            $table->string('id_pasien', 4); // Harus sama dengan tipe `id` di tabel `pasien`
            $table->foreign('id_pasien')->references('id')->on('pasien')->onDelete('cascade');
            $table->date('tanggal_antrian');
            $table->enum('status', ['menunggu', 'sedang diperiksa', 'selesai']);
            $table->foreignId('id_dokter')->constrained('pengguna')->onDelete('cascade');
            $table->timestamps();
        });        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrian');
    }
};
