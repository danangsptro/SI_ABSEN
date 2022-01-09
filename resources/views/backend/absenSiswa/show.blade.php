@extends('backend.masterbackend')
@section('title', 'ABSEN | Data Absen')
@section('backend')
<div class="container-fluid mt-2">
    <div class="card">
        <h6 class="card-header">Jadwal</h6>
        <input type="hidden" id="jadwal_id" value="{{ $jadwal->id }}">
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
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Pertemuan:</strong></label>
                    <label class="col-md-10 s-12">{{ $pertemuan }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <h6 class="card-header">Export Siswa</h6>
        <div class="card-body">
            <div class="col-12">
                <table id="dataTable" class="table table-striped table-bordered ftd">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
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
        pageLength: 100,
        ajax: {
            url: "{{ route('absen-siswa.api') }}",
            method: 'POST',
            data: function (data) {
                data.jadwal_id = $('#jadwal_id').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'siswa_id', name: 'siswa_id'},
            {data: 'kelas', name: 'kelas'},
            {data: 'action', name: 'action'},
        ]
    });

    function absen(id, type){
        url = "{{ route('absen-siswa.absen', ':id') }}".replace(':id', id)+"?type="+type
        $.get(url, function(data){
            table.api().ajax.reload();
        }, 'JSON');
    }
</script>
@endsection
