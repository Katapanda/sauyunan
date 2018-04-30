@extends('admin.layouts.app')

@section('title')
    Struktur Organisasi
@endsection

@section('content')
    
    <div class="row">
        <div class="main-header">
            <h4>Struktur Organisasi</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Struktur Organisasi</h5>

                </div>
                <div class="card-block" >
                    <div class="row" style="overflow-y: auto;overflow-x: scroll;">
                        <ul id="tree-data" style="display:none;">
                            <li id="root" >
                                @if ($kepala_dinas)
                                <a href="#" onclick="detail('Kepala Dinas')" style="color: #fff;">
                                    <img src="{{ url($kepala_dinas['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                    <p style="color: #fff;">Kepala Dinas<br>{{ $kepala_dinas['nama'] }} </p>
                                </a>
                                @else 
                                <a href="#" onclick="detail('Kepala Dinas')" style="color: #fff;">
                                    <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                    <p style="color: #fff;">Kepala Dinas<br></p>
                                </a>
                                @endif
                                <ul>
                                    <li id="node1">
                                        @if ($kjf)
                                        <a href="#" onclick="detail('Kelmpok Jabatan Fungsional')">
                                            <img src="{{ url($kjf['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                            <p style="color: #fff;">Kelmpok Jabatan Fungsional <br> {{ $kjf['nama'] }}. </p>
                                        </a>
                                        @else 
                                        <a href="#" onclick="detail('Kelmpok Jabatan Fungsional')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                            <p style="color: #fff;">Kelmpok Jabatan Fungsional <br>. </p>
                                        </a>
                                        @endif
                                    </li>

                                    <li id="node2">
                                        @if ($kbp)
                                        <a href="#" onclick="detail('Kepala Bidang Perumahan')">
                                            <img src="{{ url($kbp['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                            <p style="color: #fff;">Kepala Bidang Perumahan <br> {{ $kbp['nama'] }}</p>
                                        </a>
                                        @else
                                        <a href="#" onclick="detail('Kepala Bidang Perumahan')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                            <p style="color: #fff;">Kepala Bidang Perumahan <br></p>
                                        </a>
                                        @endif
                                        <ul>
                                            <li id="node6">
                                                @if ($kpme)
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Perencanaan, Monitoring & Evaluasi')">
                                                <img src="{{ url($kpme['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Perencanaan, Monitoring & Evaluasi <br> {{ $kpme['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff;"  onclick="detail('Kasubbid Perencanaan, Monitoring & Evaluasi')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Perencanaan, Monitoring & Evaluasi <br>
                                                </a>
                                                @endif
                                            </li>
                                            <li id="node6">
                                                @if ($kpn)
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Penyediaan')">
                                                <img src="{{ url($kpn['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Penyediaan <br> {{ $kpn['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Penyediaan')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Penyediaan <br>
                                                </a>
                                                @endif
                                            </li>
                                            <li id="node6">
                                                @if ($kpm)
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Pembiayaan')">
                                                <img src="{{ url($kpm['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Pembiayaan <br> {{ $kpm['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Pembiayaan')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Pembiayaan <br>
                                                </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="node5">
                                        @if ($usp)
                                        <a href="#" onclick="detail('UPT Sangata Utara')">
                                            <img src="{{ url($usp['foto']) }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff;">UPT Sangata Utara <br> {{ $usp['nama'] }}</p>
                                        </a>
                                        @else
                                        <a href="#" onclick="detail('UPT Sangata Utara')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff;">UPT Sangata Utara <br></p>
                                        </a>
                                        @endif
                                    </li>
                                    <li id="node5">
                                        @if ($uss)
                                        <a href="#" onclick="detail('UPT Sangata Selatan')">
                                            <img src="{{ url($uss['foto']) }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff;">UPT Sangata Selatan <br> {{ $uss['nama'] }}</p>
                                        </a>
                                        @else
                                        <a href="#" onclick="detail('UPT Sangata Selatan')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff;">UPT Sangata Selatan <br></p>
                                        </a>
                                        @endif
                                    </li>
                                    <li id="node5">
                                        @if ($kbkp)
                                        <a href="#" onclick="detail('Kepla Bidang Kawasan Pemukiman')">
                                            <img src="{{ url($kbkp['foto']) }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff;">Kepla Bidang Kawasan Pemukiman <br> {{ $kbkp['nama'] }}</p>
                                        </a>
                                        @else
                                        <a href="#" onclick="detail('Kepla Bidang Kawasan Pemukiman')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff;">Kepla Bidang Kawasan Pemukiman <br></p>
                                        </a>
                                        @endif
                                       <ul>
                                            <li id="node6">
                                                @if ($kpdp)
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Pendataan Dan Perencanaan')"> 
                                                <img src="{{ url($kpdp['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                Kasubbid Pendataan Dan Perencanaan <br> {{ $kpdp['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Pendataan Dan Perencanaan')">
                                                    <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                     Kasubbid Pendataan Dan Perencanaan <br>
                                                </a>
                                                @endif
                                            </li>
                                            <li id="node6">
                                                @if ($kpdpk)
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Pencegahan Dan Peningkatan Kualitas')">
                                                <img src="{{ url($kpdpk['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Pencegahan Dan Peningkatan Kualitas <br> {{ $kpdpk['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Pencegahan Dan Peningkatan Kualitas')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Pencegahan Dan Peningkatan Kualitas <br>
                                                </a>
                                                @endif
                                            </li>
                                            <li id="node6">
                                                @if ($kmdp)
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Manfaat Dan Pengendalian')">
                                                <img src="{{ url($kmdp['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Manfaat Dan Pengendalian <br> {{ $kmdp['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbid Manfaat Dan Pengendalian')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Manfaat Dan Pengendalian <br>
                                                </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="node5">
                                        @if ($sekertaris)
                                        <a href="#" onclick="detail('Sekertaris')">
                                            <img src="{{ url($sekertaris['foto']) }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff;">Sekertaris <br> {{ $sekertaris['nama'] }}</p>
                                        </a>
                                        @else
                                        <a href="#" onclick="detail('Sekertaris')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff;">Sekertaris <br></p>
                                        </a>
                                        @endif
                                       <ul>
                                            <li id="node6">
                                                @if ($kppdk)
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbag Perencanaan Program Dan Keuangan')">
                                                <img src="{{ url($kppdk['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbag Perencanaan Program Dan Keuangan <br> {{ $kppdk['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbag Perencanaan Program Dan Keuangan')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbag Perencanaan Program Dan Keuangan <br>
                                                </a>
                                                @endif
                                            </li>
                                            <li id="node6">
                                                @if ($kudk)
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbag Umum Dan Kepegawaian')">
                                                <img src="{{ url($kudk['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbag Umum Dan Kepegawaian <br> {{ $kudk['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff;" onclick="detail('Kasubbag Umum Dan Kepegawaian')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbag Umum Dan Kepegawaian <br>
                                                </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                
                            </li>
                        </ul>
                        <div id="tree-view"></div> 
                    </div>
                </div>
            </div>
        </div>

        {{-- include form modal --}}
        @include('admin.modules.so.form')
@endsection

@push('scripts')

<script src="{{ asset('assets/plugins/orgchart/orgchart.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
    // create a tree
    $("#tree-data").jOrgChart({
        chartElement: $("#tree-view"), 
        nodeClicked: nodeClicked
    });
    // lighting a node in the selection
    function nodeClicked(node, type) {
        node = node || $(this);
        $('.jOrgChart .selected').removeClass('selected');
            node.addClass('selected');
        }
    });
    function detail(jabatan) {
        $.ajax({
          url: "{{ url('admin/so/show') }}" + '/' + jabatan,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            // var data = data.JSON.Parse();
            // var data = JSON.parse(result);
            if (data.so == "") {
                save_method = "add";
                $('input[name=_method]').val('POST');
                $('input[name=jabatan]').val(jabatan);
                $('#modal-form').modal('show');
                $('#modal-form form')[0].reset();
                $('.modal-title').text('Struktur Organisasi');
            } else {
                $('#detail').modal('show');
                $('.modal-title').text('Detail Jabatan');

                $('#link').attr("href","{{ url('admin/so/detail') }}"+"/"+data.so.id);
                $('#id_hps').val(data.so.id);
                $('#id').val(data.so.id);
                $('#nama').text(data.so.nama);
                $('#jabatan').text(data.so.jabatan);
                $('#email').text(data.so.email);
                $('#bidang').text(data.so.bidang);
                $('#sub_bidang').text(data.so.sub_bidang);
                $('#aksi').html(
                    // '<a onclick="editForm('+data.so.id+')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'+
                    '<a onclick="deleteData('+data.so.id+')" class="btn btn-inverse-danger waves-effect waves-light btn-sm"> <i class="icofont icofont-delete-alt"></i> Delete</a>');
                if (data.data == "") {
                    var a = '<tr><td colspan="3">Data Anggota Tidak Ada</td></tr>';
                } else {
                    var a = "";
                    var j = 1;
                    for (var i = 0; i < data.data.length; i++) {
                        a = a + '<tr><td>'+(j++)+'</td>'+
                                '<td>'+data.data[i].nip+'</td>'+
                                '<td>'+data.data[i].nama+'</td>'+
                                '</tr>';
                    }
                }
                $('#list_anggota').html(a);
            }
          },
          error : function() {
              alert("Nothing Data");
          }
        });
    }
    $(function(){
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                var id = $('#id').val();
                if (save_method == 'add') {
                    url = "{{ route('so.store') }}";
                }else{
                    url = "{{ url('admin/so') . '/' }}" + id;
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

//     // Anggota
//     function addAnggota() {
//         save_method = "add";
//         $('input[name=_method]').val('POST');
//         $('#detail-modal').modal('show');
//         $('input[name=id_so]').val($('input[name=id]').val());
//         $('#detail-modal form')[0].reset();
//         $('.modal-title').text('Tambah Anggota');
//     }
//     function editFormAnggota(id) {
//         save_method = 'edit';
//         var id_so = $('#id_so').val();
//         $('input[name=_method]').val('PATCH');
//         $('#detail-modal form')[0].reset();
//         $.ajax({
//           url: "{{ url('admin/so/detail') }}" + '/' + $id_so + "/edit/"+ id,
//           type: "GET",
//           dataType: "JSON",
//           success: function(data) {
//             $('#detail-modal').modal('show');
//             $('.modal-title').text('Edit Anggota');
            
//             $('#id_detail').val(data.id);
//             $('[name=nip]').val(data.nip);
//             $('[name=nama]').val(data.nama);
//           },
//           error : function() {
//               alert("Nothing Data");
//           }
//         });
//     }
    function deleteData(id){
        var popup = confirm("Apakah anda yakin akan menghapus data ini?");
        var csrf_token = "{{ csrf_token() }}";
        var id = $('#id_hps').val();
        console.log(id);
        if (popup == true) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('admin/so/') }}" + '/' + id,
                type: "POST",
                data: {'_method' : 'DELETE', _token : csrf_token},
                success: function(data){
                    show_notification('delete', 'success');
                },
                error: function(){
                    show_notification('delete', 'failed');
                }
            });
        }
    }
//     // function simpan() {
// $(document).ready(function(){
//     $('#detail-modal').click(function(e){
//         var id = $('#id').val();
//         var id_so = $('#id_so').val();
//         console.log(id_so);
//         if (save_method == 'add') {
//             url = "{{ url('admin/so/detail'). '/' }}" +id_so;
//         }else{
//             url = "{{ url('admin/so/detail') . '/' }}" +id_so+ '/' + id;
//         }
//         console.log(url);
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         $.ajax({
//             url: url,
//             type: 'POST',
//             data: new FormData($("#detail-modal form")[0]),
//             success: function(data){
//                 $('#detail-modal').modal('hide');
//                 if (save_method == 'add') {
//                         show_notification('save', 'success');
//         e.preventDefault();
//                 }else{
//                         show_notification('update', 'success');
//                 }
//             },
//             error: function(){

//                 if (save_method == 'add') {
//                         show_notification('save', 'failed');
//                 }else{
//                         show_notification('update', 'failed');
//                 }
//             }
//         });
//         return false;
//     });
// });
</script>
@endpush