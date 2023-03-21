@extends('layouts.masyarakat')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Halaman Cores</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .container-fluid {
                padding: 1rem;
                margin: 0 auto;
                max-width: 1200px;
            }

            .card {
                background-color: #fff;
                border-radius: 1rem;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
                margin-bottom: 2rem;
                overflow: hidden;
                position: relative;
                z-index: 1;
            }

            .card:before {
                background: url('https://source.unsplash.com/random/1200x600') center center/cover no-repeat;
                content: "";
                display: block;
                filter: blur(1rem);
                height: 100%;
                left: -2px;
                opacity: 0.5;
                position: absolute;
                top: -2px;
                transform: scale(1.5);
                width: 100%;
                z-index: -1;
            }

            .card-body {
                padding-top: 8rem;
                padding-bottom: 5rem;
                padding-left: 1rem;
                padding-right: 1rem;
                position: relative;
                text-align: center;
                z-index: 1;
            }

            h1 {
                font-size: 3rem;
                font-weight: bold;
                margin-bottom: 1rem;
                color: #333;
            }

            p {
                font-size: 1.25rem;
                margin-bottom: 2rem;
                color: #333;
            }

            .list-group {
                margin-top: 2rem;
            }

            .list-group-item {
                background-color: #f8f9fa;
                border: 0;
                border-radius: 1rem;
                margin-bottom: 2rem;
                padding: 2rem;
            }

            h5 {
                font-size: 1.5rem;
                font-weight: bold;
                margin-bottom: 1rem;
                color: #333;
            }

            .mb-2 {
                margin-bottom: 0.5rem;
            }

            .mb-3 {
                margin-bottom: 1.5rem;
            }

            @media screen and (max-width: 767px) {
                .card-body {
                    padding-top: 6rem;
                    padding-bottom: 3rem;
                }

                h1 {
                    font-size: 2rem;
                }

                p {
                    font-size: 1rem;
                }

                .list-group-item {
                    padding: 1.5rem;
                }

                h5 {
                    font-size: 1.25rem;
                }
            }
        </style>
    </head>

    <body>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="card">
                    <div class="card-body pt-8 p-10">
                        {{-- <img src="../assets/img/4cores.png" alt=""> --}}
                        <h1>Selamat datang di Cores</h1>
                        <p>Anda dapat melihat contoh pengaduan yang masuk dari masyarakat di bawah ini:</p>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5 class="mb-3">Pengaduan 1</h5>
                                <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada
                                    id
                                    tellus at dignissim.</p>
                                <p class="mb-2">Pelapor: John Doe</p>
                                <p class="mb-2">Tanggal: 19 Maret 2023</p>
                                <p class="mb-2">Status: Belum ditindaklanjuti</p>
                            </li>
                            <li class="list-group-item">
                                <h5 class="mb-3">Pengaduan 2</h5>
                                <p class="mb-2">Nullam convallis ex ut est lobortis maximus. Duis quis tellus malesuada,
                                    scelerisque nibh vel, sagittis magna.</p>
                                <p class="mb-2">Pelapor: Jane Doe</p>
                                <p class="mb-2">Tanggal: 18 Maret 2023</p>
                                <p class="mb-2">Status: Sudah ditindaklanjuti</p>
                            </li>
                            <li class="list-group-item">
                                <h5 class="mb-3">Pengaduan 3</h5>
                                <p class="mb-2">Praesent ac nisi at mi vehicula euismod. Proin sit amet tempor nunc.</p>
                                <p class="mb-2">Pelapor: John Smith</p>
                                <p class="mb-2">Tanggal: 17 Maret 2023</p>
                                <p class="mb-2">Status: Belum ditindaklanjuti</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>
@endsection
