@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
    Pengumuman
@endsection

@section('content')
    
    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Pengumuman</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="" class="active">Pengumuman</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Pengumuman -->
    <section class="our_feature_area">
        <div class="container">
            <div class="feature_row row">
                <div class="col-md-6 feature_img">
                    <img src="{{ asset('assets_frontend/images/bupati.png') }}" alt="">
                </div>
                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                        <h2>Pengumuman</h2>
                        <h5>Dinas Perumahan dan Kawasan Pemukiman Kabupaten Kutai Timur</h5>
                    </div>
                    @foreach($pengumuman as $pgm)
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <i class="fa fa-rocket" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="{{ route('pengumuman.detail', [$pgm->id]) }}">{{ $pgm->judul_pengumuman }}</a>
                                <p>{{ tanggal_indo($pgm->tanggal_publish) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Pengumuman -->

@endsection