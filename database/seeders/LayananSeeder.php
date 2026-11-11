<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'kode_layanan' => 'LYN-001',
                'nama_layanan' => 'Antrean Online Dukcapil',
                'deskripsi' => 'Ambil nomor antrean untuk layanan administrasi kependudukan.',
                'link_url' => 'https://dukcapil.kedirikab.go.id',
                'logo' => 'images/logo kediri.png',
                'kategori' => 'masyarakat',
                'status' => 'Aktif',
                'urutan' => 1,
            ],
            [
                'kode_layanan' => 'LYN-002',
                'nama_layanan' => 'ESPPT-I',
                'deskripsi' => 'Layanan terkait SPPT pajak bumi dan bangunan.',
                'link_url' => 'https://esppt.kedirikab.go.id',
                'logo' => 'images/logo kediri.png',
                'kategori' => 'masyarakat',
                'status' => 'Aktif',
                'urutan' => 2,
            ],
            [
                'kode_layanan' => 'LYN-003',
                'nama_layanan' => 'PESONA',
                'deskripsi' => 'Pelayanan sistem online administrasi kependudukan.',
                'link_url' => 'https://pesona.kedirikab.go.id',
                'logo' => 'images/logo kediri.png',
                'kategori' => 'masyarakat',
                'status' => 'Aktif',
                'urutan' => 3,
            ],
            [
                'kode_layanan' => 'LYN-004',
                'nama_layanan' => 'SIKSNG',
                'deskripsi' => 'Sistem Informasi Kesejahteraan Sosial Next Generation.',
                'link_url' => 'https://siks.kemensos.go.id',
                'logo' => 'images/logo kediri.png',
                'kategori' => 'aparatur',
                'status' => 'Aktif',
                'urutan' => 4,
            ],
            [
                'kode_layanan' => 'LYN-005',
                'nama_layanan' => 'SIPENAK (SIMNANGKIS)',
                'deskripsi' => 'Sistem informasi penanggulangan kemiskinan.',
                'link_url' => 'https://sipenak.kedirikab.go.id',
                'logo' => 'images/logo kediri.png',
                'kategori' => 'aparatur',
                'status' => 'Aktif',
                'urutan' => 5,
            ],
            [
                'kode_layanan' => 'LYN-006',
                'nama_layanan' => 'Sistem Kependudukan',
                'deskripsi' => 'Pengelolaan data penduduk desa terintegrasi.',
                'link_url' => 'https://prodeskel.binapemdes.kemendagri.go.id',
                'logo' => 'images/logo kediri.png',
                'kategori' => 'aparatur',
                'status' => 'Aktif',
                'urutan' => 6,
            ],
            [
                'kode_layanan' => 'LYN-007',
                'nama_layanan' => 'SIMKAH 4',
                'deskripsi' => 'Sistem informasi manajemen nikah online.',
                'link_url' => 'https://simkah4.kemenag.go.id',
                'logo' => 'images/logo simkah.png',
                'kategori' => 'masyarakat',
                'status' => 'Aktif',
                'urutan' => 7,
            ],
            [
                'kode_layanan' => 'LYN-008',
                'nama_layanan' => 'Website Desa Jarak',
                'deskripsi' => 'Portal resmi informasi dan profil Desa Jarak.',
                'link_url' => 'https://desajarak.id',
                'logo' => 'images/logo.png',
                'kategori' => 'masyarakat',
                'status' => 'Aktif',
                'urutan' => 8,
            ],
        ];

        foreach ($services as $service) {
            Layanan::updateOrCreate(
                ['kode_layanan' => $service['kode_layanan']],
                $service
            );
        }
    }
}
