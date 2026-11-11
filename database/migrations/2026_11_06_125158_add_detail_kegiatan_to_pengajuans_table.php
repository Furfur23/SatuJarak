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
        Schema::table('pengajuans', function (Blueprint $table) {
            if (! Schema::hasColumn('pengajuans', 'universitas')) {
                $table->string('universitas')->nullable()->after('nim');
            }
            if (! Schema::hasColumn('pengajuans', 'fakultas')) {
                $table->string('fakultas')->nullable()->after('universitas');
            }
            if (! Schema::hasColumn('pengajuans', 'lokasi')) {
                $table->string('lokasi')->nullable()->after('judul_kerjasama');
            }
            if (! Schema::hasColumn('pengajuans', 'jumlah_peserta')) {
                $table->integer('jumlah_peserta')->nullable()->after('lokasi');
            }
            if (! Schema::hasColumn('pengajuans', 'dosen_pembimbing')) {
                $table->string('dosen_pembimbing')->nullable()->after('tanggal_selesai');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->dropColumn([
                'universitas',
                'fakultas',
                'lokasi',
                'jumlah_peserta',
                'dosen_pembimbing',
            ]);
        });
    }
};
