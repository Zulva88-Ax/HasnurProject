<?php

use App\Http\Controllers\PelatihanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/', [PelatihanController::class, 'index'])->name('pelatihan.index');
Route::post('/pelatihan/store', [PelatihanController::class, 'store'])->name('pelatihan.store');
Route::post('/pelatihan/edit', [PelatihanController::class, 'edit'])->name('pelatihan.edit');
Route::post('/pelatihan/{id}', [PelatihanController::class, 'update'])->name('pelatihan.update');
Route::delete('/pelatihan/{id}', [PelatihanController::class, 'destroy'])->name('pelatihan.destroy');

Route::get('/export-pdf', [PelatihanController::class, 'exportPdf'])->name('pelatihan.exportPdf');




