@extends('backend.masterbackend')
@section('title', 'ABSEN | Data Absen')
@section('backend')
<div class="container-fluid mt-2">
    <div class="card">
        <h6 class="card-header">Data</h6>
        <input type="hidden" id="jadwal_id" value="{{ $data->id }}">
        <div class="card-body">
            <div class="col-md-12">
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Pelajaran:</strong></label>
                    <label class="col-md-10 s-12">{{ $data->jadwalSiswa->jadwal->pelajaran->nama_mata_pelajaran }} [{{ $data->jadwalSiswa->jadwal->hari }} {{ $data->jadwalSiswa->jadwal->waktu }}]</label>
                </div>
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Pertemuan:</strong></label>
                    <label class="col-md-10 s-12">{{ $data->pertemuan }} </label>
                </div>
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Guru:</strong></label>
                    <label class="col-md-10 s-12">{{ $data->jadwalSiswa->jadwal->guru->name }}</label>
                </div>
                <hr>
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Nama Siswa:</strong></label>
                    <label class="col-md-10 s-12">{{ $data->jadwalSiswa->siswa->nama_lengkap }}</label>
                </div>
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Kelas:</strong></label>
                    <label class="col-md-10 s-12">{{ $data->jadwalSiswa->siswa->rombel->kelas }}</label>
                </div>
                <div class="row">
                    <label class="col-md-2 text-right"><strong>Status kehadiran:</strong></label>
                    <label class="col-md-10 s-12">
                        @if ($data->alfa != null)
						<span>Alfa</span>
                        @endif
                        @if ($data->sakit != null)
                            <span>Sakit</span>
                        @endif
                        @if ($data->izin != null)
                            <span>Izin</span>
                        @endif
                        @if ($data->terlambat != null)
                            <span>Terlambat</span>
                        @endif
                        @if ($data->alfa == null && $data->sakit == null && $data->izin == null && $data->terlambat == null)
                            <span>Ada</span>
                        @endif
                    </label>
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
    <div class="card mt-3">
        <h6 class="card-header">Edit Kehadiran</h6>
        <div class="card-body">
            <form action="{{ route("dataAbsen.update", $data->id) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="opd" class="col-form-label s-12 col-md-2 text-right font-weight-bolder">Absen : </label>
                    <div class="col-md-3">
                        <select name="type" id="type" class="select2 form-control r-0 light s-12">
                            <option value="">Pilih</option>
                            <option value="1">Ada</option>
                            <option value="2">Alfa</option>
                            <option value="3">Sakit</option>
                            <option value="4">Izin</option>
                            <option value="5">Terlambat</option>
                        </select>
                        @error('type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="opd" class="col-form-label s-12 col-md-2 text-right font-weight-bolder"></label>
                    <div class="col-md-9">
                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save mr-2"></i>Simpan Perubahan</button>
                        <a href="{{ route('dataAbsen.index') }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-2"></i>Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    // 
</script>
@endsection

