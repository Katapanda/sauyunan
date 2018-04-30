@extends('admin.layouts.app')

@section('title')
	User Role
@endsection

@section('content')
	
	<div class="row">
        <div class="main-header">
            <h4>User Role</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">User Role List</h5>
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
                                    <input type="text" id="role_name" name="role_name" class="form-control" placeholder="Role Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="description" name="description" class="form-control" placeholder="Description">
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
                            <table id="user-role-table" class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th width="30">No</th>
                                        <th>Role Name</th>
                                        <th width="15%">Description</th>
                                        <th></th>
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
    @include('admin.modules.user_role.form')

@endsection

@push('scripts')
    
    <script type="text/javascript">
        
        var oTable = $('#user-role-table').DataTable({
            dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.api.user_role') }}",
                data: function (d) {
                    d.role_name = $('input[name=role_name]').val();
                    d.description = $('input[name=description]').val();
                }
            },
            columns: [
                {data: 'id', name: 'id', width: '2%'},
                {data: 'role_name', name: 'role_name', className: '', width: '15%'},
                {data: 'description', name: 'description', width: '40%', orderable: false},
                {data: 'action', name: 'action', className: 'text-center', width: '15%', orderable: false, searchable: false}
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
            $('.modal-title').text('Tambah User Role');
        }

        function editForm(id){
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();

            $.ajax({
                url: "{{ url('admin/user_role') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit User Role');

                    $('#id').val(data.id);
                    $('input[name=role_name]').val(data.role_name);
                    $('textarea[name=description]').val(data.description);
                },
                error: function(){
                    alert('Nothing Data');
                }
            });
        }

        function deleteData(id){
            var popup = confirm("Apakah anda yakin akan menghapus data ini?");
            var csrf_token = $('meta[name=csrf-token]').attr('content');
            if (popup == true) {
                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });
                $.ajax({
                    url: "{{ url('admin/user_role') }}" + '/' + id,
                    type: "POST",
                    data: {'_method' : 'DELETE', _token : csrf_token},
                    success: function(data){
                        oTable.ajax.reload();
                        
                        // notification
                        $( document ).ready(function() {
                            show_notification('delete', 'success');
                        });
                    },
                    error: function(){
                        
                        // notification
                        $( document ).ready(function() {
                            show_notification('delete', 'failed');
                        });

                    }
                });
            }
        }

        $(function(){
            $('#modal-form form').validator().on('submit', function(e){
                if (!e.isDefaultPrevented()) {
                    var id = $('#id').val();

                    if (save_method == 'add') {
                        url = "{{ route('user_role.store') }}";
                    }else{
                        url = "{{ url('admin/user_role') . '/' }}" + id;
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: url,
                        type: 'POST',
                        // data: $('#modal-form form').serialize(),
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success: function(data){
                            $('#modal-form').modal('hide');
                            oTable.ajax.reload();

                            if (save_method == 'add') {
                                // notification
                                $( document ).ready(function() {
                                    show_notification('save', 'success');
                                });
                            }else{
                                // notification
                                $( document ).ready(function() {
                                    show_notification('update', 'success');
                                });
                            }
                        },
                        error: function(){

                            if (save_method == 'add') {
                                // notification
                                $( document ).ready(function() {
                                    show_notification('save', 'failed');
                                });
                            }else{
                                // notification
                                $( document ).ready(function() {
                                    show_notification('update', 'failed');
                                });
                            }
                        }
                    });

                    return false;
                }
            });
        });

    </script>

@endpush