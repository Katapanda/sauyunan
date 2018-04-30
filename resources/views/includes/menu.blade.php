<!-- Header_Area -->
<nav class="navbar navbar-default header_aera" id="main_navbar">
    <div class="container">
        <!-- searchForm -->
        <div class="searchForm">
            <form action="#" class="row m0">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="search" name="search" class="form-control" placeholder="Pencarian ...">
                    <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                </div>
            </form>
        </div><!-- End searchForm -->
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-md-2 p0">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('beranda') }}"><img src="{{ asset('assets_frontend/images/logo.png') }}" alt=""></a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="collapse navbar-collapse">
                <div style="margin-left: -200px; margin-top: -20px" class="nav navbar-nav navbar-left">
                    <a class="navbar-brand" href="{{ route('beranda') }}"><img src="{{ asset('assets_frontend/images/nama_dinas.png') }}" alt="" width="700px" ></a>
                </div>
            </div>
        </div>        

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-6 p0">
            <div class="collapse navbar-collapse" id="min_navbar">
                <!-- <div style="margin-left: -100px;" class="nav navbar-nav navbar-left">
                    <a class="navbar-brand" href="{{ route('beranda') }}"><img src="{{ asset('assets_frontend/images/nama_dinas.png') }}" alt="" class="img-responsive"></a>
                </div> -->
                
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="dropdown submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil</a>
                        <ul class="dropdown-menu other_dropdwn">
                            <li><a href="{{ route('dasar-hukum') }}">Dasar Hukum</a></li>
                            <li><a href="{{ route('struktur-organisasi') }}">Struktur Organisasi</a></li>
                            <li><a href="{{ route('tugas-pokok-dan-fungsi') }}">Tugas Pokok dan Fungsi</a></li>
                            <li><a href="{{ route('visi-misi') }}">Visi dan Misi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informasi</a>
                        <ul class="dropdown-menu other_dropdwn">
                            <li><a href="{{ route('agenda') }}">Agenda</a></li>
                            <li><a href="{{ route('artikel') }}">Artikel</a></li>
                            <li><a href="{{ route('berita') }}">Berita</a></li>
                            <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                        </ul>
                    </li>
                    <li class="dropdown submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Galeri</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('foto') }}">Foto</a></li>
                            <li><a href="{{ route('video') }}">Video</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                    <li><a href="#" class="nav_searchFrom"><i class="fa fa-search"></i></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container -->
</nav>
<!-- End Header_Area -->