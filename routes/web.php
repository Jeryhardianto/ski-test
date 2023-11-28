<?php

use Illuminate\Support\Facades\Route;

// Backsite
use App\Http\Controllers\backsite\Stock;
use App\Http\Controllers\backsite\Barang;

// User Manegement 
use App\Http\Controllers\backsite\Hutang;
use App\Http\Controllers\backsite\Suplier;
use App\Http\Controllers\backsite\Dashboard;
use App\Http\Controllers\backsite\Pembelian;
use App\Http\Controllers\backsite\PostController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::prefix('webapp')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    // Post
    Route::resource('post', PostController::class);

    // Barang   
    Route::resource('barang', Barang::class);

    // Suplier
    Route::resource('suplier', Suplier::class);

    // Beli
    Route::resource('beli', Pembelian::class);
    // Stock
    Route::resource('stock', Stock::class);
    // Hutang
    Route::resource('hutang', Hutang::class);



});

require __DIR__.'/auth.php';
