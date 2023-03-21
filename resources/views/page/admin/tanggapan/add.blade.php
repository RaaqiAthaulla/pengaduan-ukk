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
            <div class="col-lg-15">
                <h4 class="text-center text-white mb-4">Berikan Tanggapan Anda</h4>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('tanggapan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_pengaduan" value="{{ $item->id }}">
                            <div class="form-group row">
                                <label for="exampleFormControlTextarea1" class="col-sm-4 col-form-label">Tanggapan</label>
                                <div class="col-sm-8 w-100 h-100">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="isi_tanggapan" rows="5">{{ old('isi_tanggapan') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div>
                                    <button type="submit" class="btn btn-primary btn-block">Tanggapi</button>
                                </div>
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
