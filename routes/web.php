<?php

use App\Http\Controllers\ApiTesController;
use App\Livewire\KategoriController;
use App\Livewire\Produk;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [ApiTesController::class, 'index']);
Route::get('/', Produk::class)->name('produk');
Route::get('/kategori', KategoriController::class)->name('kategori');
