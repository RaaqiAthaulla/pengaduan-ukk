@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Pengaduan
                            <a href="{{ route('pengaduan.create') }}" class="btn btn-primary float-end">Tambah</a>
                        </h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            foto</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Data Pengadu</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Isi Laporan</th>
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
                                                        <p class="text-xs text-secondary mb-0">{{ $item->user->nik }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{ $item->judul }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success">{{ $item->status }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                            </td>
                                            {{-- {{ dd($item->id, route('pengaduan.show', $item->id)) }} --}}
                                            <td class="align-middle">
                                                <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST"
                                                    id="delete-form">
                                                    <a class="btn btn-info"
                                                        href="{{ route('pengaduan.show', $item->id) }}"><i class="fa fa-eye"
                                                            aria-hidden="true"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-youtube" id="delete-button"><i
                                                            class="fa fa-trash" aria-hidden="true"></i></button>
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
