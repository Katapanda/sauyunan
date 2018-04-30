@extends('admin.layouts.app')

@section('title')
    Detail Album
@endsection

@section('content')
    <div class="row">
        <div class="main-header">
            <h4>Detail Album</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Detail Album</h5>

                </div>
                <div class="card-block" style="float: center;">
                      <div class="row" id="galery">
                        @foreach($detail as $foto)
                          <div class="col-md-2">
                            <a href="{{ url($foto->foto) }}" target="_blank">
                              <img src="{{ url($foto->foto) }}" class="img-thumbnail">
                            </a>
                          </div>
                        @endforeach
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <form action="{{ url('admin/api/imgalbum') }}" class="dropzone" id="addImages">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_album" value="{{ $data['id'] }}">
                          </form>
                          <label style="color: red">Silahkan Drag foto Atau Klik Dan Masukan Banyak Foto, dngan Maksimal Size 2 MB/Foto</label>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script> --}}
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script type="text/javascript">
        $("#datepicker").bootstrapMaterialDatePicker({ weekStart : 0, time: false, format : 'YYYY/MM/DD' });
        $('#time').bootstrapMaterialDatePicker({ date: false, format : 'HH:mm'});
    </script>
    <script type="text/javascript">
      Dropzone.options.addImages = {
        maxFilesize: 2,
        acceptedFiles: 'image/*',
        success: function(file, respone) {
          if (file.status == 'success') {
            handleDropzoneFileUpload.handleSuccess(respone);
          } else {
            handleDropzoneFileUpload.handleError(respone);
          }
        }
      };

      var handleDropzoneFileUpload = {
        handleError: function(respone) {
          
        }, 
        handleSuccess: function(respone) {
          var imageList = $('#galery');
          var imageSrc = "{{ url('/') }}" + respone.foto;
          $(imageList).append('<div class="col-md-2">'+
                            '<a href="'+imageSrc+'" target="_blank">'+
                              '<img src="'+imageSrc+'" class="img-thumbnail">'+
                            '</a>'+
                          '</div>');
        }
      };
    </script>
@endpush

