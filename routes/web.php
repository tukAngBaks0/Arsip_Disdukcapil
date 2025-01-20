<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
    // return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard',[
//     "title"=>"Dashboard"
//     ]);
//    })->middleware('auth');

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('penduduk',PendudukController::class)->middleware('auth');
Route::resource('pengguna',AdminController::class)->except('destroy','create','show','update','edit')->middleware('auth');;

Route::resource('dokumen', DokumenController::class)->middleware('auth');;
Route::put('dokumen/{dokumen}', [DokumenController::class, 'update'])->name('dokumen.update')->middleware('auth');;
Route::get('dokumen/{dokumen}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit')->middleware('auth');;
// Rute untuk melihat file
Route::get('dokumen/view/{filename}', [DokumenController::class, 'viewFile'])->name('dokumen.view')->middleware('auth');;

// Rute untuk mengunduh file
Route::get('dokumen/download/{filename}', [DokumenController::class, 'downloadFile'])->name('dokumen.download')->middleware('auth');;

Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');