@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Foto
@endsection

@section('content')
    
	<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Foto</h2>
        <ol class="breadcrumb">
            <li><a href="">Galeri</a></li>
            <li><a href="" class="active">Foto</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Foto -->
    <section class="featured_works row" data-stellar-background-ratio="0.3">
        <div class="featured_gallery">
            @foreach($foto as $ft) 
                <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                    <img src="{{ asset($ft->foto) }}" alt="" width="100%" height="200px">
                    <div class="gallery_hover">
                        <h4></h4>
                        <a href="#">Perbesar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Foto -->

@endsection