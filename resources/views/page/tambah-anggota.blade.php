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
                <select name="in_provinsi" id="in_provinsi" class="form-control" onclick="selectProv()">
                    <option value="">Pilih</option>
                    @foreach($provinsi as $gp)
                  @foreach($gp as $p)
                                <option id="optionProvinsi" value="{{ $p['id'] }}" selected>{{ $p['nama'] }}</option>
                  
                  @endforeach
                @endforeach
                </select>
              
               
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Kota / Kabupaten</label>
            <div class="col-sm-8">
              <div class="form-group">
               <select name="kota" id="kota" class="form-control">
               <option selected value=""></option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
               </select>
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Kecamatan</label>
            <div class="col-sm-8">
              <div class="form-group">
              <select name="kecamatan" id="kecamatan" class="form-control">
              <option selected value=""></option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
               </select>
                <span class="bmd-help">Harus diisi</span>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-4 col-form-label">*Desa / Kelurahan</label>
            <div class="col-sm-8">
              <div class="form-group">
              <select name="kelurahan" id="kelurahan" class="form-control">
              <option selected value=""></option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
               </select>
                <span class="bmd-help">Harus diisi</span>
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
            <label class="col-sm-12 col-form-label">Titik Koordinat</label>
            
            <div class="col-sm-12">
            <input type="text" class="form-control" name="lattitude" placeholder="lattitude">
            <input type="text" class="form-control" name="longitude" placeholder="longitude">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d379.2733927706404!2d107.57982613800075!3d-6.864421743410869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e76e523aa4df%3A0x603c8e0ba6705dfe!2sDigital%20Milenial%20Kreatif%20(DMK)!5e0!3m2!1sid!2sid!4v1631470945345!5m2!1sid!2sid" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
<!--  End Modal -->
<script>
 $(document).ready(function() {
            $('#in_provinsi').change( function() {
               $.getJSON('/provinsi/kota/'+$('#in_provinsi').val(), 
               function(data){
                    $('#kota').find('option').remove();
                   
                    $.each(data, function(title,arrayKota){
                        $.each(arrayKota, function(i,j){
                          $( "#kota" ).prop( "disabled", false )
                            $('#kota').append(new Option(j['nama'],j['id']))
                        });
                    })
                    
               });
               
            });
            $('#kota').change( function() {
               $.getJSON('/provinsi/kota/kecamatan/'+$('#kota').val(), 
               function(dataKec){
                    $('#kecamatan').find('option').remove();
                   
                    $.each(dataKec, function(title,arrayKecamatan){
                        $.each(arrayKecamatan, function(k,c){
                          $( "#kecamatan" ).prop( "disabled", false )
                            $('#kecamatan').append(new Option(c['nama'],c['id']))
                           
                        });
                    })
                    
               });
               
            });
            $('#kecamatan').change( function() {
               $.getJSON('/provinsi/kota/kecamatan/kelurahan/'+$('#kecamatan').val(), 
               function(dataKel){
                    $('#kelurahan').find('option').remove();
                   
                    $.each(dataKel, function(title,arrayKelurahan){
                        $.each(arrayKelurahan, function(k,l){
                          $( "#kelurahan" ).prop( "disabled", false )
                            $('#kelurahan').append( new Option(l['nama'],l['id']))
                        });
                    })
                    
               });
               
            });
 });
        
</script>

<script>
  function selectProv(){
    document.getElementById("kelurahan").disabled = true;
    document.getElementById("kecamatan").disabled = true;
    document.getElementById("kota").disabled = true;
  }
</script>