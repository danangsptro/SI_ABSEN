@extends('backend.masterbackend')
@section('title', 'ABSEN | Data Absen')
@section('backend')
<div class="container-fluid mt-2">
    <div class="card">
        <h6 class="card-header">Jadwal</h6>
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
            </div>
        </div>
    </div>

    <div class="card">
        <h6 class="card-header">Siswa</h6>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <form class="needs-validation" id="form" method="POST" novalidate>
                        {{ method_field('POST') }}
                        <input type="hidden" id="id" name="id" value="{{ $jadwal->id }}"/>
                        <div class="form-row form-inline">
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-8">
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    
</script>
@endsection
