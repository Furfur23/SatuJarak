<?php

namespace Database\Seeders;

use App\Models\PotensiDesa;
use Illuminate\Database\Seeder;

class PotensiDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $potensis = [
            [
                'nama' => 'Ikan Bakar Aseli Malaysia',
                'kategori' => 'UMKM',
                'pemilik' => 'Pak Toto Wolff',
                'lokasi' => 'Dusun Krajan',
                'kontak' => '081234567890',
                'deskripsi' => 'Kuliner khas olahan ikan bakar bumbu rempah tradisonal di Dusun Krajan.',
                'status' => 'Aktif',
            ],
            [
                'nama' => 'Sawah Padi Organik',
                'kategori' => 'Pertanian',
                'pemilik' => 'Kelompok Tani Makmur',
                'lokasi' => 'Dusun Jarak Kulon',
                'kontak' => '082345678901',
                'deskripsi' => 'Budidaya padi ramah lingkungan tanpa pestisida kimia dengan hasil beras pulen berkualitas.',
                'status' => 'Aktif',
            ],
            [
                'nama' => 'Keripik Tempe Renyah',
                'kategori' => 'UMKM',
                'pemilik' => 'Ibu Sri Rahayu',
                'lokasi' => 'Dusun Jarak Wetan',
                'kontak' => '083456789012',
                'deskripsi' => 'Camilan olahan tempe kedelai lokal renyah dan gurih berbagai varian rasa.',
                'status' => 'Aktif',
            ],
            [
                'nama' => 'Wisata Agro Petik Buah',
                'kategori' => 'Wisata',
                'pemilik' => 'BUMDes Jarak Mandiri',
                'lokasi' => 'Perbukitan Desa Jarak',
                'kontak' => '084567890123',
                'deskripsi' => 'Kawasan wisata edukasi alam petik buah segar langsung dari kebun perbukitan yang asri.',
                'status' => 'Aktif',
            ],
        ];

        foreach ($potensis as $item) {
            PotensiDesa::updateOrCreate(
                ['nama' => $item['nama']],
                $item
            );
        }
    }
}
