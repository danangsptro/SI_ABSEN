@extends('backend.masterbackend')
@section('title', 'ABSEN | Tambah Rombel')


@section('backend')
    <div class="container mt-3">
        <br>
        <h2 id="ftd">Tambah Tingkat Rombel</h2>
        <hr>
        <br>
        <form action="{{ route('rombel-tambah-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <strong>Table</strong> Form
                </div>
                <div class="card-body card-block">
                    <div class="form-group"><label class="form-control-label"><strong>Tingkat Rombel :</strong></label>
                        <input type="text" name="tingkat_rombel" placeholder="Masukan tingkat rombel.."
                            class="form-control">
                        @error('tingkat_rombel')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Anda sudah benar ?')">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <a href="{{ route('rombel') }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Back</a>
                </div>
            </div>

        </form>
    </div>
@endsection
