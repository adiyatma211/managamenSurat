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
        Schema::create('mdl_surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->integer('no_agenda')->nullable();
            $table->string('kode_surat')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->datetime('tgl_masuk')->nullable(); // Menggunakan datetime untuk tgl_masuk
            $table->datetime('tgl_terima')->nullable(); // Menggunakan datetime untuk tgl_terima
            $table->string('asal_surat')->nullable();
            $table->string('prihal')->nullable();
            $table->string('file_surat')->nullable();
            $table->string('penerima')->nullable();
            $table->string('createdBy')->nullable(); // Dibuat nullable jika tidak selalu diisi
            $table->string('updatedBy')->nullable(); // Dibuat nullable jika tidak selalu diisi
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mdl_surat_masuks');
    }
};
