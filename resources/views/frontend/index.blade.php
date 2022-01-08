<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets//css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jqvmap.min.css') }}">
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-light bg-warning">
        <span class="navbar-brand mb-0 h1 container-fluid"><h4><span class="badge bg-dark" style="color: white; padding:1rem">Home Page Data Absen Siswa</span></h4>
    </span>
    </nav>

    <div class="card mt-4 container">
        <div class="card-header">
            <strong class="card-title">Data Table</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Alfa</th>
                        <th scope="col">Sakit</th>
                        <th scope="col">Izin</th>
                        <th scope="col">Terlambat</th>
                        <th scope="col">Pertemuan</th>
                    </tr>
                </thead>
                @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->jadwalSiswa->siswa->rombel->kelas }}</td>
                    <td>{{ $d->jadwalSiswa->siswa->nama_lengkap }}</td>
                    <td>{{ $d->jadwalSiswa->jadwal->pelajaran->nama_mata_pelajaran }}</td>
                    <td>{{ $d->alfa ? $d->alfa : '-' }}</td>
                    <td>{{ $d->sakit ? $d->sakit : '-' }}</td>
                    <td>{{ $d->izin ? $d->izin : '-' }}</td>
                    <td>{{ $d->terlambat ? $d->terlambat : '-' }}</td>
                    <td>{{ $d->pertemuan ? $d->pertemuan : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
            </table>
        </div>
    </div>
</body>

</html>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
{{-- datatable --}}
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatables-init.js')}}"></script>

