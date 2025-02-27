<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BukuController::class, 'data'])->name('index');
Route::get('/admin', [BukuController::class, 'index'])->name('admin');
Route::get('/index', [BukuController::class, 'data'])->name('index');
Route::post('/admin/store', [BukuController::class, 'store'])->name('buku.store');
Route::put('/admin/update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/admin/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/index', [BukuController::class, 'search'])->name('index');
Route::resource('penerbit', PenerbitController::class);
Route::get('/pengadaan', [BukuController::class, 'pengadaan'])->name('pengadaan');