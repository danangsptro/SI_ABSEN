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
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Mapel</th>
                <th>Guru</th>
				<th>Siswa</th>
				<th>Kelas</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datas as $p)
			<tr>
				<td class="text-center">{{ $loop->iteration }}</td>
				<td>{{ $p->jadwalSiswa->jadwal->pelajaran->nama_mata_pelajaran }}</td>
                <td>{{ $p->jadwalSiswa->jadwal->guru->name }}</td>
                <td>{{ $p->jadwalSiswa->siswa->nama_lengkap }}</td>
                <td>{{ $p->jadwalSiswa->siswa->rombel->kelas }}</td>
                <td>-</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>