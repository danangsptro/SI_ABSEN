@extends('backend.masterbackend')
@section('title', 'ABSEN | Edit Tingkat Rombel')


@section('backend')
    <div class="container mt-3">
        <br>
        <h2 id="ftd">Edit Tingkat Rombel</h2>
        <hr>
        <br>
        <form action="{{route('rombel-update', $rombel->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <strong>Table</strong> Form
                </div>
                <div class="card-body card-block">
                    <input type="hidden" class="form-control" name="id" value="{{ $rombel->id }}">

                        <div class="form-group"><label class="form-control-label"><strong>Tingkat Rombel :</strong></label>
                            <input type="text" name="tingkat_rombel" placeholder="Masukan tingkat rombel.." class="form-control" value="{{$rombel->tingkat_rombel}}">
                            @error('tingkat_rombel')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Anda sudah benar ?')">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <a href="{{ route('mata-pelajaran') }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Back</a>
                </div>
            </div>

        </form>
    </div>
@endsection
