@extends('admin.layouts.app')

@section('title')
    Struktur Organisasi Detail
@endsection

@section('content')
    
    <div class="row">
        <div class="main-header">
            <h4>Struktur Organisasi Detail</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Struktur Organisasi Detail</h5>
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
                                <div class="form-group">
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Role Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="nip" name="nip" class="form-control" placeholder="Description">
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
                            <table id="sodetail-table" class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nip</th>
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
        @include('admin.modules.so.detail.form')
@endsection

@push('scripts')
<script type="text/javascript">
    var oTable = $('#sodetail-table').DataTable({
            dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('admin/api/sodetail') }}"+ '/' + {{ $id_so }},
                data: function (d) {
                    d.nama = $('input[name=nama]').val();
                    d.nip = $('input[name=nip]').val();
                }
            },
            columns: [
                {data: 'nama', name: 'nama'},
                {data: 'nip', name: 'nip'},
                // {data: 'sub_bidang', name: 'sub_bidang'},
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
        $('.modal-title').text('Tambah Struktur Organisasi Detail');
    }
    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('admin/so/detail') }}" + '/' + {{ $id_so }} + "/edit/"+ id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Struktur Organisasi Detail');
            
            $('#id').val(data.id);
            $('[name=nip]').val(data.nip);
            $('[name=nama]').val(data.nama);
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
                url: "{{ url('admin/so/detail') }}" + '/' + {{ $id_so }} +'/'+ id,
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
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                var id = $('#id').val();
                if (save_method == 'add') {
                    url = "{{ url('admin/so/detail'). '/' }}" + {{ $id_so }};
                }else{
                    url = "{{ url('admin/so/detail') . '/' }}" + {{ $id_so }}+ '/' + id;
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
                // consodetaille.log(data);
                return false;
            }
        });
    });
</script>
@endpush