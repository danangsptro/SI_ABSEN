@extends('backend.masterbackend')
@section('title', 'ABSEN | Data Absen')
@section('backend')
<div class="container-fluid mt-2">
    <div class="card">
        <h6 class="card-header">Jadwal</h6>
        <div class="card-body">
            <div class="col-md-12">
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Pelajaran:</strong></label>
                    <label class="col-md-10 s-12">{{ $jadwal->pelajaran->nama_mata_pelajaran }}</label>
                </div>
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Guru:</strong></label>
                    <label class="col-md-10 s-12">{{ $jadwal->guru->name }}</label>
                </div>
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Hai:</strong></label>
                    <label class="col-md-10 s-12">{{ $jadwal->hari }}</label>
                </div>
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Waktu:</strong></label>
                    <label class="col-md-10 s-12">{{ $jadwal->waktu }}</label>
                </div>
            </div>
        </div>
    </div>
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
    <div class="card">
        <h6 class="card-header">Export Siswa</h6>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <input type="hidden" id="jadwal_id" value="{{ $jadwal->id }}">
                    <div class="form-group row">
                        <label for="opd" class="col-form-label s-12 col-md-3 text-right font-weight-bolder">Kelas : </label>
                        <div class="col-md-9">
                            <select name="kelas_id" id="kelas_id" class="select2 form-control r-0 light s-12">
                                <option value="0">Pilih</option>
                                @foreach ($kelas as $i)
                                    <option value="{{ $i->id }}">{{ $i->kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="opd" class="col-form-label s-12 col-md-3 text-right font-weight-bolder"></label>
                        <div class="col-md-9">
                            <button class="btn btn-sm btn-success" onclick="pressOnChange()"><i class="fa fa-search mr-2"></i>Filter</button>
                            <a href="#" class="btn btn-sm btn-primary" id="exportSiswa"><i class="fa fa-users mr-2"></i>Export Siswa</a>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <table id="dataTable" class="table table-striped table-bordered ftd">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Siswa</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarSiswas as $i)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $i->siswa->nama_lengkap }}</td>
                            <td>{{ $i->siswa->rombel->kelas }}</td>
                            <td><a href="{{ route('jadwal.deleteSiswa', $i->id) }}"><i class="fa fa-times text-danger"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    var table = $('#dataTable').dataTable({
        processing: true,
        serverSide: true,
        order: [ 0, 'asc' ],
        ajax: {
            url: "{{ route('jadwal.api') }}",
            method: 'POST',
            data: function (data) {
                data.kelas_id = $('#kelas_id').val();
                data.jadwal_id = $('#jadwal_id').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'nama_lengkap', name: 'nama_lengkap'},
            {data: 'kelas', name: 'kelas'},
            {data: 'status', name: 'status'},
        ]
    });

    function pressOnChange(){
        table.api().ajax.reload();

        var kelas_id  = $('#kelas_id').val();
        var jadwal_id = $('#jadwal_id').val();

        params =  jadwal_id + "&kelas_id=" + kelas_id;
        url = "{{ route('jadwal.exportSiswa') }}?jadwal_id=" + params
        $('#exportSiswa').attr('href', url)
    }
</script>
@endsection
