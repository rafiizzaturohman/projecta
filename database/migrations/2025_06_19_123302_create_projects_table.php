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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('deadline')->nullable();
            
            $table->string('kd_prodi');
            $table->foreign('kd_prodi')->references('kd_prodi')->on('prodis')->onDelete('cascade');
            
            $table->string('kd_matakuliah');
            $table->foreign('kd_matakuliah')->references('kd_matakuliah')->on('matakuliahs')->onDelete('cascade');
            
            $table->string('mahasiswa_nim');
            $table->foreign('mahasiswa_nim')->references('nim')->on('users')->onDelete('cascade');
            
            $table->enum('status', ['belum', 'proses', 'selesai'])->default('belum');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
