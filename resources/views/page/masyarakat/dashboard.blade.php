@extends('layouts.masyarakat')
@section('dashboard', 'active')

@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
    </nav>
@endsection
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Halaman Cores</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <style>
        .card-body {
            background-image: url('../assets/img/dashboard.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>

    <body>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-15">
                    <div class="card">
                        <div class="card-body pt-9 p-9 rounded">
                            {{-- <img src="../assets/img/4cores.png" alt=""> --}}
                            <h1 class="mt-4 text-white">Selamat datang di <b>CORES</b></h1>
                            <p class="lead mb-4  pt-3 text-white">Membangun masyarakat yang lebih baik dimulai dari
                                kepedulian kita
                                terhadap
                                masalah yang ada di sekitar kita</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>
@endsection
