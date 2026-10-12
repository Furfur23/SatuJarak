<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengajuan extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nim',
        'email_pemohon',
        'no_hp',
        'program_studi',
        'nama_instansi',
        'jenis_kegiatan',
        'judul_kerjasama',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'file_proposal',
        'file_surat',
        'status',
        'catatan_admin',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];

    // ── Relasi ──────────────────────────────────────────────
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ── Scopes helper ───────────────────────────────────────
    public function scopeMenunggu($query)
    {
        return $query->where('status', 'Menunggu Verifikasi');
    }

    public function scopeProses($query)
    {
        return $query->where('status', 'Sedang Diproses');
    }

    public function scopeSelesai($query)
    {
        return $query->where('status', 'Selesai');
    }
}
