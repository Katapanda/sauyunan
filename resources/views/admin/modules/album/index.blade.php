@extends('admin.layouts.app')

@section('title')
    Album
@endsection

@section('content')
    
    <div class="row">
        <div class="main-header">
            <h4>Album</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Album List</h5>
                    {{-- button form modal --}}
                    <button type="button" onclick="addForm()" class="btn btn-inverse-success waves-effect waves-light btn-sm" style="float: right">
                      <i class="icofont icofont-plus"></i> Tambah Data
                    </button>

                </div>
                <div class="card-block" style="float: center;">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Filter</h6>
                            <form id="search-form" class="form-inline" role="form">
                                <div class="form-group">
                                    <input type="text" id="judul_album" name="judul_album" class="form-control" placeholder="Role Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="keterangan_kegiatan" name="keterangan_kegiatan" class="form-control" placeholder="Description">
                                </div>
                                
                                <button type="submit" class="btn btn-sm btn-success">Filter</button>
                                <button type="button" id="show-data" class="btn btn-inverse-success waves-effect waves-light btn-sm">Tampilkan Semua</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="album-table" class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Judul Album</th>
                                        <th>Keterangan Kegiatan</th>
                                        <th>Tanggal Pulish</th>
                                        <th style="min-width: 250px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- include form modal --}}
    @include('admin.modules.album.form')

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
    <script type="text/javascript">
        
        var oTable = $('#album-table').DataTable({
            dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.api.album') }}",
                data: function (d) {
                    d.judul_album = $('input[name=judul_album]').val();
                    d.keterangan_kegiatan = $('input[name=keterangan_kegiatan]').val();
                }
            },
            columns: [
                {data: 'judul_album', name: 'judul_album'},
                {data: 'keterangan_kegiatan', name: 'keterangan_kegiatan'},
                {data: 'tanggal_publish', name: 'tanggal_publish'},
                {data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false}

                // {data: 'id', name: 'id', width: '2%'},
                // {data: 'role_name', name: 'role_name', className: '', width: '15%'},
                // {data: 'description', name: 'description', width: '40%', orderable: false},
                // {data: 'action', name: 'action', className: 'text-center', width: '15%', orderable: false, searchable: false}
            ]
        });

        $('#search-form').on('submit', function(e) {
            oTable.draw();
            e.preventDefault();
        });

        $('#show-data').on('click', function(e) {
            $('#search-form')[0].reset();
            oTable.draw();
            e.preventDefault();
        });

        function addForm(){
            save_method = 'add';
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Tambah Album');
        }
        function editForm(id){
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();

            $.ajax({
                url: "{{ url('admin/album') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Album');

                    $('#id').val(data.id);
                    $('[name=judul_album]').val(data.judul_album);
                    $('[name=keterangan_kegiatan]').val(data.keterangan_kegiatan);
                    $('[name=tanggal_publish]').val(data.tanggal_publish);
                },
                error: function(){
                    alert('Nothing Data');
                }
            });
        }

        function deleteData(id){
            var popup = confirm("Apakah anda yakin akan menghapus data ini?");
            var csrf_token = "{{ csrf_token() }}";
            if (popup == true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('admin/album') }}" + '/' + id,
                    type: "POST",
                    data: {'_method' : 'DELETE', _token : csrf_token},
                    success: function(data){
                        oTable.ajax.reload();
                        show_notification('delete', 'success');
                    },
                    error: function(){
                        show_notification('delete', 'failed');
                    }
                });
            }
        }

        $(function(){
            $('#modal-form form').validator().on('submit', function(e){
                if (!e.isDefaultPrevented()) {
                    var id = $('#id').val();

                    if (save_method == 'add') {
                        url = "{{ route('album.store') }}";
                    }else{
                        url = "{{ url('admin/album') . '/' }}" + id;
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: $('#modal-form form').serialize(),
                        // data: new FormData($("#modal-form form")[0]),
                        // contentType: false,
                        // processData: false,
                        success: function(data){
                            $('#modal-form').modal('hide');
                            oTable.ajax.reload();

                            if (save_method == 'add') {
                                    show_notification('save', 'success');
                            }else{
                                    show_notification('update', 'success');
                            }
                        },
                        error: function(){

                            if (save_method == 'add') {
                                    show_notification('save', 'failed');
                            }else{
                                    show_notification('update', 'failed');
                            }
                        }
                    });

                    return false;
                }
            });
        });
    </script>

    {{-- <script src="{{ asset('assets/plugins/ckeditor/ckeditor-custom.js') }}"></script> --}}

@endpush

