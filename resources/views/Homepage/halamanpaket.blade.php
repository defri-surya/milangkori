@extends('layouts.frontend.main')
@section('css')
    <style>
        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            flex: 1 0 100%;
        }

        .login {
            color: #fff;
        }

        .checked {
            color: orange;
        }

        .cards {
            border: #c0bfbf solid 1px;
        }

        .header {
            color: #fff;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .footer-card {
            background-color: #ffffff;
            padding: 20px;
            text-align: center;
            border: #c0bfbf solid 1px;
        }

        .footer-card p {
            margin: 0;
        }

        .footer-card a {
            color: #333;
            text-decoration: none;
        }

        .image1 {
            width: 253px;
            height: 160px;
        }

        .image2 {
            width: 60px;
            height: 60px;
            border: solid 1px #000;
            border-radius: 50%;
        }

        .kategori {
            width: 150px;
            font-weight: 700;
            font-size: 14px;
            color: #fff;
        }

        /* Pop Up */
        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 5s ease-in-out;
        }

        .popup h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .popup .close:hover {
            color: #06D85F;
        }

        .popup .content {
            max-height: 30%;
            overflow: auto;
        }

        .kategori1 {
            margin-top: 8%;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                width: 70%;
            }
        }

        @media screen and (min-width: 37em) {

            .scroll-cards__item {
                --offset: 1em;
                width: 100%;
            }
        }

        @media screen and (min-width: 62em) {
            .scroll-cards h1 {
                font-size: 3em;
            }

            .scroll-cards__item {
                --offset: 1.25em;
                width: 100%;
            }
        }

        @media only screen and (max-width: 600px) {
            .loker {
                margin-top: 15px;
            }

            .title {
                margin-top: 75%;
            }

            .image1 {
                width: 361px;
                height: 200px;
            }

            .form-search {
                margin-left: -40px;
                margin-top: -21%;
            }

            .heading {
                margin-left: 12%;
            }

            .social {
                margin-left: 12%;
            }

            .login {
                color: #000;
            }

            .kategori {
                width: 200px;
                font-weight: 700;
                font-size: 14px;
                color: #fff;
            }

            .kategori1 {
                margin-top: 20%;
            }
        }

        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');
    </style>
@endsection

@section('content')
    @include('sweetalert::alert')
    <div class="untree_co-section kategori1" style="background-color: #eee">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-1 mb-4"></div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 mb-4">
                    <form action="{{ route('viewKategori') }}" method="GET">
                        @csrf
                        <input type="hidden" name="day_trip" value="DayTrip">
                        <button type="submit" class="btn btn-primary kategori"
                            style="text-transform: uppercase; width: 100%">
                            Day Trip
                        </button>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 mb-4">
                    <form action="{{ route('viewKategori') }}" method="GET">
                        @csrf
                        <input type="hidden" name="menginap" value="Menginap">
                        <button type="submit" class="btn btn-primary kategori"
                            style="text-transform: uppercase; width: 100%">
                            Staycation
                        </button>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 mb-4">
                    <form action="{{ route('viewKategori') }}" method="GET">
                        @csrf
                        <input type="hidden" name="group" value="Group">
                        <button type="submit" class="btn btn-primary kategori"
                            style="text-transform: uppercase; width: 100%">
                            Group
                        </button>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 mb-4">
                    <form action="{{ route('viewKategori') }}" method="GET">
                        @csrf
                        <input type="hidden" name="personal" value="Personal">
                        <button type="submit" class="btn btn-primary kategori"
                            style="text-transform: uppercase; width: 100%">
                            Personal
                        </button>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 mb-4">
                    <form action="{{ route('viewKategori') }}" method="GET">
                        @csrf
                        <input type="hidden" name="guide" value="pengelolawisata">
                        <button type="submit" class="btn btn-primary kategori"
                            style="text-transform: uppercase; width: 100%">
                            Tour Guide
                        </button>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-1 mb-4"></div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title text-center mb-3">
                        {{ GoogleTranslate::trans('Kategori Paket Wisata', session()->get('language') ?? 'id') }}</h2>
                </div>
            </div>

            <div class="row loker">
                @forelse ($katagoripaketwisata as $value)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-3">
                        <a href="{{ route('kategori', $value->nama_paket) }}">
                            <div class="media-1">
                                <div class="card">
                                    <img src="{{ asset($value->foto) }}" alt="Image" class="img-fluid"
                                        style="width: 253px; height:150px; border-radius: 0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-left">
                                            <div class="mx-auto">
                                                <span style="font-size:15px; text-transform:uppercase;">
                                                    <b>
                                                        {{ $value->nama_paket }}
                                                    </b>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-lg-4 text-center">
                        <i>
                            <b>
                                {{ GoogleTranslate::trans('Kategori tidak tersedia!', session()->get('language') ?? 'id') }}
                            </b>
                        </i>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title text-center mb-3">
                        {{ GoogleTranslate::trans('Paket Wisata', session()->get('language') ?? 'id') }}</h2>
                </div>
            </div>
            <div class="row loker">
                @forelse ($paketwisata as $value)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4">
                        <a href="{{ route('detailpaketwisata', $value->slug) }}">
                            <div class="cards">
                                <div class="header">
                                    @if ($value->foto1 === null)
                                        <img src="{{ asset('assets') }}/frontend/images/noimage.png" alt="Image"
                                            class="image1">
                                    @else
                                        <img src="{{ asset($value->foto1) }}" alt="Image" class="image1">
                                    @endif
                                </div>
                                <div class="content">
                                    <p style="font-size:15px; text-transform:uppercase; text-align:center; height: 50px">
                                        <b>{{ GoogleTranslate::trans($value->nama_paket_wisata, session()->get('language') ?? 'id') }}</b>
                                    </p>
                                    <p style="font-size:15px; text-transform:uppercase; text-align:center">
                                        <b>Rp. {{ number_format($value->harga) }}</b>
                                    </p>
                                    <p style="font-size:15px; text-transform:uppercase; text-align:center; height: 60px">
                                        <b>
                                            {{ $value->jenis_paket_wisata }}
                                            -
                                            {{ $value->harga_satuan_paket }}
                                        </b>
                                    </p>
                                    <div style="text-align: center; height: 70px">
                                        @if ($value->deskripsi === null)
                                            {{ GoogleTranslate::trans('Notyet Set', session()->get('language') ?? 'id') }}
                                        @else
                                            {!! \Illuminate\Support\Str::limit(
                                                GoogleTranslate::trans($value->deskripsi, session()->get('language') ?? 'id'),
                                                85,
                                                $end = '...',
                                            ) !!}
                                        @endif
                                    </div>
                                </div>
                                <div class="footer-card text-left">
                                    @php
                                        $ratings = App\Ratting::with('customer')
                                            ->where('wisata_id', $value->id)
                                            ->get();
                                        $ulasan = $ratings->count();
                                        if ($ulasan == 0) {
                                            $meanRating = 0;
                                        } else {
                                            $meanRating = $ratings->sum('rating') / $ulasan;
                                        }
                                    @endphp
                                    <a
                                        href="{{ route('profileGuide', $value->pengelolawisata['nama_pengelola_wisata']) }}">
                                        <div class="row gutter-v2 gallery">
                                            <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                                @if ($value->pengelolawisata['logo'] == null)
                                                    <img src="{{ asset('assets') }}/frontend/images/icons8-user-64.png"
                                                        alt="Image" class="image2">
                                                @else
                                                    <img src="{{ asset($value->pengelolawisata['logo']) }}" alt="Image"
                                                        class="image2">
                                                @endif
                                            </div>
                                            <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                                                <div>
                                                    <span>
                                                        {{ $value->pengelolawisata['nama_pengelola_wisata'] }}
                                                    </span>
                                                </div> <!-- END .custom-block -->
                                                <div>
                                                    {{ GoogleTranslate::trans('Rating', session()->get('language') ?? 'id') }}
                                                    @if ($meanRating >= 4.5)
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                    @elseif ($meanRating >= 3.5)
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                    @elseif ($meanRating >= 2.5)
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                    @elseif ($meanRating >= 1.5)
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                    @elseif ($meanRating == 1)
                                                        <span class="fa fa-star checked" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                    @elseif ($meanRating == 0)
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                        <span class="fa fa-star" style="font-size:11px;"></span>
                                                    @endif
                                                </div>
                                                <div>
                                                    {{ GoogleTranslate::trans('Review', session()->get('language') ?? 'id') }}
                                                    (<strong>{{ $ulasan }}</strong>)
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-lg-4 text-center">
                        <i>
                            <b>
                                {{ GoogleTranslate::trans('Paket wisata tidak ditemukan!', session()->get('language') ?? 'id') }}
                            </b>
                        </i>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="untree_co-section mb-5">
        <div class="container d-flex justify-content-center">
            {{ $paketwisata->links() }}
        </div>
    </div>
@endsection
