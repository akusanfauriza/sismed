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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->string('id_pasien', 4); // Panjang dan tipe data harus sama dengan kolom `id` di tabel `pasien`
            $table->foreign('id_pasien')->references('id')->on('pasien')->onDelete('cascade');
            $table->foreignId('id_dokter')->constrained('pengguna')->onDelete('cascade');
            $table->text('diagnosa');
            $table->foreignId('id_obat')->constrained('obat')->onDelete('cascade');
            $table->text('catatan')->nullable();
            $table->date('tanggal_periksa');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
