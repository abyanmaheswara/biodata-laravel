<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalDataController;

Route::get('/', function () {
    return view('welcome');
});

// Rute Halaman Utama (Index)
Route::get('/personal-data', [PersonalDataController::class, 'index'])->name('personal-data.index');

// Rute Halaman Edit (Menampilkan Form)
Route::get('/personal-data/edit', [PersonalDataController::class, 'edit'])->name('personal-data.edit');

// Rute Proses Update (Menyimpan Data ke Database) <--- INI YANG HILANG TADI
Route::put('/personal-data/update', [PersonalDataController::class, 'update'])->name('personal-data.update');