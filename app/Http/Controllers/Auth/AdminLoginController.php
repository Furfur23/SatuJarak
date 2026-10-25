<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AdminLoginController extends Controller
{
    /**
     * Show the admin login form.
     *
     * Jika admin sudah terautentikasi, langsung redirect ke dashboard
     * agar tidak perlu membuka form login lagi.
     */
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin-login');
    }

    /**
     * Handle the admin login request.
     *
     * Rate limiter manual berbasis email+IP sudah ditangani di sini,
     * dan route POST juga dijaga oleh throttle:5,1 sebagai lapisan ganda.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Rate limiter berbasis email + IP (lapisan pertama di controller)
        $key = 'login:'.hash('sha256', Str::lower($credentials['email']).'|'.$request->ip());
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->withErrors([
                'email' => 'Terlalu banyak percobaan login. Coba lagi dalam '.RateLimiter::availableIn($key).' detik.',
            ])->onlyInput('email');
        }

        // Auth::attempt dengan kondisi is_admin = true langsung,
        // sehingga user biasa tidak bisa login melalui jalur ini sama sekali.
        if (Auth::attempt([...$credentials, 'is_admin' => true])) {
            RateLimiter::clear($key);
            $request->session()->regenerate();

            // Perbaikan: arahkan ke route 'admin.dashboard' (/admin/dashboard),
            // bukan 'dashboard' alias lama (/dashboard).
            return redirect()->intended(route('admin.dashboard'));
        }

        RateLimiter::hit($key, 60);

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }
}
