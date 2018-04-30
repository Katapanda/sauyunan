<!-- Top Header_Area -->
<section class="top_header_area">
    <div class="container">
        <ul class="nav navbar-nav top_nav">
            <li><a href=""><i class="fa fa-phone"></i>
                @foreach($kontak as $kon) {{ $kon->telepon }}  @endforeach
            </a></li>
            <li><a href=""><i class="fa fa-envelope-o"></i>@foreach($kontak as $kon) {{ $kon->email }}  @endforeach</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right social_nav">
            <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</section>
<!-- End Top Header_Area -->