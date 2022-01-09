@extends('backend.masterbackend')
@section('title', 'ABSEN | Data Absen')
@section('backend')
<div class="mt-5">
    <h1 id="ftd" class="mb-5">Data Absen Siswa</h1>
    <div class="container-fluid">
        <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="menu-icon fa fa-mail-reply "></i> Kembali Halaman Dashboard</a>
        <div class="card mt-3">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Mata Pelajaran </th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPelajarans as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->pelajaran->nama_mata_pelajaran}}</td>
                                <td>{{ $d->hari }}</td>
                                <td>{{ $d->waktu }}</td>
                                <td>
                                    @if ($getDay == $d->hari)
                                    <a href="{{ route('absen-siswa-show', $d->id) }}" class="btn btn-dark">Absen</a>
                                    @else
                                    <span>Belum dibuka.</span>       
                                    @endif
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
