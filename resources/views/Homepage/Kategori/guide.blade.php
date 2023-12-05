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

        p {
            text-align: center;
        }

        .kategori1 {
            margin-top: 6%;
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
                color: #fff;
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
                        Tour Guide
                    </h2>
                </div>
            </div>
            <div class="row loker">
                @forelse ($pengelola as $value)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4">
                        <a href="{{ route('profileGuide', $value->nama_pengelola_wisata) }}">
                            <div class="cards">
                                <div class="header">
                                    @if ($value->logo == null)
                                        <img src="{{ asset('assets') }}/frontend/images/noimage.png" alt="Image"
                                            class="image1">
                                    @else
                                        <img src="{{ asset($value->logo) }}" alt="Image" class="image1">
                                    @endif
                                </div>
                                <div class="content">
                                    <p style="font-size:15px; text-transform:uppercase; text-align:center; height: 40px">
                                        <b>{{ $value->nama_pengelola_wisata }}</b>
                                    </p>
                                    &nbsp;
                                    @php
                                        $ratings = App\Ratting::with('customer')
                                            ->where('pengelola_id', $value->id)
                                            ->get();
                                        $ulasan = $ratings->count();
                                        if ($ulasan == 0) {
                                            $meanRating = 0;
                                        } else {
                                            $meanRating = $ratings->sum('rating') / $ulasan;
                                        }
                                    @endphp
                                    <b>
                                        <div class="text-center">
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
                                        <div class="text-center">
                                            {{ GoogleTranslate::trans('Ulasan', session()->get('language') ?? 'id') }}
                                            (<strong>{{ $ulasan }}</strong>)
                                        </div>
                                    </b>
                                    <div style="text-align: center; height: 70px">
                                        @if ($value->about == null)
                                            {{ GoogleTranslate::trans('Notyet Set', session()->get('language') ?? 'id') }}
                                        @else
                                            {!! \Illuminate\Support\Str::limit(
                                                GoogleTranslate::trans($value->about, session()->get('language') ?? 'id'),
                                                85,
                                                $end = '...',
                                            ) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 text-center">
                        <i><b>{{ GoogleTranslate::trans('Pemandu Wisata tidak ditemukan!', session()->get('language') ?? 'id') }}</b></i>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
