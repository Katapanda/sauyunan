<div class="col-lg-4 col-md-12" style="background-color: #BFB35A;">
    <div class="more-top">
        <h4>KEPALA DINAS</h4>
    </div>
    <div class="add-widget text-center">
        <div class="card" style="width: 20rem; background-color: #EBE18C">
            <h6 class="card-header">Foto Kepala Dinas</h6>
            <a href=""><img src="{{ asset('upload/foto_struktur_organisasi/10112378.JPG') }}" alt="" class="img-fluid" width="50%" height="300px"></a><br/>
            <p class="card-text"><h6>Julio Febryanto S.Kom</h6></p><br/>
        </div>    
    </div>

    <div class="login-widget">
        <h4>FOTO</h4>
        <div class="card" style="width: 20rem; background-color: #EBE18C">
            @if(count($videos) > 0)
                @foreach($videos as $video)
                   <img src="{{ asset('upload/foto_berita/jemaah-umrah-indonesia-kini-tak-bisa-transit-ke-banyak-negara.jpg') }}" alt="" class="card-img-top img-responsive" width="260px" height="169px">
                    </div>
                @endforeach

                <div class="card-footer text-center">
                    <a href="{{ route('foto') }}" class="btn btn-default btn-sm">Lihat Selengkapnya</a>
                </div>

            @else
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                </div>
                <div class="card-footer text-center">
                    <p class="btn btn-default btn-sm text-danger">Tidak ada Foto</p>
                </div>
            @endif    

        </div>
    </div>
    <div class="tag-widget">
        <h4>VIDEO</h4>
        <div class="card" style="width: 20rem; background-color: #EBE18C">
            @if(count($videos) > 0)
                @foreach($videos as $video)
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{!! $video->link_video !!}" allowfullscreen></iframe>
                    </div>
                @endforeach

                <div class="card-footer text-center">
                    <a href="{{ route('video') }}" class="btn btn-default btn-sm">Lihat Selengkapnya</a>
                </div>

            @else
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                </div>
                <div class="card-footer text-center">
                    <p class="btn btn-default btn-sm text-danger">Tidak ada Video</p>
                </div>
            @endif    
            
        </div>
    </div>
    <div class="tag-widget">
        <h4>TAG LIST</h4>
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="{{ route('berita') }}">Berita</a></li>
            <li class="list-inline-item"><a href="{{ route('artikel') }}">Artikel</a></li>
            <li class="list-inline-item"><a href="{{ route('agenda') }}">Agenda</a></li>
            <li class="list-inline-item"><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
            <li class="list-inline-item"><a href="{{ route('foto') }}">Foto</a></li>
            <li class="list-inline-item"><a href="{{ route('video') }}">Video</a></li>
            <li class="list-inline-item"><a href="{{ route('peta') }}">Peta</a></li>
            <li class="list-inline-item"><a href="{{ route('kontak') }}">Kontak</a></li>
            <li class="list-inline-item"><a href="{{ route('sejarah') }}">Sejarah</a></li>
            <li class="list-inline-item"><a href="{{ route('struktur_organisasi') }}">Struktur Organisasi</a></li>
            <li class="list-inline-item"><a href="{{ route('tupoksi') }}">Tupoksi</a></li>
            <li class="list-inline-item"><a href="{{ route('visi_misi') }}">Visi & Misi</a></li>
        </ul>
    </div>
</div>