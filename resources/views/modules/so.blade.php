<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tutorial-boostrap-merubaha-warna">
    <meta name="author" content="ilmu-detil.blogspot.com">
    <title>Struktur Organisasi</title>
    <!-- CSS -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">  
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <link href="{{ asset('assets/so/orgchart/orgchart.css') }}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{ asset('assets/so/orgchart/orgchart.js') }}"></script>
<body> 
<div class="container">
    <div class="row">
        <ul id="tree-data" style="display:none">
            <li id="root" >
                <a href="#" onclick="detail('Kepala Dinas')" style="color: #fff;">
                    <img src="{{ asset('images/CEO.png') }}" style="width: 40%; float: left; float: left; margin-right: 10px">
                    <p style="text-align: left;">Kepala Dinas<br>A.M. Fitra </p>
                </a>
                <ul>
                    <li id="node1" style="width: 200px">
                        <a href="#" onclick="detail('Kelmpok Jabatan Fungsional')" style="color: #fff">
                            <img src="{{ asset('images/CTO.png') }}" style="width: 40%; float: left; float: left; margin-right: 10px">
                            <p style="text-align: left;">Kelmpok Jabatan Fungsional <br> Irfan Rangga Gumilar. </p>
                        </a>
                    </li>
                    <li id="node2">
                        <a href="#" onclick="detail('Kepala Bidang Perumahan')" style="color: #fff">
                            <img src="{{ asset('images/CMO.png') }}" style="width: 40%; float: left; margin-right: 10px">
                            <p style="text-align: left;">Kepala Bidang Perumahan <br> Julio</p>
                        </a>
                        <ul>
                            <li id="node6">
                                <img src="{{ asset('images/CTO.png') }}" style="width: 40%; float: left; float: left; margin-right: 10px">
                                <a href="#" onclick="detail('Kasii Perencanaan, Monitoring & Evaluasi')" style="color: #fff">
                                    Kasii Perencanaan, Monitoring & Evaluasi
                                </a>
                            </li>
                            <li id="node6">
                                <img src="{{ asset('images/CTO.png') }}" style="width: 40%; float: left; float: left; margin-right: 10px">
                                <a href="#" onclick="detail('Kasi Penyediaan')" style="color: #fff">
                                    Kasi Penyediaan
                                </a>
                            </li>
                            <li id="node6">
                                <img src="{{ asset('images/CTO.png') }}" style="width: 40%; float: left; float: left; margin-right: 10px">
                                <a href="#" onclick="detail('Kasi Pembiayaan')" style="color: #fff">
                                    Kasi Pembiayaan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="node5">
                        <a href="#" onclick="detail('UPT Sangata Utara')" style="color: #fff">
                            <img src="{{ asset('images/COO.jpeg') }}" style="width: 40%; float: left;  float: left; margin-right: 10px">
                            <p style="text-align: left;">UPT Sangata Utara <br></p>
                        </a>
                    </li>
                    <li id="node5">
                        <a href="#" onclick="detail('UPT Sangata Selatan')" style="color: #fff">
                            <img src="{{ asset('images/COO.jpeg') }}" style="width: 40%; float: left;  float: left; margin-right: 10px">
                            <p style="text-align: left;">UPT Sangata Selatan <br></p>
                        </a>
                    </li>
                    <li id="node5">
                        <a href="#" onclick="detail('c0o')" style="color: #fff">
                            <img src="{{ asset('images/COO.jpeg') }}" style="width: 40%; float: left;  float: left; margin-right: 10px">
                            <p style="text-align: left;">Kepla Bidang Kawasan Pemukiman <br></p>
                        </a>
                       <ul>
                            <li id="node6">
                                <img src="{{ asset('images/CTO.png') }}" style="width: 40%; float: left; float: left; margin-right: 10px">
                                <a href="#" onclick="detail('progremer')" style="color: #fff">
                                    Kasi Pendataan Dan Perencanaan
                                </a>
                            </li>
                            <li id="node6">
                                <img src="{{ asset('images/CTO.png') }}" style="width: 40%; float: left; float: left; margin-right: 10px">
                                <a href="#" onclick="detail('desain')" style="color: #fff">
                                    Kasi Pencegahan Dan Peningkatan Kualitas
                                </a>
                            </li>
                            <li id="node6">
                                <img src="{{ asset('images/CTO.png') }}" style="width: 40%; float: left; float: left; margin-right: 10px">
                                <a href="#" onclick="detail('dahar')" style="color: #fff">
                                    Kasi Manfaat Dan Pengendalian
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="node5">
                        <a href="#" onclick="detail('c0o')" style="color: #fff">
                            <img src="{{ asset('images/COO.jpeg') }}" style="width: 40%; float: left;  float: left; margin-right: 10px">
                            <p style="text-align: left;">Sekertaris <br></p>
                        </a>
                       <ul>
                            <li id="node6">
                                <img src="{{ asset('images/CTO.png') }}" style="width: 40%; float: left; float: left; margin-right: 10px">
                                <a href="#" onclick="detail('progremer')" style="color: #fff">
                                    Kasubbag Perencanaan Program Dan Keuangan
                                </a>
                            </li>
                            <li id="node6">
                                <img src="{{ asset('images/CTO.png') }}" style="width: 40%; float: left; float: left; margin-right: 10px">
                                <a href="#" onclick="detail('desain')" style="color: #fff">
                                    Kasubbag Umum Dan Kepegawaian
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                
            </li>
        </ul>
        <div id="tree-view"></div> 
    </div>
</div> 
<script>
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
        $('#detail').modal('show');
        $.ajax({
          url: "{{ url('so') }}" + '/' + jabatan,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            // var data = data.JSON.Parse();
            // var data = JSON.parse(result);
            // console.log(data[0]);
            $('#modal-form').modal('show');
            $('.modal-title').text('Detail Jabatan');

            $('#id').val(data[0].id);
            $('#nama').text(data[0].nama);
            $('#jabatan').text(data[0].jabatan);
            $('#email').text(data[0].email);
            $('#bidang').text(data[0].bidang);
            $('#sub_bidang').text(data[0].sub_bidang);
          },
          error : function() {
              alert("Nothing Data");
          }
        });
    }
</script>        
</body>
</html>

<div class="modal fade" id="detail" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Detail Jabatan</h4>
                <h6><?= date('d-M-Y'); ?></h6>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id" name="id">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>Nama</td>
                                    <td>Jabatan</td>
                                    <td>Email</td>
                                    <td>Bidang</td>
                                    <td>Sub Bidang</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="nama"></td>
                                    <td id="jabatan"></td>
                                    <td id="email"></td>
                                    <td id="bidang"></td>
                                    <td id="sub_bidang"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>