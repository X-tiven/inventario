<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;


Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');