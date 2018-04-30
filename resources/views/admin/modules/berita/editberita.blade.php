@extends('admin.layouts.app')

@section('title')
    Edit Berita
@endsection

@section('content')
    
    <div class="row">
        <div class="main-header">
            <h4>Edit Berita</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Edit Berita</h5>
                    {{-- button form modal --}}
                    <button type="button" onclick="addForm()" class="btn btn-inverse-primary waves-effect waves-light btn-sm" style="float: right">
                      <i class="icofont icofont-plus"></i> Ubah Data
                    </button>

                </div>
                <div class="card-block" style="float: center;">
                    <form action="{{ url('admin/berita') }}/editisi/{{ $isi['id'] }}" id="form-contact" method="post"  data-toggle="validator" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="modal-body">
                          
                          <div class="md-input-wrapper">
                              <input type="text" class="md-form-control md-static" name="judul_berita" required placeholder="Judul" value="{{ $isi['judul_berita'] }}">
                              <label>Judul Berita</label>
                              <span class="help-block with-errors"></span>
                            </div>
                            <div>
                              <label>Kategori</label>
                              <select name="select" class="form-control form-control-inverse fill" name="id_kategori">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $kategori_berita)
                                  <option value="{{ $kategori_berita->id }}" 
                                    @if($kategori_berita->id == $isi['id_kategori'])  
                                        selected="selected" 
                                    @endif
                                  >{{ $kategori_berita->nama_kategori }}</option>
                                @endforeach
                              </select>
                            </div><br>
                            <div class="md-input-wrapper">
                              <input type="text" class="md-form-control md-static" name="sumber" required placeholder="Sumber" value="{{ $isi['sumber'] }}">
                              <label>Sumber</label>
                              <span class="help-block with-errors"></span>
                            </div>
                            <div class="md-input-wrapper">
                              <input type="text" class="md-form-control md-static" name="tanggal_publish" id="datepicker" required placeholder="Tanggal" value="{{ $isi['tanggal_publish'] }}">
                              <label>Tanggal Publish</label>
                              <span class="help-block with-errors"></span>
                            </div>
                            <div class="md-input-wrapper">
                              <input type="file" class="md-form-control md-static" name="foto_berita">
                              <label>Foto</label>
                              <span class="help-block with-errors"></span>
                            </div>
                            <div class="md-input-wrapper">
                              <textarea name="isi_berita">{{ $isi['isi_berita'] }}</textarea>
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
    </div>
@endsection

@push('scripts')
    
    <script type="text/javascript">
        tinymce.init({
          selector: 'textarea',
          height: 500,
          menubar: false,
          plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help wordcount'
          ],
          toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
        });
        $("#datepicker").bootstrapMaterialDatePicker({ weekStart : 0, time: false, format : 'YYYY/MM/DD' });
        $('#time').bootstrapMaterialDatePicker({ date: false, format : 'HH:mm'});
    </script>
@endpush

