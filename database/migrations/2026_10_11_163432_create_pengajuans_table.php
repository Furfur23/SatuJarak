<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // Data pemohon
            $table->string('nama_lengkap');
            $table->string('nim')->nullable();
            $table->string('email_pemohon');
            $table->string('no_hp');
            $table->string('program_studi')->nullable();

            // Data institusi/kegiatan
            $table->string('nama_instansi');
            $table->string('jenis_kegiatan');   // KKN, Penelitian, dll.
            $table->string('judul_kerjasama');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->text('deskripsi')->nullable();

            // Dokumen
            $table->string('file_proposal')->nullable();   // path di storage
            $table->string('file_surat')->nullable();

            // Status alur
            $table->enum('status', [
                'Menunggu Verifikasi',
                'Sedang Diproses',
                'Selesai',
                'Ditolak',
            ])->default('Menunggu Verifikasi');

            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
