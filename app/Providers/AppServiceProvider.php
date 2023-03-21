<?php

namespace App\Providers;

use App\Models\Pengaduan;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();


        view()->composer('*', function ($view) {
            $view->with([
                'pengaduanAll' => Pengaduan::all()->count(),
                'pengaduanBelum' => Pengaduan::where('status', 'Belum Di Proses')->count(),
                'pengaduanSelesai' => Pengaduan::where('status', 'Selesai')->count(),
                'jumlahUser' => \App\Models\User::where('role', 'User')->count(),
                'jumlahPetugas' => \App\Models\User::where('role', 'Petugas')->count(),
                'jumlahAdmin' => \App\Models\User::where('role', 'Admin')->count(),
            ]);
        });
    }
}
