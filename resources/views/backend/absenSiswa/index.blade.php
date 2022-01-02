@extends('backend.masterbackend')
@section('title', 'ABSEN | Data Absen')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Data Abses Siswa</h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="menu-icon fa fa-mail-reply "></i> Kembali
            Halaman
            Dashboard</a>
        @if (Auth::user()->user_role == 'staff')
            <a href="{{ route('absen-siswa-tambah') }}" class="btn btn-warning"><i class="menu-icon fa  fa-plus-square"></i>
                Tambah Data</a>
        @endif
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
                            <th scope="col">Nama Siswa </th>
                            <th scope="col">Mata Pelajaran </th>
                            <th scope="col">Alfa</th>
                            <th scope="col">Sakit</th>
                            <th scope="col">Izin</th>
                            <th scope="col">Terlambat</th>
                            <th scope="col">Tanggal Absen</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAbsen as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->siswa->nama_lengkap }} | {{$d->siswa->rombel->kelas}}</td>
                                <td>{{ $d->mataPelajaran->nama_mata_pelajaran}}</td>
                                <td>{{ $d->alfa }}</td>
                                <td>{{ $d->sakit }}</td>
                                <td>{{ $d->izin }}</td>
                                <td>{{ $d->terlambat }}</td>
                                <td>{{ $d->tanggal_absen }}</td>
                                <td><a href="{{route('absen-siswa-edit', $d->id)}}" class="btn btn-dark">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
