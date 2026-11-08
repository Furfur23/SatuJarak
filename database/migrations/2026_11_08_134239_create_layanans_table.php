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
        if (! Schema::hasTable('layanans')) {
            Schema::create('layanans', function (Blueprint $table) {
                $table->id();
                $table->string('kode_layanan', 50)->nullable()->unique();
                $table->string('nama_layanan', 150);
                $table->string('kategori', 50)->default('masyarakat');
                $table->text('deskripsi')->nullable();
                $table->string('link_url', 255)->nullable();
                $table->string('logo', 255)->nullable();
                $table->string('status', 50)->default('Aktif');
                $table->integer('urutan')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
