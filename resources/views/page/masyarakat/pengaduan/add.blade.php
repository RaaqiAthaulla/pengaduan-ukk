@extends('layouts.masyarakat')

@section('pengaduan', 'active')

@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Pengaduan</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Pengaduan</h6>
    </nav>
@endsection
@section('content')
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Laporan</h4>
                                    <p class="mb-0">Silahkan Masukkan Laporan</p>
                                </div>
                                @if (Session::get('succes'))
                                    <div class="alert alert-succes">
                                        {{ Session::get('succes') }}
                                    </div>
                                @endif
                                @if (Session::get('fail'))
                                    <div class="alert alert-succes">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
                                <div class="card-body">
                                    <form method="POST" action="{{ route('postpengaduan') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_user" value="{{ $id_user }}">
                                        <label for="image" class="block mt-2 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">Foto</span>
                                            <input
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                type="file" name="foto" id="foto" onchange="previewImage()"
                                                required />
                                        </label>
                                        <img src="#" id="preview" alt="Preview"
                                            style="display:none; max-width: 450px; margin-top:20px;">
                                        <div class="mb-3">
                                            <label>Judul</label>
                                            <input class="form-control" id="exampleFormControlTextarea1" name="judul"
                                                style="width: 500px;"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1">Deskripsi Laporan</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="isi_laporan" rows="3"
                                                style="height: 200px; width: 500px;"></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Laporkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
