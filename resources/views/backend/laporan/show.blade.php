@extends('backend.masterbackend')
@section('title', 'ABSEN | Mata Pelajaran')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Data Mata Pelajaran</h1>
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
                            <th scope="col">Kelas </th>
                            <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mataPelajaran as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama_mata_pelajaran }}</td>
                                <td>
                                    <a href="{{route('laporan-detail', $d->id)}}" class="btn btn-info btn-sm" style="border-radius: 5rem"><i
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
