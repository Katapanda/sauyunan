@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Berita
@endsection

@section('content')
	
	<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Berita</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="" class="active">Berita</a></li>
        </ol>
    </section>
    <!-- End Banner area -->
    
    <!-- Berita -->
    <section class="blog_tow_area">
        <div class="container">
           <div class="row blog_tow_row">
                @foreach($berita as $br)
                    <div class="col-md-4 col-sm-6">
                        <div class="renovation">
                            <img src="{{ asset($br->foto_berita) }}" alt="" width="100%" height="200">
                            <div class="renovation_content">
                                <a class="clipboard" href="#"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
                                <a class="tittle" href="{{ route('berita.detail', [$br->id]) }}" title="{{ $br->judul_berita }}">
                                    {!! substr($br->judul_berita, 0, 35) . '...' !!}
                                </a>
                                <div class="date_comment">
                                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ tanggal_indo($br->tanggal_publish) }}
                                    </a>
                                    <!-- <a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i>3</a> -->
                                </div>
                                <p>{!! strip_tags(substr($br->isi_berita, 0, 125)) . '...' !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
           </div>
        </div>
    </section>
    <!-- End Berita -->

@endsection    