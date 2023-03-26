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
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-15">
                <h4 class="text-center mb-4">Edit Laporan</h4>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('updatemasyarakat', $pengaduan->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="foto" class="block mt-2 text-sm">
                                    <label>Foto</label><br>
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        onchange="previewImage()">
                                </label>
                            </div>
                            <img src="{{ asset('foto-pengaduan/' . $pengaduan->foto) }}" id="preview" alt="Preview"
                                style="max-width: 450px; margin-top:20px;">
                            <div class="mb-3">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="{{ $pengaduan->judul }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="isi_laporan">Deskripsi Laporan</label>
                                <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="3" required>{{ $pengaduan->isi_laporan }}</textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            var fileinput = document.getElementById('foto');
            var preview = document.getElementById('preview');
            var label = document.querySelector('.custom-file-label');

            if (fileinput.files && fileinput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.setAttribute('src', e.target.result);
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(fileinput.files[0]);
                label.innerHTML = fileinput.files[0].name;
            }
        }
    </script>
@endsection
