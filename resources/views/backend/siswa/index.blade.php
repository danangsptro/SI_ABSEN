@extends('backend.masterbackend')
@section('title', 'ABSEN | Halaman Data Siswa')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Data Siswa</h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="menu-icon fa fa-mail-reply "></i> Kembali
            Halaman
            Dashboard</a>
        <a href="{{ route('siswa-tambah') }}" class="btn btn-warning"><i class="menu-icon fa  fa-plus-square"></i> Tambah
            Data</a>
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
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama_lengkap }}</td>
                                <td>{{ $d->rombel->kelas }}</td>
                                <td>
                                    {{-- <a href="{{route('siswa-edit', $d->id)}}" class="btn btn-warning btn-sm" style="border-radius: 5rem"><i
                                            class="menu-icon fa fa-edit"></i> EDIT</a> --}}
                                    <!-- Modal -->
                                    <a href="" type="button" class="btn btn-info btn-sm" style="border-radius: 5rem"
                                        data-toggle="modal" data-target="#exampleModal{{ $loop->iteration }}"><i
                                            class="menu-icon fa fa-arrows-alt"></i> Show</a>
                                    <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Siswa</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="text-align: left">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Nama
                                                            Lengkap:</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            value="{{ $d->nama_lengkap }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">NISN:</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            value="{{ $d->nisn }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">NIK:</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            value="{{ $d->nik }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Tempat
                                                            Lahir:</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            value="{{ $d->tempat_lahir }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Tanggal
                                                            Lahir:</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            value="{{ $d->tanggal_lahir }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Tingkat
                                                            Rombel:</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            value="{{ $d->rombel->kelas }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Status:</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            value="{{ $d->status }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Jenis
                                                            Kelamin:</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            value="{{ $d->jenis_kelamin }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Alamat:</label>
                                                        <textarea class="form-control" id="recipient-name"
                                                            disabled>{{ $d->alamat }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal --}}
                                    <form action="{{ route('siswa-hapus', $d->id) }}" class="d-inline" method="POST">
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
            </div>
        </div>
    </div>
@endsection
