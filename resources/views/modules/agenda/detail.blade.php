@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Detail Agenda
@endsection

@section('content')
    
	<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Detail Agenda</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="{{ route('agenda') }}">Agenda</a></li>
            <li><a href="" class="active">Detail</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

	<!-- Agenda -->
    <section class="blog_all">
        <div class="container">
            <div class="row m0 blog_row">
                <div class="col-sm-8 main_blog">
                    <div class="col-xs-1 p0">
                       <div class="blog_date">
                           <a href="#">{{ date('d', strtotime($agenda_detail->tanggal)) }}</a>
                            <a href="#">{{ date('M', strtotime($agenda_detail->tanggal)) }}</a>
                       </div>
                    </div>
                    <div class="col-xs-11 blog_content">
                        <a class="blog_heading" href="#">{{ $agenda_detail->nama_kegiatan }}</a>
                        <a class="blog_admin" href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>
                            {{ $agenda_detail->jenis_kegiatan }}
                        </a>
                        <table class="table table-responsive">
                            <tr>
                                <td>Perihal</td>
                                <td>: {{ $agenda_detail->perihal }}</td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td>: {{ tanggal_indo($agenda_detail->tanggal) .' '. $agenda_detail->waktu }}</td>
                            </tr>
                            <tr>
                                <td>Lokasi</td>
                                <td>: {{ $agenda_detail->lokasi }}</td>
                            </tr>
                            <tr>
                                <td>Hadirin</td>
                                <td>: {{ $agenda_detail->hadirain }}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>{!! $agenda_detail->keterangan_kegiatan !!}</td>
                            </tr>
                        </table>
                        <div class="tag">
                            <h4>TAG</h4>
                            <a href="{{ route('berita') }}">BERITA</a>
                            <a href="{{ route('artikel') }}">ARTIKEL</a>
                            <a href="{{ route('agenda') }}">AGENDA</a>
                            <a href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 widget_area">

                    <div class="resent">
                        <h3>AGENDA LAINNYA</h3>
                        @foreach($agenda as $ag)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <!-- <img class="media-object" src="{{ asset('assets_frontend/images/default.png') }}" alt=""> -->
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{ route('agenda.detail', [$ag->id]) }}" title="{{ $ag->judul_pengumuman }}">{!! substr($ag->nama_kegiatan, 0, 35) . '...' !!}</a>
                                    <h6>{{ tanggal_indo($ag->tanggal) }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Agenda -->

@endsection