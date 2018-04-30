<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="formModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form method="post" class="form-horizontal" data-toggle="validator">
        
        {{ csrf_field() }} {{ method_field('POST') }}
      
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="md-input-wrapper">
            <input type="text" name="role_name" id="role_name" class="md-form-control md-static" autocomplete="false" />
            <label>Role Name</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="md-input-wrapper">
            <textarea name="description" id="description" class="md-form-control md-static" cols="2" rows="4"></textarea>
            <label>Description </label>
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