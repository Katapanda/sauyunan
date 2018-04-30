<header class="main-header-top hidden-print" >
  <a href="index.html" class="logo" style="font-size: 14px">
    DISPERKIM
  </a>
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
    <!-- Navbar Right Menu-->
    <div class="navbar-custom-menu f-right">
      <ul class="top-nav">
        <!--Notification Menu-->
        <li class="dropdown pc-rheader-submenu message-notification search-toggle" hidden>
          <a href="#!" id="morphsearch-search" class="drop icon-circle txt-white">
              <i class="icofont icofont-search-alt-1"></i>
          </a>
        </li>
        
        <!-- window screen -->
        <li class="pc-rheader-submenu">
          <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
            <i class="icon-size-fullscreen"></i>
          </a>
        </li>
        <!-- User Menu-->
        <li class="dropdown">
          <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
            <span>
              <img class="img-circle " src="{{ asset('assets/images/avatar-1.png') }}" style="width:40px;" alt="User Image">
            </span>
            <span>Irfan Rangga Gumilar <i class=" icofont icofont-simple-down"></i></span>
          </a>
          <ul class="dropdown-menu settings-menu">
            {{-- <li><a href="profile.html"><i class="icon-user"></i> Profil</a></li>
            <li><a href="message.html"><i class="icon-envelope-open"></i> Pesan</a></li> --}}
            <li class="p-0">
              <div class="dropdown-divider m-0"></div>
            </li>
            <li><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
            </li>
          </ul>
        </li>
      </ul>

      <!-- search -->
      <div id="morphsearch" class="morphsearch">
          <form class="morphsearch-form">

              <input class="morphsearch-input" type="search" placeholder="Search..."/>

              <button class="morphsearch-submit" type="submit">Search</button>

          </form>
          <div class="morphsearch-content">
              <div class="dummy-column">
                  <h2>People</h2>
                  <a class="dummy-media-object" href="#!">
                      <img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan"/>
                      <h3>Sara Soueidan</h3>
                  </a>

                  <a class="dummy-media-object" href="#!">
                      <img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G" alt="Shaun Dona"/>
                      <h3>Shaun Dona</h3>
                  </a>
              </div>
              <div class="dummy-column">
                  <h2>Popular</h2>
                  <a class="dummy-media-object" href="#!">
                      <img src="{{ asset('assets/images/avatar-1.png') }}" alt="PagePreloadingEffect"/>
                      <h3>Page Preloading Effect</h3>
                  </a>

                  <a class="dummy-media-object" href="#!">
                      <img src="{{ asset('assets/images/avatar-1.png') }}" alt="DraggableDualViewSlideshow"/>
                      <h3>Draggable Dual-View Slideshow</h3>
                  </a>
              </div>
              <div class="dummy-column">
                  <h2>Recent</h2>
                  <a class="dummy-media-object" href="#!">
                      <img src="{{ asset('assets/images/avatar-1.png') }}" alt="TooltipStylesInspiration"/>
                      <h3>Tooltip Styles Inspiration</h3>
                  </a>
                  <a class="dummy-media-object" href="#!">
                      <img src="{{ asset('assets/images/avatar-1.png') }}" alt="NotificationStyles"/>
                      <h3>Notification Styles Inspiration</h3>
                  </a>
              </div>
          </div><!-- /morphsearch-content -->
          <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
      </div>
      <!-- search end -->
    </div>
  </nav>
</header>