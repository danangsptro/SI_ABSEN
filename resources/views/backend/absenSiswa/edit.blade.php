@extends('backend.masterbackend')
@section('title', 'ABSEN | Edit Absen Siswa')

@section('ckeditor')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('backend')
    <div class="container mt-3">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Form</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center">Tambah Edit Absen</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" class="form-control" name="id" value="{{$dataAbsen->id}}">

                                    <div class="form-group">
                                        <label class="control-label mb-1">Tanggal Lahir</label>
                                        <input name="pelajaran_id" type="text" class="form-control" aria-required="true"
                                            aria-invalid="false" value="{{$mataPelajaran}}">
                                        @error('pelajaran_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <input type="hidden" class="form-control" name="id" value="{{$dataAbsen->id}}">

                                    <div class="form-group">
                                        <label class="control-label mb-1">Tanggal Lahir</label>
                                        <input name="tanggal_absen" type="date" class="form-control" aria-required="true"
                                            aria-invalid="false" value="{{$dataAbsen->tanggal_absen}}">
                                        @error('tanggal_absen')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-lg btn-success btn-block"
                                        onclick="return confirm('Apakah sudah benar ?')">
                                        <i class="fa fa-save"></i>&nbsp;
                                        <span>Simpan</span>
                                    </button>
                                </div>
                                <div class="col-lg-6">
                                    <a href={{ route('siswa') }} type="submit" class="btn btn-lg btn-danger btn-block">
                                        <i class="fa fa-arrow-circle-left"></i>&nbsp;
                                        <span>Back</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
