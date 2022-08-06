<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,AdminController,TeknisiController,PelangganController};

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('admin')->group(function(){
//     Route::resource('admin', AdminController::class);
// });
Route::get('/admin/index',[AdminController::class,'index'])->name('admin.index');
Route::post('/admin/store',[AdminController::class,'store'])->name('admin.store');
Route::get('/admin/delete/{admin}',[AdminController::class, 'destroy'])->name('admin.destroy');
Route::post('/admin/update/{admin}',[AdminController::class, 'update'])->name('admin.update');
Route::get('/teknisi/index',[TeknisiController::class, 'index'])->name('teknisi.index');
Route::get('/pelanggan/index',[PelangganController::class, 'index'])->name('pelanggan.index');



Route::prefix('layanan')->group(function(){
    Route::view('facebook','/frontend/facebook')->name('layanan.facebook');
    Route::view('instagram','/frontend/instagram')->name('layanan.instagram');
    Route::view('website','/frontend/website')->name('layanan.website');
    Route::view('google','/frontend/google')->name('layanan.google');
});
