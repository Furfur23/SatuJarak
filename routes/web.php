<?php

use Illuminate\Support\Facades\Route;



Route::view('/login', 'auth.login')->name('login');

Route::view('/daftar', 'auth.daftar')->name('daftar');

Route::view('/', 'welcome')->name('home');

Route::view('/userpengajuan', 'User.userpengajuan')->name('pengajuan.index');

Route::post('/pengajuan', function () {
    return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dikirim!');
})->name('pengajuan.store');

Route::view('/dashboard', 'Admin.dashboardadmin')->name('dashboard');
Route::view('/potensi-desa', 'Admin.potensiDesa')->name('potensi-desa');
Route::view('/layanan', 'Admin.manageLayanan')->name('layanan');

Route::view('/admin/dashboard', 'Admin.dashboardadmin')->name('admin.dashboard');
Route::view('/admin/pengajuan', 'Admin.managePengajuan')->name('admin.pengajuan.index');
Route::view('/admin/layanan', 'Admin.manageLayanan')->name('admin.layanan.index');

Route::view('/admin/potensi-desa', 'Admin.potensiDesa')->name('adminPotensi');
Route::view('/admin/potensi-desa/detail', 'Admin.detailPotensiDesa')->name('adminDetailPotensi');
Route::view('/admin/layanan/detail', 'Admin.detailLayanan')->name('adminDetailLayanan');
Route::view('/admin/lpengajuan/detail', 'Admin.detailPengajuan')->name('adminDetailPengajuan');



Route::post('/logout', function () { return redirect('/pengajuan'); })->name('logout');

Route::view('/detailpengajuan', 'User.detailpengajuan')->name('pengajuan.show');

Route::view('/dashboardadmin', 'Admin.dashboardadmin');

Route::view('/layanan', 'User.layanan')->name('layanan');