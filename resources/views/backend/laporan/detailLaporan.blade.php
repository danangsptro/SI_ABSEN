@extends('backend.masterbackend')
@section('title', 'ABSEN | LAPORAN')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Data Detail Laporan</h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('laporan') }}" class="btn btn-primary"><i class="menu-icon fa fa-mail-reply "></i> Kembali
            Halaman
            Laporan</a>
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

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mataPelajaran as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->siswa->nama_lengkap }} | {{$d->siswa->rombel->kelas}}</td>
                                <td>{{ $d->mataPelajaran->nama_mata_pelajaran}}</td>
                                <td>{{ $d->alfa }}</td>
                                <td>{{ $d->sakit }}</td>
                                <td>{{ $d->izin }}</td>
                                <td>{{ $d->terlambat }}</td>
                                <td>{{ $d->tanggal_absen }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
