@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Pengumuman
@endsection

@section('content')
    
	<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Detail Pengumuman</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
            <li><a href="" class="active">Detail</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

	<!-- Pengumuman -->
    <section class="blog_all">
        <div class="container">
            <div class="row m0 blog_row">
                <div class="col-sm-8 main_blog">
                    <img src="{{ asset($pengumuman_detail->foto_pamflet) }}" alt="">
                    <div class="col-xs-1 p0">
                       <div class="blog_date">
                           <a href="#">{{ date('d', strtotime($pengumuman_detail->tanggal_publish)) }}</a>
                            <a href="#">{{ date('M', strtotime($pengumuman_detail->tanggal_publish)) }}</a>
                       </div>
                    </div>
                    <div class="col-xs-11 blog_content">
                        <a class="blog_heading" href="#">{{ $pengumuman_detail->judul_pengumuman }}</a>
                        <p>{{ $pengumuman_detail->isi_pengumuman }}</p>
                        <p><strong>File Pendukung :</strong> {{ $pengumuman_detail->file_pendukung }}</p>
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
                        <h3>PENGUMUMAN LAINNYA</h3>
                        @foreach($pengumuman as $pgm)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="{{ asset($pgm->foto_pamflet) }}" alt="" width="60" height="50">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{ route('pengumuman.detail', [$pgm->id]) }}" title="{{ $pgm->judul_pengumuman }}">{!! substr($pgm->judul_pengumuman, 0, 35) . '...' !!}</a>
                                    <h6>{{ tanggal_indo($pgm->tanggal_publish) }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pengumuman -->

@endsection