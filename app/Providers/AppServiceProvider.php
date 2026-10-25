<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use App\Listeners\LimitAdminSessions;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * Mendaftarkan LimitAdminSessions agar setiap kali admin berhasil
     * login, jumlah sesi aktifnya dibatasi maksimal 2 sesi. Sesi lama
     * yang melebihi batas akan otomatis dihapus.
     */
    public function boot(): void
    {
        Event::listen(Login::class, LimitAdminSessions::class);
    }
}
