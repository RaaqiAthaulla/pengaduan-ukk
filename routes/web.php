<?php

use App\Models\Petugas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;

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

Auth::routes();

Route::get('/', function () {
    return redirect(url('/login'));
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('/pengaduan', PengaduanController::class);
Route::get('/masyarakat', [MasyarakatController::class]);
Route::get('/petugas', [PetugasController::class]);
