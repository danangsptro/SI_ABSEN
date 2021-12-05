@extends('backend.masterbackend')
@section('title', 'ABSEN | Edit Mapel')


@section('backend')
    <div class="container mt-3">
        <br>
        <h2 id="ftd">Edit Mata Pelajaran</h2>
        <hr>
        <br>
        <form action="{{route('mata-pelajaran-update', $mataPelajaran->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <strong>Table</strong> Form
                </div>
                <div class="card-body card-block">
                    <input type="hidden" class="form-control" name="id" value="{{ $mataPelajaran->id }}">

                        <div class="form-group"><label class="form-control-label"><strong>Mata Pelajaran :</strong></label>
                            <input type="text" name="nama_mata_pelajaran" placeholder="Masukan mata pelajaran.." class="form-control" value="{{$mataPelajaran->nama_mata_pelajaran}}">
                            @error('nama_mata_pelajaran')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Anda sudah benar ?')">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <a href="{{ route('mata-pelajaran') }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Back</a>
                </div>
            </div>

        </form>
    </div>
@endsection
