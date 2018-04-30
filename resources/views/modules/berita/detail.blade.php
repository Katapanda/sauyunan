@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Berita
@endsection

@section('content')
    
    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Detail Berita</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="{{ route('berita') }}">Berita</a></li>
            <li><a href="" class="active">Detail</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

	<!-- Berita -->
    <section class="blog_all">
        <div class="container">
            <div class="row m0 blog_row">
                <div class="col-sm-8 main_blog">
                    <img src="{{ asset($berita_detail->foto_berita) }}" alt="">
                    <div class="col-xs-1 p0">
                       <div class="blog_date">
                           <a href="#">{{ date('d', strtotime($berita_detail->tanggal_publish)) }}</a>
                            <a href="#">{{ date('M', strtotime($berita_detail->tanggal_publish)) }}</a>
                       </div>
                    </div>
                    <div class="col-xs-11 blog_content">
                        <a class="blog_heading" href="#">{{ $berita_detail->judul_berita }}</a>
                        <!-- <a class="blog_admin" href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>
                            {{ $berita_detail->id_kategori }}
                        </a> -->
                        <p>{!! $berita_detail->isi_berita !!}</p>
                        <p><strong>Sumber : </strong> <a href="{{ $berita_detail->sumber }}" target="_blank"> {{ $berita_detail->sumber }} </a></p>
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
                        <h3>BERITA LAINNYA</h3>
                        @foreach($berita as $br)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="{{ asset($br->foto_berita) }}" alt="" width="60" height="50">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{ route('berita.detail', [$br->id]) }}" title="{{ $br->judul_berita }}">{!! strip_tags(substr($br->judul_berita, 0, 35)) . '...' !!}</a>
                                    <h6>{{ tanggal_indo($br->tanggal_publish) }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Berita -->


@endsection