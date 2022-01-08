<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <p class="text-center font-weight-bold">Laporan Absen Siswa</p>
	<div class="mt-4 mb-4">
		<table>
			<tr>
				<td>Mata Pelajaran</td>
				<td> : {{ $jadwal->pelajaran->nama_mata_pelajaran }}</td>
			</tr>
			<tr>
				<td>Guru</td>
				<td> : {{ $jadwal->guru->name }}</td>
			</tr>
			<tr>
				<td>Jam Belajar</td>
				<td> : {{ $jadwal->hari }} | {{ $jadwal->waktu }}</td>
			</tr>
		</table>
	</div>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Siswa</th>
				<th>Kelas</th>
				<th>Waktu Absen</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datas as $p)
			<tr>
				<td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $p->jadwalSiswa->siswa->nama_lengkap }}</td>
                <td>{{ $p->jadwalSiswa->siswa->rombel->kelas }}</td>
				<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $p->created_at)->format('d F Y | H:i:s') }}</td>
                <td>
					@if ($p->alfa != null)
						<span>Alfa</span>
					@endif
					@if ($p->sakit != null)
						<span>Sakit</span>
					@endif
					@if ($p->izin != null)
						<span>Izin</span>
					@endif
					@if ($p->terlambat != null)
						<span>Terlambat</span>
					@endif
					@if ($p->alfa == null && $p->sakit == null && $p->izin == null && $p->terlambat == null)
						<span>Ada</span>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>