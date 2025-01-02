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
            $table->id(); 
            $table->string('id_pasien', 4);
            $table->foreign('id_pasien')->references('id')->on('pasien')->onDelete('cascade');
            $table->foreignId('dokter_id')->constrained('pengguna')->onDelete('cascade'); 
            $table->enum('status', ['menunggu', 'diproses', 'selesai']);
            $table->string('nomor_antrian');
            $table->timestamp('waktu_antrian')->nullable();
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
