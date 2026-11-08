<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Akun Admin Utama SatuJarak
        User::updateOrCreate(
            ['email' => 'admin@satujarak.desa.id'],
            [
                'name' => 'Administrator SatuJarak',
                'password' => 'adminjarak2026',
                'is_admin' => true,
                'role' => 'Admin',
                'status' => 'Aktif',
            ]
        );

        $this->call([
            LayananSeeder::class,
            PotensiDesaSeeder::class,
        ]);
    }
}
