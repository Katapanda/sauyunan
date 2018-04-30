<!-- Footer --> 
<footer class="footer_area">
    <div class="container">
        <div class="footer_row row">
            <div class="col-md-12 col-sm-12 footer_about text-center">
                <h2>Dinas Perumahan dan Kawasan Pemukiman Kabupaten Kutai Timur</h2>
                <address>
                    <ul class="my_address">
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>
                            @foreach($kontak as $kon) {{ $kon->email }}  @endforeach
                        </a></li>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>
                            @foreach($kontak as $kon) {{ $kon->telepon }}  @endforeach
                        </a></li>
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            @foreach($kontak as $kon) {{ $kon->lokasi }}  @endforeach
                        </a></li>
                    </ul>
                </address>
            </div>
        </div>
    </div>
    <div class="copyright_area">
        Dinas Perumahan dan Kawasan Pemukiman Kabupaten Kutai Timur 2018</a>
    </div>
</footer>
<!-- End Footer --> 