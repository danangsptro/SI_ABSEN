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
                @if (Auth::user()->user_role == 'staff')
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataAbsen as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->guru->name }}</td>
                                    <td>{{ $d->mataPelajaran->nama_mata_pelajaran }}</td>
                                    <td>{{ $d->siswa->kelas }}</td>
                                    <td>
                                        <form action="{{ route('absen-siswa-hapus', $d->id) }}" class="d-inline"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')"
                                                style="border-radius: 5rem"><i class="menu-icon fa fa-minus-circle"></i>
                                                HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tingkat Rombel</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absen as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->siswa->kelas }}</td>
                                    {{-- <td>
                                        <a href="{{route('absen-siswa-show', $d->id)}}"
                                            class="btn btn-dark btn sm">Show</a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absenSiswa as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->nama_mata_pelajaran }}</td>
                                    <td>
                                        <a href="{{route('absen-siswa-show', $d->id)}}" class="btn btn-dark btn sm">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                @endif
            </div>
        </div>
    </div>
@endsection
