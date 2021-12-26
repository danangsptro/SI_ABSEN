@extends('backend.masterbackend')
@section('title', 'ABSEN | Tambah Siswa')

@section('backend')
    <div class="container mt-3">
        <form action="{{ route('absen-siswa-tambah-post') }}" method="POST" enctype="multipart/form-data">
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
                                <h3 class="text-center">Tambah Data Absen</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Data Kelas</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="kelas_id">
                                                <option selected disabled>Pilih Option</option>
                                                @foreach ($siswa as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{$item->kelas}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kelas_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Mata Pelajaran</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="pelajaran_id">
                                                <option selected disabled>Pilih Option</option>
                                                @foreach ($mataPelajaran as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama_mata_pelajaran }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('pelajaran_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Guru</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="guru_id">
                                                <option selected disabled>Pilih Option</option>
                                                @foreach ($guru as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('guru_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                                    <a href={{ route('absen-siswa') }} type="submit"
                                        class="btn btn-lg btn-danger btn-block">
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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script> --}}
@endsection
