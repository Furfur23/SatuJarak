<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori',
        'ringkasan',
        'isi',
        'gambar',
        'status',
    ];

    public function scopePublikasi($query)
    {
        return $query->where('status', 'Publikasi');
    }
}
