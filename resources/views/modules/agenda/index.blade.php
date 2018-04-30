@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Agenda
@endsection

@section('content')
    
    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Agenda</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="" class="active">Agenda</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

	<!-- Agenda -->
    <<section class="our_feature_area">
        <div class="container">
            <div class="feature_row row">
                <div class="col-md-6 feature_img">
                    <img src="{{ asset('assets_frontend/images/bupati.png') }}" alt="">
                </div>
                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                        <h2>Agenda</h2>
                        <h5>Dinas Perumahan dan Kawasan Pemukiman Kabupaten Kutai Timur</h5>
                    </div>
                    @foreach($agenda as $ag)
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <i class="fa fa-rocket" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="{{ route('agenda.detail', [$ag->id]) }}">{{ $ag->nama_kegiatan }}</a>
                                <p>{{ tanggal_indo($ag->tanggal) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Agenda -->

@endsection