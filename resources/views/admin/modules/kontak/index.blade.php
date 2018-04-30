@extends('admin.layouts.app')

@section('title')
    Kontak
@endsection

@section('content')
    
    <div class="row">
        <div class="main-header">
            <h4>Kontak</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Kontak List</h5>
                    {{-- button form modal --}}
                    <button type="button" onclick="addForm()" class="btn btn-inverse-primary waves-effect waves-light btn-sm" style="float: right">
                      <i class="icofont icofont-plus"></i> Tambah Data
                    </button>

                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="kontak-table" class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Nomor Telp</th>
                                        <th>Fax</th>
                                        <th>Email</th>
                                        <th>Lokasi</th>
                                        <th>Status Aktif</th>
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
        @include('admin.modules.kontak.form')
@endsection

@push('scripts')
    
<script type="text/javascript">
    var oTable = $('#kontak-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.api.kontak') }}"
            },
            columns: [
                {data: 'telepon', name: 'telepon'},
                {data: 'fax', name: 'fax'},
                {data: 'email', name: 'email'},
                {data: 'lokasi', name: 'lokasi'},
                {data: 'status_aktif', name: 'status_aktif'},
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
        $('.modal-title').text('Tambah Kontak');
    }
    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('admin/kontak') }}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Kontak');

            $('#id').val(data.id);
            $('[name=telepon]').val(data.telepon);
            $('[name=fax]').val(data.fax);
            $('[name=email]').val(data.email);
            $('[name=lokasi]').val(data.lokasi);
            $('[name=status_aktif]').val(data.status_aktif);
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
                url: "{{ url('admin/kontak') }}" + '/' + id,
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
                    url = "{{ route('kontak.store') }}";
                }else{
                    url = "{{ url('admin/kontak') . '/' }}" + id;
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
                // console.log(data);
                return false;
            }
        });
    });
</script>
@endpush