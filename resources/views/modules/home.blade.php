@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Beranda
@endsection

@section('content')
    
    <!-- Slider area -->
    <section class="slider_area row m0">
        <div class="slider_inner">
            <div data-thumb="{{ asset('upload/slider/banner_1.png') }}" data-src="{{ asset('upload/slider/banner_1.png') }}">
                <!-- <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated">Welcome to our</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">CLEAN, MODERN, MULTIPURPOSE THEME</h3>
                        <p class=" wow fadeInUp animated" data-wow-delay="0.8s">Our team of professionals will help you turn your dream home or flat into a reality fast. The Love Boat promises something for everyone. Now the world don't move to the beat of just one</p>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#">Read More</a>
                   </div>
                </div> -->
            </div>
            <div data-thumb="{{ asset('upload/slider/banner_1.png') }}" data-src="{{ asset('upload/slider/banner_1.png') }}">
                <!-- <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated">Welcome to our</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">CLEAN ,MODERN, MULTIPURPOSE THEME</h3>
                        <p class=" wow fadeInUp animated" data-wow-delay="0.8s">Our team of professionals will help you turn your dream home or flat into a reality fast. The Love Boat promises something for everyone. Now the world don't move to the beat of just one</p>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#">Read More</a>
                   </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- End Slider area -->

    <!-- Professional Builde -->
    <section class="professional_builder row">
        <div class="container">
           <div class="row builder_all">
                <div class="col-md-3 col-sm-6 builder">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <h4>Professional Builde</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                </div>
                <div class="col-md-3 col-sm-6 builder">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <h4>We Deliver Quality</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                </div>
                <div class="col-md-3 col-sm-6 builder">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <h4>Always On Time</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                </div>
                <div class="col-md-3 col-sm-6 builder">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4>We Are Pasionate</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                </div>
           </div>
        </div>
    </section>
    <!-- End Professional Builde -->

    <!-- About Us Area -->
    <section class="about_us_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>DINAS PERUMAHAN DAN KAWASAN PEMUKIMAN KUTAI TIMUR</h2>
                <h4>Beranda</h4>
            </div>
            <div class="row about_row">
                <div class="who_we_area col-md-7 col-sm-6">
                    <div class="subtittle">
                        <h2>SAMBUTAN</h2>
                    </div>
                    <p>
                        @foreach($sambutan as $sbtn)
                            {!! $sbtn->isi_sambutan !!}
                        @endforeach
                    </p>
                    <!-- <a href="#" class="button_all">Contact Now</a> -->
                </div>
                <div class="col-md-5 col-sm-6 about_client">
                    <img src="{{ asset('assets_frontend/images/bupati.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Area -->

    <!-- What ew offer Area -->
    <section class="what_we_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>TAUTAN TERKAIT</h2>
            </div>
            <div class="row construction_iner">
                <div class="col-md-3 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{ asset('assets_frontend/images/link.jpg') }}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <a href="http://lpse.kutaitimurkab.go.id/" target="_blank">LPSE KUTAI TIMUR</a>
                        <p>Layanan Pengadaan Secara Elektronik (LPSE)</p><br>
                   </div>
                </div>
                <div class="col-md-3 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{ asset('assets_frontend/images/link.jpg') }}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <a href="https://www.pu.go.id/" target="_blank">PU-net</a>
                        <p>Kementrian Pekerjaan Umum dan Perumahan Rakyat Republik Indonesia </p>
                   </div>
                </div>
                <div class="col-md-3 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{ asset('assets_frontend/images/link.jpg') }}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <a href="https://sirup.lkpp.go.id/sirup" target="_blank">SIRUP</a>
                        <p>Lembaga Kebijakan Pengadaan Barang/Jasa Pemerintah</p><br>
                   </div>
                </div>
                <div class="col-md-3 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{ asset('assets_frontend/images/link.jpg') }}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <a href="http://www.kutaitimurkab.go.id/" target="_blank">PEMERINTAH KUTIM</a>
                        <p>Link Pemerintahan Kutai Timur Kalimantan Timur</p><br>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End What ew offer Area -->

    <!-- Our Achievments Area -->
    <section class="our_achievments_area" data-stellar-background-ratio="0.3">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Informasi</h2>
                <h4>Dinas Perumahan dan Kawasan Pemukiman Kabupaten Kutai Timur</h4>
            </div>
            <div class="achievments_row row">
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-connectdevelop" aria-hidden="true"></i>
                    <span class="counter">{{ count($berita) }}</span>
                    <h6>BERITA</h6>
                </div>
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span class="counter">{{ count($artikel) }}</span>
                    <h6>ARTIKEL</h6>
                </div>
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-child" aria-hidden="true"></i>
                    <span class="counter">{{ count($agenda) }}</span>
                    <h6>AGENDA</h6>
                </div>
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span class="counter">{{ count($pengumuman) }}</span>
                    <h6>PENGUMUMAN</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Achievments Area -->

@endsection