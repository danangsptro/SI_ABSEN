@extends('backend.masterbackend')
@section('title', 'ABSEN | Edit Siswa')

@section('ckeditor')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('backend')
    <div class="container mt-3">
        <form action="{{route('siswa-update', $siswa->id)}}" method="POST" enctype="multipart/form-data">
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
                                <h3 class="text-center">Tambah Edit Siswa</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" class="form-control" name="id" value="{{ $siswa->id }}">

                                    <div class="form-group">
                                        <label class="control-label mb-1">NISN</label>
                                        <input name="nisn" type="number" class="form-control" aria-required="true"
                                            aria-invalid="false" placeholder="Masukan nisn dengan benar"
                                            value="{{ $siswa->nisn }}">
                                        @error('nisn')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label mb-1">NIK</label>
                                        <input name="nik" type="number" class="form-control" aria-required="true"
                                            aria-invalid="false" placeholder="Masukan nik siswa" value="{{$siswa->nik}}">
                                        @error('nik')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Nama</label>
                                        <input name="nama_lengkap" type="text" class="form-control" aria-required="true"
                                            aria-invalid="false" placeholder="Masukan nama lengkap siswa" value="{{$siswa->nama_lengkap}}">
                                        @error('nama_lengkap')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Jenis Kelamin</label>
                                        <input name="jenis_kelamin" type="text" class="form-control" aria-required="true"
                                            aria-invalid="false" placeholder="Masukan nama lengkap siswa" value="{{$siswa->jenis_kelamin}}">
                                        @error('jenis_kelamin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Status</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="status">
                                                <option selected>Pilih Option</option>
                                                <option value="aktif">Aktif</option>
                                                <option value="tidakAktif">Tidak Aktif</option>
                                            </select>
                                            @error('tingkat_rombel')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Tempat Lahir</label>
                                        <input name="tempat_lahir" type="text" class="form-control" aria-required="true"
                                            aria-invalid="false" placeholder="Masukan tempat lahir siswa" value="{{$siswa->tempat_lahir}}">
                                        @error('tempat_lahir')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" type="date" class="form-control" aria-required="true"
                                            aria-invalid="false" value="{{$siswa->tanggal_lahir}}">
                                        @error('tanggal_lahir')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="alamat">Masukan Alamat</label>
                                    <textarea id="field" class="form-control @error('isi_berita') is-invalid @enderror" name="alamat"  required>
                                        {{ old('alamat') ?? $siswa->alamat }}
                                    </textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Tingkat Rombel</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="rombel_id">
                                                <option selected>Pilih Option</option>
                                                @foreach ($rombel as $ds)
                                                <option value="{{ $ds->id }}"
                                                    {{ old('rombel_id') ?? $siswa->rombel_id == $ds->id ? 'selected' : '' }}>
                                                    {{ $ds->kelas }}
                                                </option>
                                            @endforeach
                                            </select>
                                            @error('rombel_id')
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
