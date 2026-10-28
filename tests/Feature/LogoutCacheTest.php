<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class LogoutCacheTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    public static function personalizedPages(): array
    {
        return [['/', false], ['/userpengajuan', false], ['/admin/dashboard', true]];
    }

    #[DataProvider('personalizedPages')]
    public function test_personalized_pages_must_not_be_stored_in_browser_cache(string $path, bool $admin): void
    {
        $response = $this->actingAs(User::factory()->create(['is_admin' => $admin]))
            ->get($path)->assertOk();

        $this->assertTrue($response->headers->hasCacheControlDirective('no-store'));
        $this->assertTrue($response->headers->hasCacheControlDirective('private'));
    }

    public static function logoutRoles(): array
    {
        return [[false], [true]];
    }

    #[DataProvider('logoutRoles')]
    public function test_logout_rejects_the_old_session_cookie(bool $admin): void
    {
        config(['session.driver' => 'database']);
        $user = User::factory()->create(['is_admin' => $admin]);
        $this->post(route($admin ? 'admin.login.submit' : 'login.submit'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route($admin ? 'admin.dashboard' : 'pengajuan.index'));

        $oldSession = session()->getId();
        $this->withCookie(config('session.cookie'), $oldSession)
            ->post(route('logout'))->assertRedirect(route('home'));
        $this->assertGuest();
        $this->assertDatabaseMissing('sessions', ['id' => $oldSession]);

        $this->app['auth']->forgetGuards();
        $this->app['session']->forgetDrivers();
        $this->withCookie(config('session.cookie'), $oldSession)
            ->get(route($admin ? 'admin.dashboard' : 'pengajuan.index'))
            ->assertRedirect(route('login'));
    }
}
