@extends('backend.masterbackend')
@section('title', 'ABSEN | Data Absen')
@section('backend')
<div class="mt-5">
    <h1 id="ftd" class="mb-5">Data Jadwal Siswa</h1>
    <div class="container-fluid">
        <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="menu-icon fa fa-mail-reply "></i> Kembali Halaman Dashboard</a>
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
        <div class="card mt-3">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Siswa </th>
                            <th scope="col">Guru</th>
                            <th scope="col">Mapel</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataJadwals as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->siswa->nama_lengkap}}</td>
                                <td>{{ $d->guru->name }}</td>
                                <td>{{ $d->pelajaran->nama_mata_pelajaran }}</td>
                                <td><a href="{{route('absen-siswa-edit', $d->id)}}" class="btn btn-dark">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
