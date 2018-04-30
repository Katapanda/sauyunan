<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="formModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form id="form-contact" method="post"  data-toggle="validator" enctype="multipart/form-data">
        {{ csrf_field() }} {{ method_field('POST') }}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="edit_editor">
          <input type="hidden" name="id" id="id">
          <div class="md-input-wrapper">
            <input type="text" class="md-form-control md-static" name="judul_berita" required placeholder="Judul">
            <label>Judul Berita</label>
            <span class="help-block with-errors"></span>
          </div>
          <div>
            <label>Kategori</label>
            {{-- <input type="hidden" name="kategori"> --}}
            <select class="form-control form-control-inverse fill" name="id_kategori">
              <option value="">Pilih Kategori</option>
              @foreach ($kategori as $kategori_berita)
                <option value="{{ $kategori_berita->id }}">{{ $kategori_berita->nama_kategori }}</option>
              @endforeach
            </select>
          </div><br>
          <div class="md-input-wrapper">
            <input type="file" class="md-form-control md-static" name="foto_berita">
            <label>Foto</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="md-input-wrapper">
            <input type="text" class="md-form-control md-static" name="sumber" required placeholder="Sumber">
            <label>Sumber</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="md-input-wrapper">
            <input type="text" class="md-form-control md-static" name="tanggal_publish" id="datepicker" required placeholder="Tanggal">
            <label>Tanggal Publish</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="md-input-wrapper">
            <textarea name="isi_berita"></textarea>
            <span class="help-block with-errors"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-inverse-default waves-effect waves-light btn-sm" data-dismiss="modal"><i class="icofont icofont-close"></i> Close</button>
          <button type="submit" class="btn btn-inverse-primary waves-effect waves-light btn-sm"><i class="icofont icofont-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
