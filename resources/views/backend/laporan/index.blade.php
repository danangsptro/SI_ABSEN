@extends('backend.masterbackend')
@section('title', 'ABSEN | Data Laporan')
@section('backend')
<div class="container-fluid mt-2">
    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <label for="opd" class="col-form-label s-12 col-md-3 text-right font-weight-bolder">Kelas : </label>
                <div class="col-md-6">
                    <select name="jadwal_id" id="jadwal_id" class="select2 form-control r-0 light s-12">
                        <option value="0">Pilih</option>
                        @foreach ($jadwals as $i)
                            <option value="{{ $i->id }}">{{ $i->pelajaran->nama_mata_pelajaran }} [{{ $i->hari .'-'. $i->waktu }}] [ {{ $i->guru->name }} ]</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="form-group row">
                <label for="opd" class="col-form-label s-12 col-md-3 text-right font-weight-bolder">Kelas : </label>
                <div class="col-md-6">
                    <input type="text" id="pertemuan" class="form-control">
                </div>
            </div> 
            <div class="form-group row">
                <label for="opd" class="col-form-label s-12 col-md-3 text-right font-weight-bolder"></label>
                <div class="col-md-9">
                    <button class="btn btn-sm btn-success" onclick="pressOnChange()"><i class="fa fa-search mr-2"></i>Filter</button>
                    <a href="#" target="_blank" class="btn btn-sm btn-primary" id="exportSiswa"><i class="fa fa-file mr-2"></i>Export PDF</a>
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
            url: "{{ route('laporan.api') }}",
            method: 'POST',
            data: function (data) {
                data.jadwal_id = $('#jadwal_id').val();
                data.pertemuan = $('#pertemuan').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'siswa', name: 'siswa'},
            {data: 'kelas', name: 'kelas'},
            {data: 'status', name: 'status'},
        ]
    });

    function pressOnChange(){
        table.api().ajax.reload();

        var pertemuan = $('#pertemuan ').val();
        var jadwal_id = $('#jadwal_id').val();

        params =  jadwal_id + "&pertemuan=" + pertemuan;
        url = "{{ route('laporan.exportPDF') }}?jadwal_id=" + params
        $('#exportSiswa').attr('href', url)
    }
</script>
@endsection

