<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('/assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
    <title>Document</title>
</head>
<style>
    th{
        font-size:20px;
    }
</style>
<body>
    <center><h4>
        Laporan Anggota
    </h4></center>
<table class='table table-bordered'>
        <thead>
            <tr>
            <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>T.Lahir</th>
                <th>NoHp</th>
                <th>NoWa</th>
                <th>J.Usaha</th>
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
                <td>{{$a->tgl_lahir}}</td>
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