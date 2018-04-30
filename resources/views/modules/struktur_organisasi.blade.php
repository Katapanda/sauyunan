@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Struktur Organisasi
@endsection

@section('content')
    
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/orgchart/orgchart.css') }}">
	<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Struktur Organisasi</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="" class="active">Struktur Organisasi</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Struktur Organisasi -->
    <section class="building_construction_area">
        <div class="container">
            <div class="row building_construction_row">
                <div class="col-sm-8 constructing_laft">
                    <h2>Struktur Organisasi</h2>
                    <div class="row" style="overflow-y: auto;overflow-x: scroll;">
                        <ul id="tree-data" style="display:none;">
                            <li id="root" >
                                @if ($kepala_dinas)
                                <a href="#" onclick="detail('Kepala Dinas')" style="color: #fff; font-size: 14px">
                                    <img src="{{ url($kepala_dinas['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                    <p style="color: #fff; font-size: 14px">Kepala Dinas<br>{{ $kepala_dinas['nama'] }} </p>
                                </a>
                                @else 
                                <a href="#" onclick="detail('Kepala Dinas')" style="color: #fff; font-size: 14px">
                                    <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                    <p style="color: #fff; font-size: 14px">Kepala Dinas<br></p>
                                </a>
                                @endif
                                <ul>
                                    <li id="node1">
                                        @if ($kjf)
                                        <a href="#" onclick="detail('Kelmpok Jabatan Fungsional')">
                                            <img src="{{ url($kjf['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                            <p style="color: #fff; font-size: 14px">Kelmpok Jabatan Fungsional <br> {{ $kjf['nama'] }}. </p>
                                        </a>
                                        @else 
                                        <a href="#" onclick="detail('Kelmpok Jabatan Fungsional')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                            <p style="color: #fff; font-size: 14px">Kelmpok Jabatan Fungsional <br>. </p>
                                        </a>
                                        @endif
                                    </li>

                                    <li id="node2">
                                        @if ($kbp)
                                        <a href="#" onclick="detail('Kepala Bidang Perumahan')">
                                            <img src="{{ url($kbp['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                            <p style="color: #fff; font-size: 14px">Kepala Bidang Perumahan <br> {{ $kbp['nama'] }}</p>
                                        </a>
                                        @else
                                        <a href="#" onclick="detail('Kepala Bidang Perumahan')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                            <p style="color: #fff; font-size: 14px">Kepala Bidang Perumahan <br></p>
                                        </a>
                                        @endif
                                        <ul>
                                            <li id="node6">
                                                @if ($kpme)
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Perencanaan, Monitoring & Evaluasi')">
                                                <img src="{{ url($kpme['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Perencanaan, Monitoring & Evaluasi <br> {{ $kpme['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff; font-size: 14px"  onclick="detail('Kasubbid Perencanaan, Monitoring & Evaluasi')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Perencanaan, Monitoring & Evaluasi <br>
                                                </a>
                                                @endif
                                            </li>
                                            <li id="node6">
                                                @if ($kpn)
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Penyediaan')">
                                                <img src="{{ url($kpn['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Penyediaan <br> {{ $kpn['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Penyediaan')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Penyediaan <br>
                                                </a>
                                                @endif
                                            </li>
                                            <li id="node6">
                                                @if ($kpm)
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Pembiayaan')">
                                                <img src="{{ url($kpm['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Pembiayaan <br> {{ $kpm['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Pembiayaan')">
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
                                            <p style="color: #fff; font-size: 14px">UPT Sangata Utara <br> {{ $usp['nama'] }}</p>
                                        </a>
                                        @else
                                        <a href="#" onclick="detail('UPT Sangata Utara')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff; font-size: 14px">UPT Sangata Utara <br></p>
                                        </a>
                                        @endif
                                    </li>
                                    <li id="node5">
                                        @if ($uss)
                                        <a href="#" onclick="detail('UPT Sangata Selatan')">
                                            <img src="{{ url($uss['foto']) }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff; font-size: 14px">UPT Sangata Selatan <br> {{ $uss['nama'] }}</p>
                                        </a>
                                        @else
                                        <a href="#" onclick="detail('UPT Sangata Selatan')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff; font-size: 14px">UPT Sangata Selatan <br></p>
                                        </a>
                                        @endif
                                    </li>
                                    <li id="node5">
                                        @if ($kbkp)
                                        <a href="#" onclick="detail('Kepla Bidang Kawasan Pemukiman')">
                                            <img src="{{ url($kbkp['foto']) }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff; font-size: 14px">Kepla Bidang Kawasan Pemukiman <br> {{ $kbkp['nama'] }}</p>
                                        </a>
                                        @else
                                        <a href="#" onclick="detail('Kepla Bidang Kawasan Pemukiman')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff; font-size: 14px">Kepla Bidang Kawasan Pemukiman <br></p>
                                        </a>
                                        @endif
                                       <ul>
                                            <li id="node6">
                                                @if ($kpdp)
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Pendataan Dan Perencanaan')"> 
                                                <img src="{{ url($kpdp['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                Kasubbid Pendataan Dan Perencanaan <br> {{ $kpdp['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Pendataan Dan Perencanaan')">
                                                    <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                     Kasubbid Pendataan Dan Perencanaan <br>
                                                </a>
                                                @endif
                                            </li>
                                            <li id="node6">
                                                @if ($kpdpk)
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Pencegahan Dan Peningkatan Kualitas')">
                                                <img src="{{ url($kpdpk['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Pencegahan Dan Peningkatan Kualitas <br> {{ $kpdpk['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Pencegahan Dan Peningkatan Kualitas')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Pencegahan Dan Peningkatan Kualitas <br>
                                                </a>
                                                @endif
                                            </li>
                                            <li id="node6">
                                                @if ($kmdp)
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Manfaat Dan Pengendalian')">
                                                <img src="{{ url($kmdp['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbid Manfaat Dan Pengendalian <br> {{ $kmdp['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbid Manfaat Dan Pengendalian')">
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
                                            <p style="color: #fff; font-size: 14px">Sekertaris <br> {{ $sekertaris['nama'] }}</p>
                                        </a>
                                        @else
                                        <a href="#" onclick="detail('Sekertaris')">
                                            <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px;  margin-right: 10px">
                                            <p style="color: #fff; font-size: 14px">Sekertaris <br></p>
                                        </a>
                                        @endif
                                       <ul>
                                            <li id="node6">
                                                @if ($kppdk)
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbag Perencanaan Program Dan Keuangan')">
                                                <img src="{{ url($kppdk['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbag Perencanaan Program Dan Keuangan <br> {{ $kppdk['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbag Perencanaan Program Dan Keuangan')">
                                                <img src="{{ asset('images/close.png') }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbag Perencanaan Program Dan Keuangan <br>
                                                </a>
                                                @endif
                                            </li>
                                            <li id="node6">
                                                @if ($kudk)
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbag Umum Dan Kepegawaian')">
                                                <img src="{{ url($kudk['foto']) }}" style="width: 120px; height: 120px; margin-right: 10px">
                                                    Kasubbag Umum Dan Kepegawaian <br> {{ $kudk['nama'] }}
                                                </a>
                                                @else
                                                <a href="#" style="color: #fff; font-size: 14px" onclick="detail('Kasubbag Umum Dan Kepegawaian')">
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
                
                @include('includes.sidebar_menu_profil')

            </div>
        </div>
    </section>
    <!-- End Struktur Organisasi -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" style="display: none; margin-top: 10%">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Detail Jabatan</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_hps" name="id">
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
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nip</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody id="list_anggota">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection