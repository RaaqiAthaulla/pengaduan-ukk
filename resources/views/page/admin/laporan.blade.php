@extends('layouts.admin')

@section('laporan', 'active')

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
            <div class="col-12">
                <a href="{{ url('/pdf') }}" class="btn btn-primary me-2">Download Laporan</a>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Data Pengaduan</h6>
                        <div class="d-flex justify-content-center ">
                            <ul class="nav nav-tabs card-header-tabs d-flex">
                                <li class="nav-item">
                                    <a class="nav-link">Belum diproses</a>
                                </li>
                                <li class="nav-item ">
                                    <h6> <a class="nav-link ">Diproses</a></h6>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link">Selesai</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            NIK</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Judul Laporan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($pengaduan as $item)
                                        {{-- @dd($item) --}}
                                        <tr>
                                            <td class="px-4 py-1 ">
                                                <h6>{{ $no++ }}.</h6>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <h6 class="mb-0 text-sm">{{ $item->user->nama }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs text-secondary mb-0">{{ $item->user->nik }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{ $item->judul }}</p>
                                            </td>
                                            @if ($item->status == 'Belum di Proses')
                                                <td class="lign-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-warning">
                                                        {{ $item->status }}
                                                    </span>
                                                </td>
                                            @elseif ($item->status == 'Sedang di Proses')
                                                <td class="lign-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success">
                                                        {{ $item->status }}
                                                    </span>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span class="badge bg-gradient-success">{{ $item->status }}
                                                    </span>
                                                </td>
                                            @endif
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}
                                                </span>
                                            </td>
                                            {{-- {{ dd($item->id, route('pengaduan.show', $item->id)) }} --}}
                                            {{-- <td class="align-middle">
                                                <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST"
                                                    id="delete-form">
                                                    <a class="btn btn-info"
                                                        href="{{ route('pengaduan.show', $item->id) }}"><i
                                                            class="fa fa-eye" aria-hidden="true"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-youtube" id="delete-button"><i
                                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex  float-end">
                                {{ $pengaduan->links() }}
                            </div>
                        </div>
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
        </footer>
    </div>
@endsection


{{-- {{ route('pengaduan.show', $item->id) }} --}}
