@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Visi & Misi
@endsection

@section('content')
    
	<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Visi dan Misi</h2>
        <ol class="breadcrumb">
            <li><a href="">Informasi</a></li>
            <li><a href="" class="active">Visi dan Misi</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Visi & Misi -->
    <section class="building_construction_area">
        <div class="container">
            <div class="row building_construction_row">
                <div class="col-sm-8 constructing_laft">
                    <h2>Visi dan Misi</h2>
                    <p>
                        @foreach($visi_misi as $vm)
                            <!-- Visi -->
                            {!! $vm->visi !!}

                            <!-- Misi -->
                            {!! $vm->misi !!}
                        @endforeach
                    </p>
                </div>
                
                @include('includes.sidebar_menu_profil')

            </div>
        </div>
    </section>
    <!-- End Visi & Misi -->

@endsection