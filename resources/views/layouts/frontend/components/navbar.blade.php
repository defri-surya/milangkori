<nav class="site-nav">
    <div class="container">
        <div class="site-navigation lang">
            <a href="{{ route('welcome') }}" class="logo m-0"><img
                    src="{{ asset('assets') }}/frontend/images/milangkori_wht.png" alt="" style="max-width: 200px">
            </a>
            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                @if (auth()->user() != null)
                    @php
                        $customer = App\Customer::where('user_id', auth()->user()->id)->first();
                        $cartList = App\Bookingpaket::with('user', 'paketWisata')
                            ->where('user_id', auth()->user()->id)
                            ->where('status', 'Keranjang')
                            ->count();
                    @endphp
                    @can('isCustomer')
                        {{-- <li><a href="{{ route('halamanpaket') }}">Paket Wisata</a></li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listkeranjangbelanja') }}">
                                <i class="fas fa-cart-plus badge-notif" data-badge={{ $cartList }}></i>
                            </a>
                        </li>
                    @endcan
                @else
                    @if (auth()->user() != null)
                        <li>
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets') }}/frontend/images/icons8-user-64.png" alt="">
                            </a>
                        </li>
                    @endif
                    @if (auth()->user() == null)
                        {{-- <li><a href="{{ route('register.pengelolawisata') }}">Paket Wisata</a></li> --}}
                        <li>
                            <a class="btn btn-outline-white btn-md font-weight-bold login" href="{{ route('login') }}">
                                {{ GoogleTranslate::trans('Sign In Or Sign Up', session()->get('language') ?? 'id') }}
                            </a>
                        </li>
                    @endif
                @endif
                <li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="nav-item">
                        @if (auth()->user() != null)
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets') }}/frontend/images/icons8-user-64.png" alt="">
                            </a>
                        @endif
                        {{-- @if (auth()->user() == null)
                            <a class="btn btn-outline-warning btn-md font-weight-bold login"
                                style="width: 150px; color:white" href="{{ route('login') }}">
                                Sign In / Sign Up
                            </a>
                        @endif --}}
                    </span>
                </li>
                <li>
                    <a class="btn btn-outline-white btn-md font-weight-bold login" href="#popup1">
                        {{ GoogleTranslate::trans('Ganti Bahasa', session()->get('language') ?? 'id') }}
                    </a>
                </li>
            </ul>
            <a href="#"
                class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
            <div id="popup1" class="overlay">
                <div class="popup">
                    <h2>{{ GoogleTranslate::trans('Choose Language', session()->get('language') ?? 'id') }}</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        <form action="{{ route('welcome') }}" id="myForm">
                            <div>
                                <select class="nav-link" name="language" onchange="submitForm()"
                                    style="border-radius: 5px; width: 100%">
                                    <option value="id" {{ session()->get('language') == 'id' ? 'selected' : '' }}>
                                        Indonesia
                                    </option>
                                    <option value="en" {{ session()->get('language') == 'en' ? 'selected' : '' }}>
                                        English
                                    </option>
                                    <option value="zh-CN"
                                        {{ session()->get('language') == 'zh-CN' ? 'selected' : '' }}>
                                        Chinese
                                    </option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
