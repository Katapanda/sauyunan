@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Dasar Hukum
@endsection

@section('content')
    
	<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Dasar Hukum</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="" class="active">Dasar Hukum</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Dasar Hukum -->
    <section class="building_construction_area">
        <div class="container">
            <div class="row building_construction_row">
                <div class="col-sm-8 constructing_laft">
                    <h2>Dasar Hukum</h2>
                    <p>
                        @foreach($dasar_hukum as $dh)
                            {!! $dh->isi_dasar_hukum !!}
                        @endforeach
                    </p>
                </div>
                
                @include('includes.sidebar_menu_profil')

            </div>
        </div>
    </section>
    <!-- End Dasar Hukum -->

@endsection