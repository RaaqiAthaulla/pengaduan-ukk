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
                <h4 class="text-center mb-4">Masukan Laporan</h4>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('postpengaduan') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ $id_user }}">
                            <div class="mb-3">
                                <label for="image" class="block mt-2 text-sm">
                                    <label>Foto</label><br>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        type="file" name="foto" id="foto" onchange="previewImage()" required />
                                </label>
                            </div>
                            <img src="#" id="preview" alt="Preview"
                                style="display:none; max-width: 450px; margin-top:20px;">
                            <div class="mb-3">
                                <label>Judul</label>
                                <input class="form-control w-100" id="exampleFormControlTextarea1"
                                    name="judul"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1">Deskripsi Laporan</label>
                                <textarea class="form-control w-100 h-100" id="exampleFormControlTextarea1" name="isi_laporan" rows="3"></textarea>
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
