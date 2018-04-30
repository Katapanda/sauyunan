@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Tupoksi
@endsection

@section('content')
    
	<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Tugas Pokok dan Fungsi</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="" class="active">Tugas Pokok dan Fungsi</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Tupoksi -->
    <section class="building_construction_area">
        <div class="container">
            <div class="row building_construction_row">
                <div class="col-sm-8 constructing_laft">
                    <h2>Tugas Pokok dan Fungsi</h2>
                    <p>
                        @foreach($tupoksi as $tp)
                            {!! $tp->isi_tupoksi !!}
                        @endforeach
                    </p>
                </div>
                
                @include('includes.sidebar_menu_profil')

            </div>
        </div>
    </section>
    <!-- End Tupoksi -->

@endsection