<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
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
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

//route pemasukan
Route::resource('pemasukans',PemasukanController::class);
Route::resource('pengeluarans',PengeluaranController::class);
Route::get('laporan', [LaporanController::class,'index'])->name('laporan.index');
Route::get('cari-laporan', [LaporanController::class,'cari'])->name('laporan.cari');
