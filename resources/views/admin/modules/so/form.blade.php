<div class="modal fade" id="detail" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Detail Jabatan</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_hps" name="id">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>Nama</td>
                                    <td>Jabatan</td>
                                    <td>Email</td>
                                    <td>Bidang</td>
                                    <td>Sub Bidang</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="nama"></td>
                                    <td id="jabatan"></td>
                                    <td id="email"></td>
                                    <td id="bidang"></td>
                                    <td id="sub_bidang"></td>
                                    <td id="aksi"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <a id="link" href="#" class="btn btn-inverse-primary waves-effect waves-light btn-sm" style="float: right">
                      <i class="icofont icofont-plus"></i> Tambah Anggota
                    </a>
                  </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nip</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody id="list_anggota">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <input type="hidden" name="jabatan">
          <div class="md-input-wrapper">
            <input type="text" class="md-form-control md-static" name="nip" required placeholder="Nip">
            <label>Nip</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="md-input-wrapper">
            <input type="text" class="md-form-control md-static" name="nama" required placeholder="Nama">
            <label>Nama</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="md-input-wrapper">
            <input type="text" class="md-form-control md-static" name="bidang" required placeholder="Bidang">
            <label>Bidang</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="md-input-wrapper">
            <input type="text" class="md-form-control md-static" name="sub_bidang" required placeholder="Sub Bidang">
            <label>Sub Bidang</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="md-input-wrapper">
            <input type="text" class="md-form-control md-static" name="email" required placeholder="Email">
            <label>Email</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="md-input-wrapper">
            <input type="file" class="md-form-control md-static" name="foto">
            <label>Foto</label>
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
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="formModalCenterTitle" aria-hidden="true">
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
        <div class="modal-body">
          <input type="hidden" name="id_so" id="id_so">
          <input type="hidden" name="id_detail" id="id_detail">
          <div class="md-input-wrapper">
            <input type="text" class="md-form-control md-static" name="nip" required placeholder="Nip">
            <label>Nip</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="md-input-wrapper">
            <input type="text" class="md-form-control md-static" name="nama" required placeholder="Nama">
            <label>Nama</label>
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
