@extends('layouts.frontend.main')
@section('css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets') }}/frontend/css/itenerary.css">
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

        .booking {
            position: relative;
            box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            padding: 10px;
            background: #f8f9fa;
        }

        .wrapper {
            margin: 0 auto;
        }

        .scroll-cards {
            counter-reset: card;
            position: relative;
            display: block;
        }

        .scroll-cards__item {
            --offset: 0.5em;
            color: #000;
            position: sticky;
            top: max(16vh, 10em);
            padding: 2em;
            background: #fff;
            box-shadow: 0 2px 40px rgba(0, 0, 0, 0.1);
            width: calc(100% - 5 * var(--offset));
            border-radius: 20px
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
    @include('sweetalert::alert')
    <div class="untree_co-section mt-5">
        <div class="container">
            <div>
                <div class="text-center mt-5">
                    <h2 style="color: #fd7e14 ">
                        {{ GoogleTranslate::trans('DETAIL PAKET WISATA :', session()->get('language') ?? 'id') }}</h2>
                </div>
            </div>
            <div>
                <div class="text-center">
                    <h1>{{ GoogleTranslate::trans($data->nama_paket_wisata, session()->get('language') ?? 'id') }}</h1>
                </div>
            </div>
            &nbsp;
            <hr>
            &nbsp;
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div>
                        <div class="row gutter-v2 gallery">
                            <div class="col-12">
                                @if ($data->foto1 === null)
                                    <a href="{{ asset('assets') }}/frontend/images/noimage.png" class="gal-item"
                                        data-fancybox="gal">
                                        <img src="{{ asset('assets') }}/frontend/images/noimage.png" alt="Image"
                                            class="img-fluid" style="width: 540px; height: 330px">
                                    </a>
                                @else
                                    <a href="{{ asset($data->foto1) }}" class="gal-item" data-fancybox="gal">
                                        <img src="{{ asset($data->foto1) }}" alt="Image" class="img-fluid"
                                            style="width: 540px; height: 330px">
                                    </a>
                                @endif
                            </div>
                            <div class="col-4">
                                @if ($data->foto2 === null)
                                    <a href="{{ asset('assets') }}/frontend/images/noimage.png" class="gal-item"
                                        data-fancybox="gal">
                                        <img src="{{ asset('assets') }}/frontend/images/noimage.png" alt="Image"
                                            class="img-fluid" style="width: 180px; height:100px">
                                    </a>
                                @else
                                    <a href="{{ asset($data->foto2) }}" class="gal-item" data-fancybox="gal">
                                        <img src="{{ asset($data->foto2) }}" alt="Image" class="img-fluid"
                                            style="width: 180px; height:100px">
                                    </a>
                                @endif
                            </div>
                            <div class="col-4">
                                @if ($data->foto3 === null)
                                    <a href="{{ asset('assets') }}/frontend/images/noimage.png" class="gal-item"
                                        data-fancybox="gal">
                                        <img src="{{ asset('assets') }}/frontend/images/noimage.png" alt="Image"
                                            class="img-fluid" style="width: 180px; height:100px">
                                    </a>
                                @else
                                    <a href="{{ asset($data->foto3) }}" class="gal-item" data-fancybox="gal">
                                        <img src="{{ asset($data->foto3) }}" alt="Image" class="img-fluid"
                                            style="width: 180px; height:100px">
                                    </a>
                                @endif
                            </div>
                            <div class="col-4">
                                @if ($data->foto4 === null)
                                    <a href="{{ asset('assets') }}/frontend/images/noimage.png" class="gal-item"
                                        data-fancybox="gal">
                                        <img src="{{ asset('assets') }}/frontend/images/noimage.png" alt="Image"
                                            class="img-fluid" style="width: 180px; height:100px">
                                    </a>
                                @else
                                    <a href="{{ asset($data->foto4) }}" class="gal-item" data-fancybox="gal">
                                        <img src="{{ asset($data->foto4) }}" alt="Image" class="img-fluid"
                                            style="width: 180px; height:100px">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- END .custom-block -->
                    &nbsp;
                    &nbsp;
                    <hr>
                    &nbsp;
                    &nbsp;
                    <div>
                        <iframe width="540" height="315" src="{{ $new_url }}" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                    &nbsp;
                    &nbsp;
                    <hr>
                    <div>
                        <h3 style="color: #fd7e14 ">
                            {{ GoogleTranslate::trans('Pengelola Paket Wisata', session()->get('language') ?? 'id') }}</h3>
                        &nbsp;
                        <a href="{{ route('profileGuide', $data->pengelolawisata['nama_pengelola_wisata']) }}">
                            <div class="row gutter-v2 gallery">
                                <div class="col-md-2">
                                    @if ($data->pengelolawisata['logo'] == null)
                                        <img src="{{ asset('assets') }}/frontend/images/icons8-user-64.png" alt="Image"
                                            class="image2">
                                    @else
                                        <img src="{{ asset($data->pengelolawisata['logo']) }}" alt="Image"
                                            class="img-fluid"
                                            style="width: 70px; height: 70px; border: solid 3px #000; border-radius: 50%;">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <span>
                                            {{ $data->pengelolawisata['nama_pengelola_wisata'] }}
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
                    </div> <!-- END .custom-block -->
                </div>
                <div class="col-lg-6">
                    &nbsp;
                    &nbsp;
                    <h3 style="color: #fd7e14 ">
                        {{ GoogleTranslate::trans('Informasi Paket Wisata', session()->get('language') ?? 'id') }}
                    </h3>
                    <table>
                        <tr>
                            <td align="center">
                                <h4>
                                    <i class="fas fa-campground"></i>
                                </h4>
                            </td>
                            <td>
                                <h4 style="padding-left:10px">
                                    {{ $data->jenis_paket_wisata }}
                                </h4>
                            </td>
                        </tr>
                        <tr>
                            @if ($data->harga_satuan_paket == 'Personal')
                                <td align="center">
                                    <h4>
                                        <i class="fas fa-child"></i>
                                    </h4>
                                </td>
                                <td>
                                    <h4 style="padding-left:10px">
                                        {{ $data->harga_satuan_paket }}
                                    </h4>
                                </td>
                            @else
                                <td align="center">
                                    <h4>
                                        <i class="fas fa-child"></i>
                                    </h4>
                                </td>
                                <td>
                                    <h4 style="padding-left:10px">
                                        {{ GoogleTranslate::trans('Minimal', session()->get('language') ?? 'id') }}
                                        {{ $data->min_person }}
                                        {{ GoogleTranslate::trans('Person', session()->get('language') ?? 'id') }},
                                        {{ GoogleTranslate::trans('Maksimal', session()->get('language') ?? 'id') }}
                                        {{ $data->max_person }}
                                        {{ GoogleTranslate::trans('Person', session()->get('language') ?? 'id') }}
                                    </h4>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td align="center">
                                <h4>
                                    <!--<i class="fas fa-child"></i>-->
                                </h4>
                            </td>
                            <td>
                                <h5 style="padding-left:10px">
                                    {{ GoogleTranslate::trans('Minimal', session()->get('language') ?? 'id') }}
                                    {{ $data->min_person }}
                                    {{ GoogleTranslate::trans('Person', session()->get('language') ?? 'id') }},
                                    {{ GoogleTranslate::trans('Maksimal', session()->get('language') ?? 'id') }}
                                    {{ $data->max_person }}
                                    {{ GoogleTranslate::trans('Person', session()->get('language') ?? 'id') }}
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            @if ($data->harga_satuan_paket == 'Personal')
                                <td align="center">
                                    <h4>
                                        <i class="fas fa-dollar-sign"></i>
                                    </h4>
                                </td>
                                <td>
                                    <h4 style="padding-left:10px">
                                        Rp. {{ number_format($data->harga) }} /
                                        {{ GoogleTranslate::trans('Person', session()->get('language') ?? 'id') }}
                                    </h4>
                                </td>
                            @else
                                <td align="center">
                                    <i class="fas fa-dollar-sign fa-lg"></i>
                                </td>
                                <td>
                                    <h4 style="padding-left:10px">
                                        Rp. {{ number_format($data->harga) }} /
                                        {{ GoogleTranslate::trans('Group', session()->get('language') ?? 'id') }}
                                    </h4>
                                </td>
                            @endif
                        </tr>
                    </table>
                    &nbsp;
                    &nbsp;
                    <div>
                        <h3 style="color: #fd7e14 ">
                            {{ GoogleTranslate::trans('Deskripsi Paket Wisata', session()->get('language') ?? 'id') }}
                        </h3>
                        <h5>
                            @if ($data->deskripsi === null)
                                {{ GoogleTranslate::trans('Notyet Set', session()->get('language') ?? 'id') }}
                            @else
                                {{ strip_tags(GoogleTranslate::trans($data->deskripsi, session()->get('language') ?? 'id')) }}
                            @endif
                        </h5>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div>
                        <h3 style="color: #fd7e14">
                            {{ GoogleTranslate::trans('Schedule', session()->get('language') ?? 'id') }}
                        </h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 mb-3" id="Friday, Nov 13th">
                                    @if ($data->tgl_mulai && $data->tgl_akhir != null)
                                        @php
                                            $tgl1 = $data->tgl_mulai;
                                            $tgl2 = $data->tgl_akhir;
                                            $date1 = Carbon\Carbon::parse($tgl1);
                                            $date2 = Carbon\Carbon::parse($tgl2);
                                            $formattedDate1 = $date1->locale('id')->translatedFormat('l, j F Y');
                                            $formattedDate2 = $date2->locale('id')->translatedFormat('l, j F Y');
                                        @endphp
                                        <h5 class="mt-0 mb-4 text-dark op-8 font-weight-bold">
                                            {{ $formattedDate1 }} s&#47;d
                                            {{ $formattedDate2 }}
                                        </h5>
                                    @endif
                                    <ul class="list-timeline list-timeline-primary">
                                        @foreach ($arrayWaktu as $key => $value)
                                            <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                                                <p class="my-0 text-dark flex-fw text-sm text-uppercase text-left">
                                                    <span class="text-inverse op-8">{{ $value }}</span>
                                                    -
                                                    {{ GoogleTranslate::trans($arrayKegiatan[$key], session()->get('language') ?? 'id') }}
                                                </p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    &nbsp;
                    &nbsp;
                    @if (auth()->check() == false)
                        <div>
                            <h3 style="color: #fd7e14">
                                {{ GoogleTranslate::trans('Pesan Sekarang', session()->get('language') ?? 'id') }}
                            </h3>
                            <form class="booking" action="{{ route('front.cart') }}" method="POST">
                                @csrf
                                @if ($data->pilihan == 'set_tanggal')
                                    @php
                                        $tglMulai = Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_mulai)->format('Y-m-d');
                                        $tglAkhir = Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_akhir)->format('Y-m-d');
                                    @endphp
                                    <div class="form-group">
                                        <label
                                            for="tgl_booking">{{ GoogleTranslate::trans('Tanggal Booking', session()->get('language') ?? 'id') }}</label>
                                        <input type="date" class="form-control" name="tgl_booking" id="ssa"
                                            min="{{ $tglMulai }}" max="{{ $tglAkhir }}"
                                            @if ($tglMulai > $tglAkhir) disabled @endif required>
                                    </div>
                                @else
                                    @php
                                        $currentDateTime = Carbon\Carbon::now();
                                        $formattedDateTime = $currentDateTime->format('Y-m-d');
                                        $futureDate = date('Y-m-d', strtotime($formattedDateTime . ' +' . $data->before_booking . ' days'));
                                    @endphp
                                    <div class="form-group">
                                        <label
                                            for="tgl_booking">{{ GoogleTranslate::trans('Tanggal Booking', session()->get('language') ?? 'id') }}</label>
                                        <input type="date" class="form-control" name="tgl_booking"
                                            min="{{ $futureDate }}" max="9999-12-31" required>
                                    </div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            // Ambil elemen input tanggal
                                            var inputTanggal = document.getElementById("tanggal");

                                            // Dapatkan tanggal hari ini dari PHP
                                            var today = "<?php echo $futureDate; ?>";

                                            // Ubah tanggal hari ini menjadi objek Date
                                            var todayDate = new Date(today);

                                            // Nonaktifkan opsi tanggal sebelum hari ini
                                            var optionList = inputTanggal.getElementsByTagName("option");
                                            for (var i = 0; i < optionList.length; i++) {
                                                var option = optionList[i];
                                                var optionValue = option.value;
                                                var optionDate = new Date(optionValue);

                                                if (optionDate < todayDate) {
                                                    option.disabled = true;
                                                }
                                            }
                                        });
                                    </script>
                                @endif
                                {{-- <div class="form-group">
                                    <label for="person">Person User</label>
                                    <input type="text" class="form-control" name="jml_org">
                                </div> --}}
                                <div class="form-group">
                                    <label
                                        for="person">{{ GoogleTranslate::trans('Person', session()->get('language') ?? 'id') }}</label>
                                    <input type="number" class="form-control" value="{{ $data->min_person }}"
                                        name="jml_org" max="{{ $data->max_person }}" min="{{ $data->min_person }}"
                                        required>
                                </div>
                                <div class="center mt-5">
                                    <input type="hidden" class="form-control" name="qty" id="sst"
                                        value="1">
                                    <input type="hidden" name="nama_paket_wisata"
                                        value="{{ $data->nama_paket_wisata }}">
                                    <input type="hidden" name="paketwisataid" value="{{ $data->id }}">
                                    @if (auth()->user() != null)
                                        @php
                                            $customer = App\Customer::where('user_id', auth()->user()->id)->first();
                                        @endphp
                                        <div class="add-to-btn">
                                            <div class="add-comp">
                                                <button class="btn btn-outline-warning" type="submit"><i
                                                        class="fas fa-cart-plus"></i>&nbsp;{{ GoogleTranslate::trans('Booking Now', session()->get('language') ?? 'id') }}</button>
                                            </div>
                                        </div>
                                    @else
                                        <a class="btn btn-primary" style="height:35px; padding-top:7px; md-8"
                                            href="{{ route('login') }}">
                                            {{ GoogleTranslate::trans('Login Now', session()->get('language') ?? 'id') }}
                                        </a>
                                        &nbsp;&nbsp;
                                        <b>{{ GoogleTranslate::trans('OR', session()->get('language') ?? 'id') }}</b>
                                        &nbsp;&nbsp;
                                        <a class="btn btn-primary" style="height:35px; padding-top:7px; md-8"
                                            href="{{ route('register') }}">
                                            {{ GoogleTranslate::trans('Sign Up', session()->get('language') ?? 'id') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    @else
                        @if (auth()->user()->role != 'pengelolawisata')
                            <div>
                                <h3 style="color: #fd7e14">
                                    {{ GoogleTranslate::trans('Booking Now', session()->get('language') ?? 'id') }}</h3>
                                <form class="booking" action="{{ route('front.cart') }}" method="POST">
                                    @csrf
                                    @if ($data->pilihan == 'set_tanggal')
                                        @php
                                            $tglMulai = Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_mulai)->format('Y-m-d');
                                            $tglAkhir = Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_akhir)->format('Y-m-d');
                                        @endphp
                                        <div class="form-group">
                                            <label
                                                for="tgl_booking">{{ GoogleTranslate::trans('Tanggal Booking', session()->get('language') ?? 'id') }}</label>
                                            <input type="date" class="form-control" name="tgl_booking" id="ssa"
                                                min="{{ $tglMulai }}" max="{{ $tglAkhir }}"
                                                @if ($tglMulai > $tglAkhir) disabled @endif required>
                                        </div>
                                    @else
                                        @php
                                            $currentDateTime = Carbon\Carbon::now();
                                            $formattedDateTime = $currentDateTime->format('Y-m-d');
                                            $futureDate = date('Y-m-d', strtotime($formattedDateTime . ' +' . $data->before_booking . ' days'));
                                        @endphp
                                        <div class="form-group">
                                            <label
                                                for="tgl_booking">{{ GoogleTranslate::trans('Tanggal Booking', session()->get('language') ?? 'id') }}</label>
                                            <input type="date" class="form-control" name="tgl_booking"
                                                min="{{ $futureDate }}" max="9999-12-31" required>
                                        </div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                // Ambil elemen input tanggal
                                                var inputTanggal = document.getElementById("tanggal");

                                                // Dapatkan tanggal hari ini dari PHP
                                                var today = "<?php echo $futureDate; ?>";

                                                // Ubah tanggal hari ini menjadi objek Date
                                                var todayDate = new Date(today);

                                                // Nonaktifkan opsi tanggal sebelum hari ini
                                                var optionList = inputTanggal.getElementsByTagName("option");
                                                for (var i = 0; i < optionList.length; i++) {
                                                    var option = optionList[i];
                                                    var optionValue = option.value;
                                                    var optionDate = new Date(optionValue);

                                                    if (optionDate < todayDate) {
                                                        option.disabled = true;
                                                    }
                                                }
                                            });
                                        </script>
                                    @endif
                                    {{-- <div class="form-group">
                                        <label for="person">Person Pengelola</label>
                                        <input type="number" class="form-control" name="jml_org">
                                    </div> --}}
                                    <div class="form-group">
                                        <label
                                            for="person">{{ GoogleTranslate::trans('Person', session()->get('language') ?? 'id') }}</label>
                                        <input type="number" class="form-control" value="{{ $data->min_person }}"
                                            name="jml_org" max="{{ $data->max_person }}" min="{{ $data->min_person }}"
                                            required>
                                    </div>
                                    <div class="center mt-5">
                                        <input type="hidden" class="form-control" name="qty" id="sst"
                                            value="1">
                                        <input type="hidden" name="nama_paket_wisata"
                                            value="{{ $data->nama_paket_wisata }}">
                                        <input type="hidden" name="paketwisataid" value="{{ $data->id }}">
                                        @if (auth()->user() != null)
                                            @php
                                                $customer = App\Customer::where('user_id', auth()->user()->id)->first();
                                            @endphp
                                            <div class="add-to-btn">
                                                <div class="add-comp">
                                                    <button class="btn btn-outline-warning" type="submit"><i
                                                            class="fas fa-cart-plus"></i>&nbsp;{{ GoogleTranslate::trans('Booking Now', session()->get('language') ?? 'id') }}</button>
                                                </div>
                                            </div>
                                        @else
                                            <a class="btn btn-primary" style="height:35px; padding-top:7px; md-8"
                                                href="{{ route('login') }}">
                                                {{ GoogleTranslate::trans('Login Now', session()->get('language') ?? 'id') }}
                                            </a>
                                            &nbsp;&nbsp;
                                            <b>{{ GoogleTranslate::trans('OR', session()->get('language') ?? 'id') }}</b>
                                            &nbsp;&nbsp;
                                            <a class="btn btn-primary" style="height:35px; padding-top:7px; md-8"
                                                href="{{ route('register') }}">
                                                {{ GoogleTranslate::trans('Sign Up', session()->get('language') ?? 'id') }}
                                            </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        @endif
                    @endif
                </div>
                &nbsp;
                <div class="center mt-5">
                    <a href="https://wa.me/{{ $data->pengelolawisata['kontak'] }}?text=Konfirmasi%20pembayaran%20untuk%20kode%20Invoice%20%20"
                        target="_blank" class="btn btn-success" style="height:40px; padding-top:10px; md-8"><i
                            class="fab fa-whatsapp"></i>&nbsp;WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section mb-5">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title text-center">
                        {{ GoogleTranslate::trans('Ulasan', session()->get('language') ?? 'id') }}
                        (<b>{{ $ulasan }}</b>)</h2>
                </div>
            </div>
            <div class="wrapper">
                <div class="scroll-cards">
                    <article class="scroll-cards__item" aria-label="Wie - 1">
                        @forelse ($rating as $item)
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    @if ($item->customer == null)
                                        <img src="{{ asset('assets') }}/frontend/images/icons8-user-64.png"
                                            alt="Image" class="img-fluid"
                                            style="width: 80px; height: 80px; border: solid 3px #000; border-radius: 50%; margin-left: 40px">
                                    @else
                                        <img src="{{ asset($item->customer['foto']) }}" alt="Image" class="img-fluid"
                                            style="width: 80px; height: 80px; border: solid 3px #000; border-radius: 50%; margin-left: 40px">
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    @if ($item->customer == null)
                                        <span style="font-size: 18px"><strong>{{ auth()->user()->name }}</strong></span>
                                    @else
                                        <span
                                            style="font-size: 18px"><strong>{{ $item->customer['nama_lengkap'] }}</strong></span>
                                    @endif
                                    <div>
                                        {{ GoogleTranslate::trans('Rating', session()->get('language') ?? 'id') }}
                                        @if ($item->rating == '1')
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star" style="font-size:11px;"></span>
                                            <span class="fa fa-star" style="font-size:11px;"></span>
                                            <span class="fa fa-star" style="font-size:11px;"></span>
                                            <span class="fa fa-star" style="font-size:11px;"></span>
                                        @elseif ($item->rating == '2')
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star" style="font-size:11px;"></span>
                                            <span class="fa fa-star" style="font-size:11px;"></span>
                                            <span class="fa fa-star" style="font-size:11px;"></span>
                                        @elseif ($item->rating == '3')
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star" style="font-size:11px;"></span>
                                            <span class="fa fa-star" style="font-size:11px;"></span>
                                        @elseif ($item->rating == '4')
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star" style="font-size:11px;"></span>
                                        @elseif ($item->rating == '5')
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                            <span class="fa fa-star checked" style="font-size:11px;"></span>
                                        @endif
                                    </div> <br>
                                    <p class="text-left">
                                        @if ($item->comment == null)
                                            <i>{{ GoogleTranslate::trans('Tidak Ada Ulasan', session()->get('language') ?? 'id') }}</i>
                                        @else
                                            {{ GoogleTranslate::trans($item->comment, session()->get('language') ?? 'id') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <span
                                        style="font-size: 18px"><strong>{{ GoogleTranslate::trans('Belum Ada Ulasan !', session()->get('language') ?? 'id') }}</strong></span>
                                </div>
                            </div>
                        @endforelse
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(cityName).style.display = "block";
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        (function() {
            var $gallery = new SimpleLightbox('.gallery a', {});
        })();
    </script>

    <script src="{{ asset('src') }}/bootstrap-input-spinner.js"></script>
    <script>
        $("input[type='number']").inputSpinner();
    </script>
    <script>
        function submitForm() {
            document.getElementById("myForm").submit();
        }
    </script>
@endpush
