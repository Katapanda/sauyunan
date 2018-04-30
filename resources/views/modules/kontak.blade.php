@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
	Kontak
@endsection

@section('content')
    
    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>Kontak</h2>
        <ol class="breadcrumb">
            <li><a href="">Beranda</a></li>
            <li><a href="" class="active">Kontak</a></li>
        </ol>
    </section>
    <!-- End Banner area -->
    
    <!-- Map -->
    <div class="contact_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.645332652287!2d117.60221101475335!3d0.5335439996107466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x320bb4d33a793b29%3A0xfaf84aa794bc5862!2sDinas+Perumahan+dan+Kawasan+Permukiman!5e0!3m2!1sid!2sid!4v1524366352906" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <!-- End Map -->

    <!-- Halaman Kontak -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Informasi Kontak</h2>
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location">Lokasi</a>
                            <a>Telp</a>
                            <a>Fax</a>
                            <a>Email</a>
                        </div>
                        <div class="address">
                            @foreach($kontak as $kon)
                                <a>{{ $kon->lokasi }}</a>
                                <a>{{ $kon->telepon }}</a>
                                <a>{{ $kon->fax }}</a>
                                <a>{{ $kon->email }}</a>
                            @endforeach    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Kirim Pesan</h2>
                    <form class="form-inline contact_box">
                        <input type="text" class="form-control input_box" placeholder="Nama Lengkap *">
                        <input type="text" class="form-control input_box" placeholder="Email *">
                        <input type="text" class="form-control input_box" placeholder="Subjek">
                        <textarea class="form-control input_box" placeholder="Pesan"></textarea>
                        <button type="submit" class="btn btn-default">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Halaman Kontak -->

@endsection