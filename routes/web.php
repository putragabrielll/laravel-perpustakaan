<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// untuk Admin
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenulisBukuController;
use App\Http\Controllers\ListBukuController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::group(['middleware' => ['auth','ceklevel:admin']], function() {
    // Untuk menu-menu di sidebar
    Route::resource('/kategori', KategoriBukuController::class,);
    Route::resource('/penulis', PenulisBukuController::class,);
    Route::resource('/buku', ListBukuController::class,);
});


require __DIR__.'/auth.php';
