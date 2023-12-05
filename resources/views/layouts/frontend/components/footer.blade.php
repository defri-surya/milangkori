<div class="site-footer">
    <div class="inner first">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="widget">
                        <h3 class="heading"><img src="{{ asset('assets') }}/frontend/images/milangkori_wht_milang.png"
                                alt="" style="max-width: 250px"></h3>
                    </div>
                    <div class="widget">
                        <ul class="list-unstyled other">
                            <li><a
                                    href="{{ route('tentangkami') }}">{{ GoogleTranslate::trans('Tentang Kami', session()->get('language') ?? 'id') }}</a>
                            </li>
                            <li><a
                                    href="{{ route('artikelwisata') }}">{{ GoogleTranslate::trans('Artikel Wisata', session()->get('language') ?? 'id') }}</a>
                            </li>
                            <li><a
                                    href="{{ route('kerjasama') }}">{{ GoogleTranslate::trans('Kerjasama', session()->get('language') ?? 'id') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget">
                        <h3 class="heading">
                            {{ GoogleTranslate::trans('Kontak Kami', session()->get('language') ?? 'id') }}</h3>
                        <ul class="list-unstyled quick-info">
                            <li><i class="fas fa-envelope" style="color: black"></i> &nbsp; <a
                                    href="mailto:sentrakerja.id@gmail.com">ptkalacitranuswantara@gmail.com</a>
                            </li>
                            <li><i class="fas fa-phone" style="color: black"></i> &nbsp; <a
                                    href="https://wa.me/0895600555588" target="_blank">+62895600555588 </a></li>
                            <li><i class="fas fa-map-marker-alt" style="color: black"></i> &nbsp; <a
                                    href="#">Banguntapan, Bantul</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget">
                        <h3 class="heading">
                            {{ GoogleTranslate::trans('Terhubung dengan kami', session()->get('language') ?? 'id') }}
                        </h3>
                        <ul class="list-unstyled social">
                            <li><a href="https://www.youtube.com/@nuswatrip1498" target="__blank"><span
                                        class="icon-youtube"></span></a></li>
                            <li><a href="https://www.instagram.com" target="__blank"><span
                                        class="icon-instagram"></span></a></li>
                            <li><a href="https://www.facebook.com" target="__blank"><span
                                        class="icon-facebook"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div style="font-size: 14px">
                        <h3 class="heading" style="font-size: 14px;color:black">
                            {{ GoogleTranslate::trans('Support By', session()->get('language') ?? 'id') }}</h3>
                        <ul class="list-unstyled social">
                            <li><img src="{{ asset('front') }}/images/komunitas.png"
                                    alt="Lintas Komunitas Peduli Wisata" title="Lintas Komunitas Peduli Wisata"
                                    style="max-width: 60px"><img
                                    src="{{ asset('assets') }}/frontend/images/nuswatrip_logo.png" alt="Nuswatrip"
                                    title="Nuswatrip" style="max-width: 80px"></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="inner dark" style="background-color:#e7c671">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-8 mb-3 mb-md-0 mx-auto" style="color:black">
                    <b>Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved &mdash; <b style="text-transform: uppercase">pt.
                            kala citra nuswantara</b>
                    </b>
                </div>
            </div>
        </div>
    </div>
</div>
