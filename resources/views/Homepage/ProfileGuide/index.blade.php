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

        .checked {
            color: orange;
        }

        .cards {
            border: #f2f2f2 solid 1px;
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
            border: #f2f2f2 solid 1px;
        }

        .footer-card p {
            margin: 0;
        }

        .footer-card a {
            color: #333;
            text-decoration: none;
        }

        @media only screen and (max-width: 600px) {
            .loker {
                margin-top: 15px;
            }

            .title {
                margin-top: 23%
            }

            .image {
                margin-top: -20%;
                max-width: 250px;
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
        }
    </style>
@endsection

@section('content')
    <div class="untree_co-section mt-5">
        <div class="container">
            <div>
                &nbsp;
                <div class="text-center">
                    &nbsp;
                    &nbsp;
                    <h2 style="color: #fd7e14 ">
                        {{ GoogleTranslate::trans('Profil Pemandu Wisata', session()->get('language') ?? 'id') }}</h2>
                </div>
            </div>
            &nbsp;
            <hr>
            &nbsp;
            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <div>
                        <div class="row gutter-v2 gallery">
                            <div class="col-4">
                                <a href="#" class="gal-item" data-fancybox="gal">
                                    <img src="{{ asset($data->logo) }} " alt="Image" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div> <!-- END .custom-block -->
                    <div>
                        <h4>
                            <i class="fas fa-map-marker-alt" style="font-size: 100%; margin-top: -50px"></i>
                            {{ $data->alamat }}
                        </h4>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div>
                        <h3 style="color: #fd7e14 ">
                            {{ GoogleTranslate::trans('Profile Tour Guide', session()->get('language') ?? 'id') }} </h3>
                    </div>
                    <div>
                        <h4>
                            <i class="fas fa-graduation-cap" style="font-size: 100%; margin-top: -50px"></i>
                            {{ $data->nama_pengelola_wisata }}
                        </h4>
                    </div>
                    <div>
                        <h4>
                            <i class="fas fa-graduation-cap" style="font-size: 100%; margin-top: -50px"></i>
                            {{ $data->kontak }}
                        </h4>
                    </div>
                    <div>
                        <span
                            style="font-size: 20px">{{ GoogleTranslate::trans('Rating', session()->get('language') ?? 'id') }}</span>
                        <span class="fa fa-star checked" style="font-size:20px;"></span>
                        <span class="fa fa-star checked" style="font-size:20px;"></span>
                        <span class="fa fa-star checked" style="font-size:20px;"></span>
                        <span class="fa fa-star" style="font-size:20px;"></span>
                        <span class="fa fa-star" style="font-size:20px;"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <h3 style="color: #fd7e14 ">
                            {{ GoogleTranslate::trans('Deskripsi', session()->get('language') ?? 'id') }}</h3>
                        <h5> {!! GoogleTranslate::trans($data->about, session()->get('language') ?? 'id') !!} </h5>
                    </div>
                </div>
                &nbsp;
            </div>
            <hr>
        </div>

        <div class="container">
            <div class="row loker">
                @forelse ($paket as $value)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-lg-4">
                        <a href="{{ route('detailpaketwisata', $value->nama_paket_wisata) }}">
                            <div class="cards">
                                <div class="header">
                                    <img src="{{ asset($value->foto1) }}" alt="Image" class="img-fluid"
                                        style="width: 100%; height:150px; border-radius: 0">
                                </div>
                                <div class="content">
                                    <p style="font-size:15px; text-transform:uppercase; text-align:center; height: 50px">
                                        <b>{{ GoogleTranslate::trans($value->nama_paket_wisata, session()->get('language') ?? 'id') }}</b>
                                    </p>
                                    <p style="font-size:15px; text-transform:uppercase; text-align:center">
                                        <b>Rp. {{ number_format($value->harga) }}</b>
                                    </p>
                                    <p style="font-size:15px; text-transform:uppercase; text-align:center; height: 60px">
                                        <b>{{ GoogleTranslate::trans($value->jenis_paket_wisata, session()->get('language') ?? 'id') }}
                                            -
                                            {{ GoogleTranslate::trans($value->harga_satuan_paket, session()->get('language') ?? 'id') }}</b>
                                    </p>
                                    <p style="text-align: center;">
                                        {!! \Illuminate\Support\Str::limit(
                                            GoogleTranslate::trans($value->deskripsi, session()->get('language') ?? 'id'),
                                            85,
                                            $end = '...',
                                        ) !!}
                                    </p>
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
                                            <div class="col-md-4">
                                                <img src="{{ asset($value->pengelolawisata['logo']) }}" alt="Image"
                                                    class="img-fluid"
                                                    style="width: 60px; height: 60px; border: solid 1px #000; border-radius: 50%;">
                                            </div>
                                            <div class="col-md-8">
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
                                                    {{ GoogleTranslate::trans('Ulasan', session()->get('language') ?? 'id') }}
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
                        <i><b>{{ GoogleTranslate::trans('Paket wisata tidak ditemukan!', session()->get('language') ?? 'id') }}</b></i>
                    </div>
                @endforelse
            </div>
            <div class="center" style="text-transform: uppercase; color:rgb(35, 26, 14)">
                {{-- {{ $paketwisata->links() }} --}}
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets') }}/backend/assets/js/select2.min.js"></script>
    <script>
        $('#select2').select2({
            theme: "bootstrap4"
        });
        $('#select2-1').select2({
            theme: "bootstrap4"
        });
        $('#select2-2').select2({
            theme: "bootstrap4"
        });
    </script>
@endpush
