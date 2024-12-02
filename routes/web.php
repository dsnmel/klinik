<?php

use App\Http\Controllers\arsipController;
use App\Http\Controllers\farmasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pasienController;
use App\Models\arsip;
use App\Models\login;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route untuk proses login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/regist', function () {
    return view('regist');
});

// Untuk menampilkan halaman farmasi
Route::get('/farmasi', [farmasiController::class, 'tampil'])->name('farmasi.farmasi');
Route::post('/farmasi/print', [farmasiController::class, 'cetak'])->name('farmasi.print');

// Route untuk menerima data form farmasi (method POST)
Route::post('/farmasi', [farmasiController::class, 'submit'])->name('farmasi.submit');
Route::post('/arsip/{id}', [arsipController::class, 'data'])->name('arsip'); // Arsipkan pasien
Route::post('/dokter/hapus/{id}', [pasienController::class, 'hapus'])->name('dokter.hapus');
Route::post('/farmasi/delete/{id}', [farmasiController::class, 'delete'])->name('farmasi.delete'); // Hapus di dokter.blade

// Route untuk dokter
Route::get('/dokter', [pasienController::class, 'tampil'])->name('dokter.dokter');
Route::post('/arsip/{id}', [arsipController::class, 'arsip'])->name('arsip');

// Route untuk form registrasi
Route::get('/regist', [pasienController::class, 'tambah'])->name('regist');
Route::post('/regist/submit', [pasienController::class, 'submit'])->name('regist.submit');
Route::get('/edit/{id}', [arsipController::class, 'edit'])->name('edit');
Route::get('/print', [PasienController::class, 'print'])->name('print');

Route::get('/arsip', [App\Http\Controllers\arsipController::class, 'search'])->name('arsip');
Route::delete('arsip/delete/{id}', [arsipController::class, 'hapus'])->name('delete');

Route::post('/logout', function () {
    return redirect('/login')->with('success', 'You have been logged out.');
})->name('logout');
