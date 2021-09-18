
  <!-- Modal -->
  @foreach($members as $member)
  <div class="modal fade" id="deletePopup{{ $member->id }}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data</h4>
        </div>
        <div class="modal-body">
          <center>Anda Yakin Ingin Menghapus Data</center>
        </div>
        <div class="modal-footer">
            <input type="text" value="{{ $member->id }}" name="id" hidden>
            <input type="text" value="{{ $member->id_alamat }}" name="id_alamat" hidden>
            <a href="{{ route('hapus',$member->id) }}" class="btn btn-danger">Yakin</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>
      
    </div>
  </div>
  @endforeach