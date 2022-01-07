@extends('backend.masterbackend')
@section('title', 'ABSEN | Tambah Jadwal')
@section('backend')
<div class="mt-5">
    <div class="container mt-3">
        <h2 id="ftd">Tambah Jadwal</h2>
        <hr>
        <form action="{{ isset($edit) ? route('jadwal.updateJadwal', isset($jadwal) ? $jadwal->id : 0) : route('jadwal.store') }}" method="{{ isset($edit) ? 'POST' : 'POST' }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <strong>Table Form</strong>
                </div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label class="control-label mb-1 font-weight-bold">Guru</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="guru_id" >
                                <option value="">Pilih Guru</option>
                                @foreach ($gurus as $i)
                                    <option value="{{ $i->id }}" {{ isset($jadwal) ? $jadwal->guru_id == $i->id ? 'selected' : '-' : '' }}>{{ $i->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('guru_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1 font-weight-bold">Mata Pelajaran</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="pelajaran_id" >
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($mapels as $i)
                                    <option value="{{ $i->id }}" {{ isset($jadwal) ? $jadwal->pelajaran_id == $i->id ? 'selected' : '-' : '' }}>{{ $i->nama_mata_pelajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('pelajaran_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1 font-weight-bold">Hari</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="hari" >
                                <option value="">Pilih Hari</option>
                                @foreach ($haris as $i)
                                    <option value="{{ $i }}" {{ isset($jadwal) ? $jadwal->hari == $i ? 'selected' : '-' : '' }}>{{ $i }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('hari')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group"><label class="form-control-label"><strong>waktu :</strong></label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="time" name="waktu_mulai" value="{{ isset($waktu_mulai) ? $waktu_mulai : '' }}" placeholder="Waktu Mulai" class="form-control">
                                @error('waktu_mulai')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <span class="ml-4 mr-4 mt-2">-</span>
                            <div class="col-md-4">
                                <input type="time" name="waktu_selesai" value="{{ isset($waktu_selesai) ? $waktu_selesai : '' }}" placeholder="Waktu Selesai" class="form-control">
                                @error('waktu_selesai')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Anda sudah benar ?')">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <a href="{{ route('jadwal.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
