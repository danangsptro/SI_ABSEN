@extends('backend.masterbackend')
@section('title', 'ABSEN | Data Absen')
@section('backend')
<div class="mt-5">
    <h1 id="ftd" class="mb-5">Data Jadwal</h1>
    <div class="container-fluid">
        <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="menu-icon fa fa-mail-reply "></i> Kembali Halaman Dashboard</a>
        <a href="{{ route('jadwal.create') }}" class="btn btn-warning"><i class="menu-icon fa fa-plus-square mr-2"></i>Tambah Data</a>
        @if (session('message'))
            <div class="mt-3">
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
                            <th scope="col">Mapel</th>
                            <th scope="col">Guru</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Jumlah Siswa</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataJadwals as $d)
                            @php
                                $totalSiswa = App\Http\Model\JadwalSiswa::where('jadwal_id', $d->id)->count();
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->pelajaran->nama_mata_pelajaran }}</td>
                                <td>{{ $d->guru->name }}</td>
                                <td><span class="text-uppercase">{{ $d->hari }}</span> | {{ $d->waktu }}</td>
                                <td>
                                    {{ $totalSiswa }} <a href="{{ route('jadwal.show', $d->id) }}"><i class="fa fa-user-plus text-success ml-2"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('jadwal.edit', $d->id) }}"><i class="fa fa-pencil mr-2 text-primary"></i></a>
                                    <form action="{{route('jadwal.destroy', $d->id)}}" class="d-inline"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?') "style="border-radius: 5rem"><i class="menu-icon fa fa-minus-circle"></i> HAPUS</button>
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
@endsection
