<!-- Side-Nav-->
<aside class="main-sidebar hidden-print " >
  <section class="sidebar" id="sidebar-scroll">
    
    <div class="user-panel">
      <div class="f-left image"><img class="img-fluid able-logo" src="{{ asset('assets_frontend/images/logo.png') }}" alt="Theme-logo" style="height: 100%"> 
      </div>
      <div class="f-left info">
        <p style="font-size: 12px">DINAS PERUMAHAN DAN <br>KAWASAN PEMUKIMAN</p>
        <p class="designation" style="font-size: 9px">KABUPATEN KUTAI TIMUR <i class="icofont icofont-caret-down m-l-5"></i></p>
      </div>
    </div>
    <!-- sidebar profile Menu-->
    <ul class="nav sidebar-menu extra-profile-list">
      <li>
        <a class="waves-effect waves-dark" href="profile.html">
          <i class="icon-user"></i>
          <span class="menu-text">View Profile</span>
          <span class="selected"></span>
        </a>
      </li>
      <li>
        <a class="waves-effect waves-dark" href="javascript:void(0)">
          <i class="icon-logout"></i>
          <span class="menu-text">Logout</span>
          <span class="selected"></span>
        </a>
      </li>
    </ul>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="treeview {{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('dashboard') }}">
          <i class="icon-speedometer"></i><span> Beranda</span>
        </a>
      </li>
      {{-- <li class="treeview {{ (\Request::route()->getName() == 'user_role.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('user_role.index') }}">
          <i class="icon-list"></i><span> User Role</span>
        </a>
      </li> --}}


      <li class="nav-level">Profile</li>
      <li class="treeview {{ (\Request::route()->getName() == 'dasar_hukum.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('dasar_hukum.index') }}">
          <i class="icon-list"></i><span> Dasar Hukum</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'so.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('so.index') }}">
          <i class="icon-list"></i><span> Struktur Organisasi</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'tupoksi.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('tupoksi.index') }}">
          <i class="icon-user"></i><span> Tupoksi</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'visimisi.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('visimisi.index') }}">
          <i class="icon-list"></i><span> Visi & Misi</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'sejarah.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('sejarah.index') }}">
          <i class="icon-user"></i><span> Sejarah</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'gambaranumum.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('gambaranumum.index') }}">
          <i class="icon-user"></i><span> Gambaran Umum</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'sambutan.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('sambutan.index') }}">
          <i class="icon-user"></i><span> Sambutan</span>
        </a>
      </li>

      <li class="nav-level">Galery</li>
      <li class="treeview {{ (\Request::route()->getName() == 'album.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('album.index') }}">
          <i class="icon-list"></i><span> Album</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'video.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('video.index') }}">
          <i class="icon-list"></i><span> Video</span>
        </a>
      </li>
      <li class="nav-level">Menu Lain</li>
      <li class="treeview {{ (\Request::route()->getName() == 'agenda.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('agenda.index') }}">
          <i class="icon-list"></i><span> Agenda</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'artikel.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('artikel.index') }}">
          <i class="icon-list"></i><span> Artikel</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'kategori.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('kategori.index') }}">
          <i class="icon-list"></i><span> Kategori Berita</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'kontak.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('kontak.index') }}">
          <i class="icon-list"></i><span> Kontak</span>
        </a>
      </li>
      <li class="treeview {{ (\Request::route()->getName() == 'berita.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('berita.index') }}">
          <i class="icon-list"></i><span> Berita</span>
        </a>
      </li>

      {{-- <li class="treeview {{ (\Request::route()->getName() == 'user.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('user.index') }}">
          <i class="icon-user"></i><span> User Account</span>
        </a>
      </li> --}}
      <li class="treeview {{ (\Request::route()->getName() == 'programkerja.index') ? 'active' : '' }}">
        <a class="waves-effect waves-dark" href="{{ route('programkerja.index') }}">
          <i class="icon-user"></i><span> Program Kerja</span>
        </a>
      </li>
    </ul>
  </li>
</ul>
</section>
</aside>