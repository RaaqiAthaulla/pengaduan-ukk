@extends('layouts.admin')
@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tanggapan</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Tanggapan</h6>
    </nav>
@endsection
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <h4 class="text-center mb-4">Edit Data Petugas</h4>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('updateform', [$petugas->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                                    value="{{ $petugas->nik }}" placeholder="Masukkan NIK">
                                @error('nik')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" value="{{ $petugas->nama }}" placeholder="Masukkan Nama">
                                @error('nama')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input class="form-control @error('tlp') is-invalid @enderror" id="no_hp" name="tlp"
                                    value="{{ $petugas->tlp }}" placeholder="Masukkan Nomor HP">
                                @error('tlp')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ $petugas->email }}" placeholder="Masukkan Email">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Masukkan Password">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        <a href="" class="font-weight-bold" target="_blank">
                            4Cores
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}
    </div>
@endsection
