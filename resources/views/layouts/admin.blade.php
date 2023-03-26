<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/4cores.png">
    <title>
        4 CORES
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('/public/DataTables-1.13.4/css/jquery.dataTables.min.css') }}">

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

    <style>
        .bg-lightblue-gradient {
            background-image: linear-gradient(to bottom right, #BFEFFF, #86CFFF);
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
    {{-- <div class="bg-gradient-primary position-fixed h-100 w-100 "></div> --}}
    <div class="min-height-100 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/dashboard">
                <img src="../assets/img/4cores.png" class="navbar-brand-img h-100" alt="main_logo" width="30%"
                    height="30%">
                <span class="ms-2 font-weight-bold">CORES</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    {{-- <span
                        class="{{ request()->routeIs('') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }} "
                        aria-hidden="true"></span> --}}
                    <a class="nav-link @yield('dashboard')" href="/dashboard">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <span
                    class="{{ request()->routeIs('pengaduan') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }} "
                    aria-hidden="true"></span> --}}
                    <a class="nav-link @yield('pengaduan')" href="/pengaduan">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-file-signature text-warning text-sm opacity-10"></i>

                        </div>
                        <span class="nav-link-text ms-1">Pengaduan</span>
                    </a>
                </li>
                {{-- @if (auth()->user()->role == 'Admin') --}}
                <li class="nav-item">
                    <a class="nav-link @yield('masyarakat')" href="/masyarakat">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Masyarakat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('petugas')" href="/petugas">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users-cog text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Petugas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('laporan')" href="/laporan">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-print text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li>
                {{-- @endif --}}
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                @yield('title')
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                            class="nav-link text-white font-weight-bold px-0">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="d-sm-inline d-none">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js">
        < /> <
        script src = "../assets/js/core/bootstrap.min.js" >
    </script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    {{-- <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script> --}}

    {{-- <script src="{{ asset('/public/') }}"></script>
    <script src="{{ asset('/public/DataTables-1.13.4/js/jquery.dataTables.min.js') }}"></script> --}}

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

    <script src="../assets/fontawesome-free-5.15.4-web/js/all.min.js"></script>
</body>

</html>
