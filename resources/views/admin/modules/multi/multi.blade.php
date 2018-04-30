@extends('admin.layouts.app')
@section('title', 'Produk')
@section('content'){{-- 
<script src="{{ asset('assets/dropzone/dropzone.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/dropzone/dropzone.css') }}">  --}}

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{-- <form id="form_advanced_validation" action="index.php?menu=multi&amp;aksi=tambah" method="POST" enctype="multipart/form-data"> --}}
            <form id="form-contact" method="post"  data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel"></h4>
                    <h6><?= date('d-M-Y'); ?></h6>
                </div>
                <hr size="1">
                <div class="modal-body">
                	<input type="hidden" id="id" name="id">
                    <div id="loading"></div>
                    <div id="jabatan_appn">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Gambar</label>
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="gambar[]" placeholder="Gambar" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr size="1">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">BATAL</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <section class="content" >
        <div class="container-fluid">
            <div class="body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Gambar
                                </h2>
                                <a class="btn btn-primary btn-circle waves-effect waves-circle waves-float pull-right" onclick="addForm()"> <i class="material-icons">add</i>
                            	</a>
                            </div>
                            <div class="body">
                                <div class="body table-responsive">
                                    <table id="multi-table" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Gambar</th>
                                                <th>Gambar</th>
                                                <th style="min-width: 150px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('ajax')
<script type="text/javascript">
    var table = $('#multi-table').DataTable({
                      processing: true,
                      serverSide: true,
                      destroy: true,
                      ajax: "{{ route('admin.api.multi') }}",
                      columns: [
                        {data: 'id', name: 'id'},
                        {data: 'id', name: 'id'},
                        {data: 'gambar', name: 'gambar'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                      ]
                    });
    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Produk');
    }
    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form').reset();
        $.ajax({
          url: "{{ url('admin/multi') }}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Produk');

            $('#id').val(data.id);
          },
          error : function() {
              alert("Nothing Data");
          }
        });
    }
    function deleteData(id){
          var csrf_token = "{{ csrf_token() }}";
          // var popup = confirm("Aslina Bade Di Hapus Kang/Teh ???");
          swal({
              title: 'Apakah anda yakin menghapus data ini?',
              text: "Jika anda menghapus data ini, anda tidak akan bisa melihat kembali data tersebut.",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ya',
              cancelButtonText: "Tidak"
          }, function (isConfirm) {
              if (isConfirm) {
                 $.ajax({
                    url : "{{ url('admin/multi') }}" + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : function(data) {
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function () {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
              }
          });
    }
    $(function(){
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                var id = $('#id').val();
                if (save_method == 'add') url = "{{ url('admin/multi') }}";
                else url = "{{ url('admin/multi') . '/' }}" + id;
                console.log(url);


                $.ajax({
                    url : url,
                    type : "POST",
                    // data : $('#modal-form form').serialize(),
                    data: new FormData($("#modal-form form")[0]),
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        $('#loading').html('<center><img src="{{ url('images/loading.gif') }}" width="120px"></center>');
                    },
                    success : function(data) {
                        $('#loading').html("");
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function(data){
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
                // console.log(data);
                return false;
            }
        });
    });
</script>
@endsection