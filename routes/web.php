<?php

use App\Models\Petugas;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
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



// Route::get('/generate-pdf', function () {
//     $pengaduan = \App\Models\Pengaduan::all();
//     $pdf = PDF::loadView('generate-pdf', compact('pengaduan'));
//     return $pdf->download('data-pengaduan.pdf');
// });
Route::get('/pengaduan/downloadPDF', [PengaduanController::class, 'downloadPDF'])->name('pengaduan.downloadPDF');
// Route::middleware(['Admin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('layouts.admin');
//     });
// });

// Route::middleware(['auth', 'Admin'])->group(function () {
//     Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//     Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//     Route::resource('/pengaduan', PengaduanController::class);
//     Route::resource('/masyarakat', MasyarakatController::class);
//     Route::resource('/petugas', PetugasController::class);
//     Route::resource('/tanggapan', TanggapanController::class);
//     Route::resource('/laporan', LaporanController::class);
// });

// Route::middleware(['auth', 'User'])->group(function () {
//     Route::get('/user', function () {
//         return view('layouts.masyarakat');
//     });
// });
Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin')->middleware('Admin');
    Route::get('/data', [App\Http\Controllers\PengaduanController::class, 'dashboard'])->name('data');
    Route::post('/pengaduan/status/{pengaduan}', [PengaduanController::class, 'ubahStatus']);
    Route::resource('/pengaduan', PengaduanController::class);
    Route::resource('/masyarakat', MasyarakatController::class);
    Route::resource('/petugas', PetugasController::class);
    Route::resource('/tanggapan', TanggapanController::class);
    Route::resource('/laporan', LaporanController::class);
    Route::get('/pdf', [App\Http\Controllers\LaporanController::class, 'ExportPDF']);
});

Route::middleware(['auth', 'User'])->group(function () {
    Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
    Route::get('/dashboardmasyarakat', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboardmasyarakat    ');
    Route::get('/pengaduanmasyarakat', [App\Http\Controllers\PengaduanController::class, 'indexmasyarakat'])->name('pengaduanmasyarakat');
    Route::get('/addpengaduan', [App\Http\Controllers\PengaduanController::class, 'create'])->name('pengaduan');
    Route::post('/postpengaduan', [App\Http\Controllers\PengaduanController::class, 'store'])->name('postpengaduan');
    Route::get('/showpengaduan/{pengaduan}', [App\Http\Controllers\PengaduanController::class, 'showmasyarakat'])->name('showmasyarakat');
});
