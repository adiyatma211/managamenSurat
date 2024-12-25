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
        Schema::create('mdl_surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->integer('no_agenda_keluar')->nullable();
            $table->datetime('tanggal_surat')->nullable();
            $table->datetime('tgl_surat_keluar')->nullable(); 
            $table->string('tujuan_surat')->nullable();
            $table->string('kode_surat')->nullable();
            $table->string('no_surat_keluar')->nullable();
            $table->string('prihal_surat_keluar')->nullable();
            $table->string('file_surat_keluar')->nullable();
            $table->string('penerima_surat_keluar')->nullable();
            $table->string('pengirim_keluar')->nullable();
            $table->string('createdBy')->nullable();
            $table->string('updatedBy')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mdl_surat_keluars');
    }
};
