<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KADIN - Data Anggota</title>
	</head>
	<style>
		* {
			font-family: 'Montserrat', sans-serif;
			font-size: .9375rem;
		}
		h1 {
			font-size: 2.5rem;
			text-align: center;
			font-weight: bold;
		}
		table {
			width: 100%;
			margin: 12.5% auto 0;
			table-layout: auto;
			border-spacing: 0;
		}
		table th {
			background-color: #2D4F8E;
			color: #fefefe;
			font-weight: 700;
			padding: .25rem .75rem;
		}
		table tr {
			background-color: #efefef;
		}
		table tr:nth-child(even) {
			background-color: #fefefe;
		}
		table td {
			padding: .25rem .75rem;
		}
	</style>
	<body>
		<h1>KADIN - Data Anggota</h1>
		<table>
			<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>NIK</th>
						<th>Tanggal Lahir</th>
						<th>Telepon</th>
						<th>No. Whatsapp</th>
						<th>Jenis Usaha</th>
						<th>Produk</th>
						<th>Jumlah Karyawan</th>
					</tr>
			</thead>
			<tbody>
					@php $i=1 @endphp
					@foreach($anggota as $a)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{$a->Nama}}</td>
								<td>{{$a->NIK}}</td>
								<td>{{ \Carbon\Carbon::parse($a->tgl_lahir)->format('d F Y')}}</td>
								<td>{{$a->no_HP}}</td>
								<td>{{$a->no_WA}}</td>
								<td>{{$a->jenis_usaha}}</td>
								<td>{{$a->produk}}</td>
								<td>{{$a->jumlah_karyawan}}</td>
							</tr>
					@endforeach
			</tbody>
		</table>
	</body>
</html>