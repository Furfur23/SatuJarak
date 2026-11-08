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
        if (! Schema::hasTable('informasi_desas')) {
            Schema::create('informasi_desas', function (Blueprint $table) {
                $table->id();
                $table->string('judul', 200);
                $table->string('kategori', 50)->default('Layanan');
                $table->text('ringkasan')->nullable();
                $table->longText('isi')->nullable();
                $table->string('gambar', 255)->nullable();
                $table->string('status', 50)->default('Publikasi');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_desas');
    }
};
