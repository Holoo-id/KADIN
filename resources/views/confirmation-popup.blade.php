<!-- LOGOUT modal -->
<div class="modal fade modal-mini modal-primary" id="logoutPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
      </div>
      <div class="modal-body">
        <p>Logout sekarang membuat semua progres yang belum disimpan akan hilang?</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-link" data-dismiss="modal">Tidak Jadi</button>
        <a href="{{ route('login') }}" type="button" class="btn btn-primary btn-link">Ya, Saya Yakin
          <div class="ripple-container"></div>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- DELETE DATA modal -->
<div class="modal fade modal-mini modal-primary" id="deletePopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
      </div>
      <div class="modal-body">
        <p>Hapus data yang dipilih?</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-link" data-dismiss="modal">Tidak</button>
        <a href="" type="button" class="btn btn-primary btn-link">Ya
          <div class="ripple-container"></div>
        </a>
      </div>
    </div>
  </div>
</div>