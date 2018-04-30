@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Video
@endsection

@section('content')
    
	<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Video</h2>
        <ol class="breadcrumb">
            <li><a href="">Beranda</a></li>
            <li><a href="" class="active">Video</a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Video -->
    <section class="blog_tow_area">
        <div class="container">
           <div class="row blog_tow_row">
                @foreach($video as $vd)
                    <div class="col-md-4 col-sm-6">
                        <div class="renovation">
                            <iframe width="100%" height="200"
                            src="{!! $vd->link_video !!}" allowfullscreen>
                            </iframe>
                            <div class="renovation_content">
                                <a class="clipboard" href="#"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                <a class="tittle">{!! substr($vd->nama_kegiatan, 0, 35) . '...' !!}</a>
                                <p>{!! substr($vd->keterangan, 0, 75) . '...' !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
           </div>
        </div>
    </section>
    <!-- End Video -->

@endsection