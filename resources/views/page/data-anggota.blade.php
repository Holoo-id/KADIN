@extends('base')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment</i>
          </div>
          <h4 class="card-title">Data Anggota</h4>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <div class="row mt-3">
              <div class="col">
                <button class="btn bg-primary" data-toggle="modal" data-target="#tambahAnggotaModal">
                  Tambah Anggota
                </button>
              </div>
              <div class="col d-flex justify-content-end">
                <a href="{{ route('anggota-pdf') }}" class="btn btn-danger">Cetak Sebagai PDF</a>
                <a href="{{ route('anggota-excel') }}" class="btn btn-success">Cetak Sebagai EXCEL</a>
              </div>
            </div>
            <!--        Here you can write extra buttons/actions for the toolbar-->
          </div>
          <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>No. Telepon</th>
                  <th>Usia</th>
                  <th>Provinsi</th>
                  <th>Kabupaten/Kota</th>
                  <th>Kecamatan</th>
                  <th>Kelurahan</th>
                  {{-- <th>Titik Kordinat</th> --}}
                  <th>Jenis Usaha</th>
                  <th>Produk</th>
                  <th>Jumlah Karyawan</th>
                  <th class="disabled-sorting text-right"></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>No. Telepon</th>
                  <th>Usia</th>
                  <th>Provinsi</th>
                  <th>Kabupaten/Kota</th>
                  <th>Kecamatan</th>
                  <th>Kelurahan</th>
                  {{-- <th>Titik Kordinat</th> --}}
                  <th>Jenis Usaha</th>
                  <th>Produk</th>
                  <th>Jumlah Karyawan</th>
                  <th class="text-right"></th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($members as $member)
                  <tr>
                    <td>{{ $member->Nama }}</td>
                    <td>{{ $member->NIK }}</td>
                    <td>{{ $member->no_HP }}</td>
                    <td>{{ \Carbon\Carbon::now()->year - \Carbon\Carbon::parse($member->tgl_lahir)->format('Y') }}</td>
                    <td>
                      @foreach ($provinsi as $prov)
                        @foreach ($prov as $p)
                          @if ($member->kategori->provinsi == $p['id'])
                            {{$p['nama']}}
                          @else
                            {{''}}
                          @endif
                        @endforeach
                      @endforeach
                    </td>
                    <td>{{ $member->kategori->kabupaten_kota }}</td>
                    <td>{{ $member->kategori->kecamatan }}</td>
                    <td>{{ $member->kategori->kelurahan_desa }}</td>
                    {{-- <td>{{ $member->kategori->lattitude }},{{ $member->kategori->longitude }}</td> --}}
                    <td>{{ $member->jenis_usaha }}</td>
                    <td>{{ $member->produk }}</td>
                    <td>{{ $member->jumlah_karyawan }}</td>
                    <td class="text-right">
                      <a href="{{ $member->kategori->lokasi }}" target="_blank" class="btn btn-link btn-info btn-just-icon">
                        <i class="material-icons">location_on</i>
                      </a>
                      <button class="btn btn-link btn-success btn-just-icon edit" data-toggle="modal" data-target="#modalEdit{{ $member->id }}">
                        <i class="material-icons">mode_edit</i>
                      </button>
                      <button class="btn btn-link btn-danger btn-just-icon remove" data-toggle="modal" data-target="#deletePopup{{ $member->id }}">
                        <i class="material-icons">delete</i>
                      </button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- end content-->
      </div>
      <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
  </div>
  <!-- end row -->
    @include('page.tambah-anggota')
    @include('page.edit-anggota')
    @include('page.hapus-anggota')
@endsection