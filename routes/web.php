<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserAuthController;

// ---------- Publik ----------
Route::view('/', 'welcome')->name('home');
Route::view('/layanan', 'User.layanan')->name('layanan');

// ---------- Auth user (tamu saja) ----------
Route::view('/login', 'auth.login')->name('login');
Route::view('/daftar', 'auth.daftar')->name('daftar');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.submit');
Route::post('/daftar', [UserAuthController::class, 'register'])->name('daftar.submit');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

// ---------- Login admin (jalur rahasia) ----------
$secretPath = env('ADMIN_SECRET_LOGIN_PATH', 'admin-secret-login');
Route::get($secretPath, [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post($secretPath, [AdminLoginController::class, 'login'])->name('admin.login.submit');

// ---------- User (wajib login) ----------
Route::middleware('auth')->group(function () {
    Route::view('/userpengajuan', 'User.userpengajuan')->name('pengajuan.index');
    Route::view('/detailpengajuan', 'User.detailpengajuan')->name('pengajuan.show');
    Route::post('/pengajuan', function () {
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dikirim!');
    })->name('pengajuan.store');
});

// ---------- Admin ----------
Route::view('/admin/dashboard', 'Admin.dashboardadmin')->name('admin.dashboard');
Route::view('/admin/pengajuan', 'Admin.managePengajuan')->name('admin.pengajuan.index');
Route::view('/admin/layanan', 'Admin.manageLayanan')->name('admin.layanan.index');
Route::view('/admin/potensi-desa', 'Admin.potensiDesa')->name('adminPotensi');
Route::view('/admin/potensi-desa/detail', 'Admin.detailPotensiDesa')->name('adminDetailPotensi');
Route::view('/admin/layanan/detail', 'Admin.detailLayanan')->name('adminDetailLayanan');
Route::view('/admin/pengajuan/detail', 'Admin.detailPengajuan')->name('adminDetailPengajuan');
Route::view('/adminUserDetail', 'Admin.adminUserDetail')->name('adminUserDetail');
Route::view('/adminUserTable', 'Admin.adminUserTable')->name('adminUserTable');

// Alias lama (dipertahankan agar link teman tim tidak putus; hapus kalau sudah tidak dipakai)
Route::view('/dashboard', 'Admin.dashboardadmin')->name('dashboard');
Route::view('/dashboardadmin', 'Admin.dashboardadmin');
Route::view('/potensi-desa', 'Admin.potensiDesa')->name('potensi-desa');

// ---------- Lainnya ----------
Route::view('/pdf/lihat', 'pdfViewer')->name('lihatPDF');