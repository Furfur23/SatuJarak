<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userpengajuan', function () {
    return view('userpengajuan');
})->name('pengajuan.index');

Route::post('/pengajuan', function () {
    return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dikirim!');
})->name('pengajuan.store');

Route::view('/dashboard', 'userpengajuan')->name('dashboard');
Route::view('/potensi-desa', 'userpengajuan')->name('potensi-desa');
Route::view('/layanan', 'userpengajuan')->name('layanan');
Route::post('/logout', function () { return redirect('/pengajuan'); })->name('logout'); 

Route::get('/detailpengajuan', function () {
    return view('detailpengajuan');
})->name('pengajuan.show');