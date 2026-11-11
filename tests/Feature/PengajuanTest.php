<?php

namespace Tests\Feature;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PengajuanTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    public function test_user_can_view_own_pengajuan(): void
    {
        $user = User::factory()->create(['is_admin' => false]);
        $pengajuan = Pengajuan::create([
            'user_id' => $user->id,
            'nama_lengkap' => 'Budi Santoso',
            'email_pemohon' => 'budi@example.com',
            'no_hp' => '081234567890',
            'nama_instansi' => 'Universitas Indonesia',
            'jenis_kegiatan' => 'KKN',
            'judul_kerjasama' => 'Program Desa Cerdas',
            'status' => 'Menunggu Verifikasi',
        ]);

        $response = $this->actingAs($user)->get(route('pengajuan.show', $pengajuan->id));

        $response->assertStatus(200);
        $response->assertSee('Budi Santoso');
        $response->assertSee('Menunggu Verifikasi');
    }

    public function test_user_cannot_view_others_pengajuan(): void
    {
        $owner = User::factory()->create(['is_admin' => false]);
        $otherUser = User::factory()->create(['is_admin' => false]);

        $pengajuan = Pengajuan::create([
            'user_id' => $owner->id,
            'nama_lengkap' => 'Pemohon Asli',
            'email_pemohon' => 'pemohon@example.com',
            'no_hp' => '081234567890',
            'nama_instansi' => 'Universitas Asli',
            'jenis_kegiatan' => 'Riset',
            'judul_kerjasama' => 'Penelitian Tanaman',
            'status' => 'Sedang Diproses',
        ]);

        $response = $this->actingAs($otherUser)->get(route('pengajuan.show', $pengajuan->id));

        $response->assertStatus(403);
    }

    public function test_admin_can_view_any_pengajuan(): void
    {
        $owner = User::factory()->create(['is_admin' => false]);
        $admin = User::factory()->create(['is_admin' => true]);

        $pengajuan = Pengajuan::create([
            'user_id' => $owner->id,
            'nama_lengkap' => 'Warga Pemohon',
            'email_pemohon' => 'warga@example.com',
            'no_hp' => '081234567890',
            'nama_instansi' => 'UNESA',
            'jenis_kegiatan' => 'KKN',
            'judul_kerjasama' => 'KKN Tematik',
            'status' => 'Sedang Diproses',
        ]);

        $response = $this->actingAs($admin)->get(route('pengajuan.show', $pengajuan->id));

        $response->assertStatus(200);
        $response->assertSee('Warga Pemohon');
    }
}
