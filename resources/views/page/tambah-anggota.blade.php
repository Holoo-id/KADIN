<!-- Classic Modal -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<div class="modal fade" id="tambahAnggotaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Anggota</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="material-icons">clear</i>
        </button>
      </div>
      <form method="post" action="{{ route('post-data-anggota') }}" class="form-horizontal">
        @csrf
        <div class="modal-body">
          <div class="row">
            <label class="col-sm-4 col-form-label">*Nama</label>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" name="nama" class="form-control">
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*NIK</label>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" name="nik" class="form-control" pattern="[0-9]{16}">
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Telepon</label>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="tel" name="phone" class="form-control">
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Whatsapp</label>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="tel" name="wa" class="form-control">
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Tanggal Lahir</label>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="date" name="tgl_lahir" class="form-control" max="{{ now()->toDateString('Y-m-d') }}">
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Provinsi</label>
            <div class="col-sm-8">
              <div class="form-group">
                <select name="provinsi" id="provinsi" class="form-control">
                  <option value="0" selected>======PILIH PROVINSI======</option>
                  @foreach($provinsi as $gp)
                    @foreach($gp as $p)
                      <option id="optionProvinsi" value="{{ $p['id'] }}">{{ $p['nama'] }}</option>
                    @endforeach
                  @endforeach
                </select>
                <span class="bmd-help">Harus diisi</span>
                <input type="hidden" name="in_provinsi" value="0">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Kota / Kabupaten</label>
            <div class="col-sm-8">
              <div class="form-group">
                <select name="kota" id="kota" class="form-control" disabled>
                    <option value="0" selected>======PILIH KOTA/KABUPATEN======</option>
                </select>
                <span class="bmd-help">Harus diisi</span>
                <input type="hidden" name="in_kota" value="0">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Kecamatan</label>
            <div class="col-sm-8">
              <div class="form-group">
                <select name="kecamatan" id="kecamatan" class="form-control" disabled>
                    <option value="0" selected>======PILIH KECAMATAN======</option>
                </select>
                <span class="bmd-help">Harus diisi</span>
                <input type="hidden" name="in_kecamatan" value="0">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Desa / Kelurahan</label>
            <div class="col-sm-8">
              <div class="form-group">
                <select name="kelurahan" id="kelurahan" class="form-control" disabled>
                    <option value="0" selected>======PILIH KELURAHAN/DESA======</option>
                </select>
                <span class="bmd-help">Harus diisi</span>
                <input type="hidden" name="in_kelurahan" value="0">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Alamat</label>
            <div class="col-sm-8">
              <div class="form-group">
               <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">Titik Koordinat</label>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="url" class="form-control" name="lokasi" placeholder="data lokasi diisi berdasarkan tautan lokasi pada google maps">
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">Jenis Usaha</label>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" class="form-control" name="jenis_usaha">
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">Produk</label>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" class="form-control" name="produk">
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">Jumlah Karyawan</label>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="number" class="form-control" name="jumlah_karyawan">
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success btn-link">
          <input type="reset" class="btn btn-danger btn-link">
        </div>
      </form>
    </div>
  </div>
</div>