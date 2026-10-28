<?php

use App\Http\Controllers\Api\MobilController;
use Illuminate\Support\Facades\Route;

Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.store');
Route::get('/mobil/{id}', [MobilController::class, 'show'])->name('mobil.show');
Route::put('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
Route::patch('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.patch');
Route::delete('/mobil/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');
