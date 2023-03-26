@extends('layouts.admin')
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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Detail Laporan</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">{{ $pengaduan->user->nama }}</h6>
                                <table style="border: 1px;">
                                    <tr>
                                        <th>
                                            <span class="mb-2 text-xs">NIK</span>
                                        </th>
                                        <th>
                                            <span class="text-dark font-weight-bold ms-sm-2">
                                                : {{ $pengaduan->user->nik }}
                                            </span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <span class="mb-2 text-xs">Judul Laporan</span>
                                        </th>
                                        <th>
                                            <span class="text-dark ms-sm-2 font-weight-bold">
                                                : {{ $pengaduan->judul }}
                                            </span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <span class="text-xs">Status</span>
                                        </th>
                                        <th>
                                            <span class="text-dark ms-sm-2 font-weight-bold">
                                                : {{ $pengaduan->status }}
                                            </span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <span class="text-xs">Tanggal</span>
                                        </th>
                                        <th>
                                            <span class="text-dark ms-sm-2 font-weight-bold">
                                                : {{ $pengaduan->created_at }}
                                            </span>
                                        </th>
                                    </tr>

                                </table>
                            </div>
                            {{-- <div class="ms-auto text-end">
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                        class="far fa-trash-alt me-2"></i>Delete</a>
                                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                        class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                            </div> --}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Detail Laporan</h6>
                    <div class="row">
                        <div class="col-lg-6 h-100">
                            <div class="card-body t-4 p-3">
                                <img width="100%" height="100%" src="{{ asset('foto-pengaduan/' . $pengaduan->foto) }}"
                                    alt="user1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="flex-column">
                                <div class=" row card-header pb-0 px-3">
                                    <h6 class="mb-3 text-sm">Deskripsi Laporan</h6>
                                    <span class="text-dark ms-sm-2 font-weight-bold">
                                        {{ $pengaduan->isi_laporan }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('tanggapan.show', $pengaduan->id) }}"
                        class="btn btn-primary d-flex align-items-center justify-content-center mt-5">
                        Tanggapi
                    </a>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <a href="" class="font-weight-bold">
                            Cores , Pengaduan Masyarakat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
@endsection
