@extends('admin.layouts.app')

@section('title')
    Visi Misi
@endsection

@section('content')
    
    <div class="row">
        <div class="main-header">
            <h4>Visi Misi</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Visi Misi List</h5>
                    {{-- button form modal --}}
                    <button type="button" onclick="addForm()" class="btn btn-inverse-primary waves-effect waves-light btn-sm" style="float: right">
                      <i class="icofont icofont-plus"></i> Tambah Data
                    </button>

                </div>
                <div class="card-block" style="float: center;">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Filter</h6>
                            <form id="search-form" class="form-inline" role="form">
                                <label>Visi</label>
                                <div class="form-group">
                                    <input type="text" id="visi_" name="visi_" class="form-control" placeholder="Visi">
                                </div>
                                <label>Misi</label>
                                <div class="form-group">
                                    <input type="text" id="misi_" name="misi_" class="form-control" placeholder="Misi">
                                </div>
                                
                                <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                                <button type="button" id="show-data" class="btn btn-inverse-info waves-effect waves-light btn-sm">Tampilkan Semua</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="visimisi-table" class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Visi</th>
                                        <th>Misi</th>
                                        <th style="min-width: 150px">Aksi</th>
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
        @include('admin.modules.visimisi.form')
@endsection

@push('scripts')
    
    <script type="text/javascript">
        tinymce.init({
          selector: 'textarea',
          height: 200,
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
    var oTable = $('#visimisi-table').DataTable({
            dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.api.visimisi') }}",
                data: function (d) {
                    d.visi = $('input[name=visi_]').val();
                    d.misi = $('input[name=misi_]').val();
                }
            },
            columns: [
                {data: 'visi', name: 'visi'},
                {data: 'misi', name: 'misi'},
                {data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false}
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
    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Visi Misi');
    }
    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('admin/visimisi') }}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Visi Misi');
            console.log(data.misi);
            $('#id').val(data.id);
            $('[name=visi]').val(data.visi);
            $('[name=misi]').val(data.misi);
            // $('[name=sumber_visimisi]').val(data.sumber_visimisi);
            // $('[name=foto_visimisi]').val(data.foto_visimisi);
          },
          error : function() {
              alert("Nothing Data");
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
                url: "{{ url('admin/visimisi') }}" + '/' + id,
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
    // $(function(){
    //     $('#modal-form form').validator().on('submit', function (e) {
    //         if (!e.isDefaultPrevented()){
    //             var id = $('#id').val();
    //             if (save_method == 'add') {
    //                 url = "{{ route('visimisi.store') }}";
    //             }else{
    //                 url = "{{ url('admin/visimisi') . '/' }}" + id;
    //             }

    //             $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //             });

    //             $.ajax({
    //                 url: url,
    //                 type: 'POST',
    //                 // data: $('#modal-form form').serialize(),
    //                 data: new FormData($("#modal-form form")[0]),
    //                 contentType: false,
    //                 processData: false,
    //                 success: function(data){
    //                     $('#modal-form').modal('hide');
    //                     oTable.ajax.reload();

    //                     if (save_method == 'add') {
    //                             show_notification('save', 'success');
    //                     }else{
    //                             show_notification('update', 'success');
    //                     }
    //                 },
    //                 error: function(){

    //                     if (save_method == 'add') {
    //                             show_notification('save', 'failed');
    //                     }else{
    //                             show_notification('update', 'failed');
    //                     }
    //                 }
    //             });
    //             // console.log(data);
    //             return false;
    //         }
    //     });
    // });
</script>


@endpush