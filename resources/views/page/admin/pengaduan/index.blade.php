@extends('layouts.admin')

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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                {{-- <a href="{{ route('pengaduan.create') }}" class="btn btn-primary me-2">Tambah</a> --}}
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="float-start">Pengaduan</h6>
                        <div class="input-group float-end justify-content-end">
                            <form action="{{ route('search') }}" method="GET" class="d-flex">
                                <input type="search" name="search" class="form-control" placeholder="Type here..."
                                    value="{{ request()->input('search') }}">
                            </form>
                        </div>
                    </div>

                    {{-- @if (count($pengaduan) > 0) --}}
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            foto</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Data Pengadu</th>
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
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($pengaduan as $item)
                                        {{-- @if (isset($_GET['search']) && strpos(strtolower($item->user->nama), strtolower($_GET['search'])) === false)
                                                @continue
                                            @endif --}}
                                        <tr>
                                            <td class="px-4 py-1 ">
                                                <h6>{{ $no++ }}.</h6>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <img src="{{ asset('foto-pengaduan/' . $item->foto) }}"
                                                        class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->user->nama }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $item->user->nik }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{ $item->judul }}</p>
                                            </td>
                                            @if ($item->status == 'Belum Di Proses')
                                                <td class="lign-middle text-center text-sm">
                                                    <form action="pengaduan/status/{{ $item->id }}" method="POST"
                                                        class="d-inline">
                                                        <button type="submit"
                                                            class="btn badge badge-sm bg-gradient-danger ">{{ $item->status }}</button>
                                                        @csrf
                                                    </form>
                                                </td>
                                            @elseif ($item->status == 'Sedang Di Proses')
                                                <td class="lign-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-warning">{{ $item->status }}</span>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span class="btn badge bg-gradient-success">{{ $item->status }}</span>
                                                </td>
                                            @endif
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST"
                                                    id="delete-form">
                                                    <a class="btn btn-info"
                                                        href="{{ route('pengaduan.show', $item->id) }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-youtube" id="delete-button">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="d-flex  float-end">
                                {{ $pengaduan->links() }}
                            </div> --}}
                        </div>
                    </div>
                    {{-- @endif --}}
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


{{-- {{ route('pengaduan.show', $item->id) }} --}}
