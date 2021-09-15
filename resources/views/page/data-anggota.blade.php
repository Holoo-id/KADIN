@extends('base')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment</i>
          </div>
          <h4 class="card-title">Data Anggota</h4>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <!--        Here you can write extra buttons/actions for the toolbar              -->
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
                  <th>Titik Kordinat</th>
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
                  <th>Titik Kordinat</th>
                  <th>Jenis Usaha</th>
                  <th>Produk</th>
                  <th>Jumlah Karyawan</th>
                  <th class="text-right"></th>
                </tr>
              </tfoot>
              <tbody>
                @for ($i = 0; $i < 55; $i++)
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>1234567890987654</td>
                    <td>081209871234</td>
                    <td>61</td>
                    <td>Jawa Barat</td>
                    <td>Kota Cimahi</td>
                    <td>Cimahi Selatan</td>
                    <td>Cipageran</td>
                    <td>-6.8588318,107.4773953</td>
                    <td>Makanan</td>
                    <td>Bakso UwU</td>
                    <td>10</td>
                    <td class="text-right">
                      <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">mode_edit</i></a>
                      <button class="btn btn-link btn-danger btn-just-icon remove" data-toggle="modal" data-target="#deletePopup">
                        <i class="material-icons">delete</i>
                      </button>
                    </td>
                  </tr>
                @endfor
              </tbody>
            </table>
          </div>
          <div class="row mt-3">
            <div class="col">
              <button class="btn bg-primary" data-toggle="modal" data-target="#tambahAnggotaModal">
                Tambah Anggota
              </button>
            </div>
            <div class="col d-flex justify-content-end">
              <a href="" class="btn btn-danger">Cetak Sebagai PDF</a>
              <a href="" class="btn btn-success">Cetak Sebagai EXCEL</a>
            </div>
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
@endsection