<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_layanan',
        'nama_layanan',
        'kategori',
        'deskripsi',
        'link_url',
        'logo',
        'status',
        'urutan',
    ];

    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }
}
