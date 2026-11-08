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
        if (! Schema::hasTable('potensi_desas')) {
            Schema::create('potensi_desas', function (Blueprint $table) {
                $table->id();
                $table->string('nama', 150);
                $table->string('kategori', 50)->default('UMKM');
                $table->string('pemilik', 150)->nullable();
                $table->string('lokasi', 150)->nullable();
                $table->string('kontak', 50)->nullable();
                $table->string('foto', 255)->nullable();
                $table->text('deskripsi')->nullable();
                $table->string('status', 50)->default('Aktif');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_desas');
    }
};
