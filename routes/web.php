<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\PengajuanController;

// ---------- Publik ----------
Route::view('/', 'welcome')->name('home');
Route::view('/layanan', 'User.layanan')->name('layanan');
Route::view('/potensi-desa', 'User.potensidesa')->name('potensi-desa');

// ---------- Auth user (tamu saja) ----------
Route::view('/login', 'auth.login')->name('login');
Route::view('/daftar', 'auth.daftar')->name('daftar');
Route::post('/login',  [UserAuthController::class, 'login'])->name('login.submit');
Route::post('/daftar', [UserAuthController::class, 'register'])->name('daftar.submit');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

// ---------- Login admin (jalur rahasia) ----------
$secretPath = env('ADMIN_SECRET_LOGIN_PATH', 'admin-secret-login');
Route::get($secretPath,  [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post($secretPath, [AdminLoginController::class, 'login'])->name('admin.login.submit');

// ---------- Pengajuan (publik — tidak perlu login) ----------
Route::get('/userpengajuan',               [PengajuanController::class, 'index'])->name('pengajuan.index');
Route::get('/detailpengajuan/{pengajuan}', [PengajuanController::class, 'show'])->name('pengajuan.show');
Route::post('/pengajuan',                  [PengajuanController::class, 'store'])->name('pengajuan.store');

// ---------- Admin (wajib login + is_admin) ----------
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'Admin.dashboardadmin')->name('dashboard');

    // Pengajuan
    Route::get('/pengajuan',              [PengajuanController::class, 'adminIndex'])->name('pengajuan.index');
    Route::get('/pengajuan/{pengajuan}',  [PengajuanController::class, 'adminShow'])->name('pengajuan.show');
    Route::patch('/pengajuan/{pengajuan}',[PengajuanController::class, 'adminUpdate'])->name('pengajuan.update');

    // Halaman statis admin (belum ada controller)
    Route::view('/layanan',              'Admin.manageLayanan')->name('layanan.index');
    Route::view('/layanan/detail',       'Admin.detailLayanan')->name('layanan.detail');
    Route::view('/potensi-desa',         'Admin.potensiDesa')->name('potensi.index');
    Route::view('/potensi-desa/detail',  'Admin.detailPotensiDesa')->name('potensi.detail');
    Route::view('/pengajuan/detail',     'Admin.detailPengajuan')->name('pengajuan.detail');
    Route::view('/users',                'Admin.adminUserTable')->name('users.index');
    Route::view('/users/detail',         'Admin.adminUserDetail')->name('users.detail');
});

// ---------- Alias lama (dipertahankan agar link tim tidak putus) ----------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::view('/dashboard',     'Admin.dashboardadmin')->name('dashboard');
    Route::view('/dashboardadmin','Admin.dashboardadmin');
    
    Route::view('/adminUserDetail','Admin.adminUserDetail')->name('adminUserDetail');
    Route::view('/adminUserTable', 'Admin.adminUserTable')->name('adminUserTable');
});

Route::view('/layanan', 'User.layanan')->name('layanan');

Route::get('/admin/adminUserTable', function () {
    return view('Admin.adminUserTable');
});
Route::get('/admin/adminUserDetail', function () {
    return view('Admin.adminUserDetail');
});