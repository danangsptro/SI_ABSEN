@extends('backend.masterbackend')
@section('title', 'ABSEN | Data Laporan')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Data Laporan</h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="menu-icon fa fa-mail-reply "></i> Kembali
            Halaman
            Dashboard</a>
        <a href="{{ route('absen-siswa-tambah') }}" class="btn btn-warning"><i class="menu-icon fa  fa-plus-square"></i>
            Tambah Data</a>
        <br><br>

        @if (session('message'))
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Sukses</span> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kelas </th>
                            <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->kelas }}</td>
                                <td>
                                    <a href="{{route('laporan-show', $d->id)}}" class="btn btn-info btn-sm" style="border-radius: 5rem"><i
                                            class="menu-icon fa fa-arrows-alt"></i> Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
