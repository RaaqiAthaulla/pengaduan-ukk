<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Create
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
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
                                    <form method="POST" action="{{ route('pengaduan.store') }}"
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
                                            <label for="exampleFormControlTextarea1">Deskripsi Laporaninde</label>
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
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                                    currency"</h4>
                                <p class="text-white position-relative">The more effortless the writing looks, the more
                                    effort the writer actually put into the process.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

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
</body>

</html>
