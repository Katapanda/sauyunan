@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Artikel
@endsection

@section('content')
    
	<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Detail Artikel</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="{{ route('artikel') }}">Artikel</a></li>
            <li><a href="" class="active">Detail</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

	<!-- Artikel -->
    <section class="blog_all">
        <div class="container">
            <div class="row m0 blog_row">
                <div class="col-sm-8 main_blog">
                    @if($artikel_detail->count() > 0)
                        <img src="{{ asset($artikel_detail->foto_artikel) }}" alt="">
                        <div class="col-xs-1 p0">
                           <div class="blog_date">
                               <a href="#">{{ date('d', strtotime($artikel_detail->created_at)) }}</a>
                                <a href="#">{{ date('M', strtotime($artikel_detail->created_at)) }}</a>
                           </div>
                        </div>
                        <div class="col-xs-11 blog_content">
                            <a class="blog_heading" href="#">{{ $artikel_detail->judul_artikel }}</a>
                            <!-- <a class="blog_admin" href="#"><i class="fa fa-user" aria-hidden="true"></i>Emran Khan</a> -->
                            <p>{!! $artikel_detail->isi_artikel !!}</p>
                            <p><strong>Sumber :</strong> {{ $artikel_detail->sumber_artikel }}</p>
                            <div class="tag">
                                <h4>TAG</h4>
                                <a href="{{ route('berita') }}">BERITA</a>
                                <a href="{{ route('artikel') }}">ARTIKEL</a>
                                <a href="{{ route('agenda') }}">AGENDA</a>
                                <a href="{{ route('pengumuman') }}">PENGUMUMAN</a>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-sm-4 widget_area">

                    <div class="resent">
                        <h3>ARTIKEL LAINNYA</h3>
                        @foreach($artikel as $ar)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="{{ asset($ar->foto_artikel) }}" alt="" width="60" height="50">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{ route('artikel.detail', [$ar->id]) }}" title="{{ $ar->judul_artikel }}">{!! strip_tags(substr($ar->judul_artikel, 0 , 35)) . ' ...' !!}</a>
                                    <h6>{{ tanggal_indo(date('Y-m-d', strtotime($ar->created_at))) }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- <div class="resent">
                        <h3>CATEGORIES</h3>
                        <ul class="architecture">
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Construction</a></li>
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Architecture</a></li>
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Building</a></li>
                            <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Design</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Artikel -->

@endsection