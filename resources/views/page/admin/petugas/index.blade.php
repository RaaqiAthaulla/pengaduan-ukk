@extends('layouts.admin')

@section('petugas', 'active')


@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Petugas</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Petugas</h6>
    </nav>
@endsection
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6 class="float-start">Petugas</h6>
                            <a href="{{ route('petugas.create') }}" class="btn btn-primary float-end">Tambah</a>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                NIK</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Nama</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                NO HP</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                EMAIL</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($user as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-4 py-1">
                                                        <h6>{{ $no++ }}.</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- <p class="text-xs font-weight-bold mb-0">coba</p> --}}
                                                    <p class="text-xs text-secondary mb-0">{{ $item->nik }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->nama }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->tlp }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->email }}</h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle d-flex justify-content-center">
                                                    <form action="{{ route('petugas.delete', $item->id) }}" method="POST"
                                                        id="delete-form">
                                                        <a class="btn btn-warning"
                                                            href="{{ route('editform', $item->id) }}"><i class="fa fa-pen"
                                                                aria-hidden="true"></i></a>


                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-youtube" id="delete-button"
                                                            onclick="showConfirmationModal()">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
        </div>
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
@endsection
