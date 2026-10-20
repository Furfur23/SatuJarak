<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Cache\RateLimiter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->assertSame(':memory:', config('database.connections.sqlite.database'));
        $this->withoutVite();
    }

    public function test_registration_hashes_password_and_does_not_accept_admin_role(): void
    {
        $this->post(route('daftar.submit'), [
            'name' => 'Warga',
            'email' => 'warga@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'is_admin' => true,
        ])->assertRedirect(route('pengajuan.index'));

        $user = User::where('email', 'warga@example.com')->firstOrFail();
        $this->assertFalse($user->is_admin);
        $this->assertTrue(Hash::check('password123', $user->password));
        $this->assertAuthenticatedAs($user);
    }

    public function test_registration_rejects_duplicate_email_and_mismatched_password(): void
    {
        $user = User::factory()->create();

        $this->post(route('daftar.submit'), [
            'name' => 'Warga',
            'email' => $user->email,
            'password' => 'password123',
            'password_confirmation' => 'different123',
        ])->assertSessionHasErrors(['email', 'password']);

        $this->assertDatabaseCount('users', 1);
        $this->assertGuest();
    }

    public function test_user_login_regenerates_session_and_logout_clears_it(): void
    {
        $user = User::factory()->create();
        $this->withSession(['private_marker' => 'secret']);
        $sessionId = session()->getId();

        $this->post(route('login.submit'), [
            'email' => $user->email, 'password' => 'password',
        ])->assertRedirect(route('pengajuan.index'));

        $this->assertAuthenticatedAs($user);
        $this->assertNotSame($sessionId, session()->getId());
        $token = session()->token();

        $this->post(route('logout'))->assertRedirect(route('home'))
            ->assertSessionMissing('private_marker');

        $this->assertGuest();
        $this->assertNotSame($token, session()->token());
        $this->get('/admin/dashboard')->assertRedirect(route('login'));
    }

    public function test_admin_login_accepts_admin(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->post(route('admin.login.submit'), [
            'email' => $admin->email, 'password' => 'password',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($admin);
    }

    public function test_admin_login_rejects_non_admin_before_emitting_login_event(): void
    {
        $user = User::factory()->create();
        Event::fake([Login::class]);

        $this->post(route('admin.login.submit'), [
            'email' => $user->email, 'password' => 'password',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
        Event::assertNotDispatched(Login::class);
    }

    public static function loginRoutes(): array
    {
        return [['login.submit', false], ['admin.login.submit', true]];
    }

    #[DataProvider('loginRoutes')]
    public function test_failed_logins_are_limited_and_expire(string $route, bool $admin): void
    {
        $user = User::factory()->create(['is_admin' => $admin]);
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route($route), [
                'email' => $user->email, 'password' => 'wrong',
            ])->assertSessionHasErrors('email');
        }

        $this->post(route($route), [
            'email' => $user->email, 'password' => 'password',
        ])->assertSessionHasErrors('email');
        $this->assertGuest();

        $this->travel(61)->seconds();
        $this->post(route($route), [
            'email' => $user->email, 'password' => 'password',
        ])->assertRedirect(route($admin ? 'dashboard' : 'pengajuan.index'));
        $this->assertAuthenticatedAs($user);
    }

    #[DataProvider('loginRoutes')]
    public function test_login_works_with_database_session_and_cache(string $route, bool $admin): void
    {
        config(['session.driver' => 'database', 'cache.default' => 'database']);
        $this->app->forgetInstance(RateLimiter::class);
        $user = User::factory()->create(['is_admin' => $admin]);

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route($route), [
                'email' => $user->email, 'password' => 'wrong',
            ])->assertSessionHasErrors('email');
        }

        $this->post(route($route), [
            'email' => $user->email, 'password' => 'password',
        ])->assertSessionHasErrors('email');
        $this->assertGuest();
        $this->assertGreaterThan(0, DB::table('cache')->count());

        $this->travel(61)->seconds();
        $this->post(route($route), [
            'email' => $user->email, 'password' => 'password',
        ])->assertRedirect(route($admin ? 'dashboard' : 'pengajuan.index'));

        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseHas('sessions', ['user_id' => $user->id]);

        $sessionId = session()->getId();
        $this->withCookie(config('session.cookie'), $sessionId)
            ->post(route('logout'))->assertRedirect(route('home'));
        $this->assertGuest();
        $this->assertDatabaseMissing('sessions', ['id' => $sessionId]);
    }

    #[DataProvider('loginRoutes')]
    public function test_login_rejects_password_arrays(string $route, bool $admin): void
    {
        $this->post(route($route), [
            'email' => 'warga@example.com', 'password' => ['password'],
        ])->assertSessionHasErrors('password');

        $this->assertGuest();
    }

    public function test_switching_login_form_does_not_bypass_failed_attempt_limit(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route('login.submit'), [
                'email' => $admin->email, 'password' => 'wrong',
            ]);
        }

        $this->post(route('admin.login.submit'), [
            'email' => $admin->email, 'password' => 'password',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_failed_attempts_do_not_block_another_account(): void
    {
        $blocked = User::factory()->create();
        $other = User::factory()->create();
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route('login.submit'), [
                'email' => $blocked->email, 'password' => 'wrong',
            ]);
        }

        $this->post(route('login.submit'), [
            'email' => $other->email, 'password' => 'password',
        ])->assertRedirect(route('pengajuan.index'));

        $this->assertAuthenticatedAs($other);
    }

    #[DataProvider('loginRoutes')]
    public function test_successful_login_resets_failed_attempts(string $route, bool $admin): void
    {
        $user = User::factory()->create(['is_admin' => $admin]);
        for ($attempt = 0; $attempt < 4; $attempt++) {
            $this->post(route($route), ['email' => $user->email, 'password' => 'wrong']);
        }
        $this->post(route($route), ['email' => $user->email, 'password' => 'password']);
        $this->assertAuthenticatedAs($user);
        $this->post(route('logout'));

        $this->post(route($route), ['email' => $user->email, 'password' => 'wrong']);
        $this->post(route($route), ['email' => $user->email, 'password' => 'password']);
        $this->assertAuthenticatedAs($user);
    }

    public static function adminPages(): array
    {
        return [
            ['/admin/dashboard'], ['/dashboard'], ['/dashboardadmin'],
            ['/admin/users'], ['/admin/users/detail'],
            ['/adminUserTable'], ['/adminUserDetail'],
            ['/admin/adminUserTable'], ['/admin/adminUserDetail'],
        ];
    }

    #[DataProvider('adminPages')]
    public function test_admin_pages_reject_guests_and_regular_users(string $path): void
    {
        $this->get($path)->assertRedirect(route('login'));
        $this->actingAs(User::factory()->create())->get($path)->assertForbidden();
    }

    #[DataProvider('adminPages')]
    public function test_existing_admin_pages_still_open_for_admin(string $path): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]))
            ->get($path)->assertOk();
    }
}
