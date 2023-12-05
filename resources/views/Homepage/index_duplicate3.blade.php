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
    </style>
@endsection

@section('content')
    {{-- <div class="hero" style="background-image: url('{{ asset('assets') }}/frontend/images/image-2.png'); height: 50%">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="intro-wrap title">
                        <h1><span class="d-block">Build Your Career Start
                                Here <br><span class="typed-words"></span></h1>
                    </div>
                </div>
                <div class="col-lg-4" style="right: 75px">
                    <div class="intro-wrap image">
                        <img src="{{ asset('assets') }}/frontend/images/image-1.png" alt="Image"
                            style="margin-top: 25%; max-width: 140%; ">
                    </div>
                </div>
                <div class="col-lg-4 form-search">
                    <div class="row">
                        <div class="col-12" style="margin-left: 10%">
                            <form class="form" action="{{ route('search') }}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="judul" placeholder="Cari Lowongan ">
                                </div>
                                <div class="form-group">
                                    <select name="pendidikan" id="" class="form-control custom-select">
                                        <option selected disabled>Pendidikan</option>
                                        <option value="SMK">SMA / SMK</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="lokasi" id="select2" class="form-control custom-select">
                                        <option selected disabled>Lokasi Kerja</option>
                                        @foreach ($kota as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="control  control--checkbox mt-3" name="fullTime">
                                        <span value="Full Time" class="caption">Full Time</span>
                                        <input type="checkbox" name="fullTime" value="Full Time" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="partTime" class="control control--checkbox mt-3">
                                        <span value="Part Time" class="caption">Part Time</span>
                                        <input type="checkbox" name="partTime" value="Part Time" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="freelance" class="control control--checkbox mt-3">
                                        <span value="Freelance" class="caption">Freelance</span>
                                        <input type="checkbox" name="freelance" value="Freelance" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="magang" class="control control--checkbox mt-3">
                                        <span value="magang" class="caption">Magang</span>
                                        <input type="checkbox" name="magang" value="Magang" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-6">
                                        <input type="submit" class="btn btn-primary btn-block" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="untree_co-section count-numbers py-4 text-center" style="background: #2a618b;">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" style="color: rgb(255, 253, 253)"
                                data-number="{{ totalPerusahaan() }}">0</span>
                        </div>
                        <span class="caption" style="font-family: sans-serif; color: rgb(255, 253, 253)">Total Perusahaan
                            Terdaftar</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" style="color: rgb(255, 253, 253)"
                                data-number="{{ totalPencaker() }}">0</span>
                        </div>
                        <span class="caption" style="font-family: sans-serif; color: rgb(255, 253, 253)">Total Pencari
                            Kerja Terdaftar</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" style="color: rgb(255, 253, 253)"
                                data-number="{{ totalLoker() }}">0</span>
                        </div>
                        <span class="caption" style="font-family: sans-serif; color: rgb(255, 253, 253)">Total Lowongan
                            Kerja</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- @if ($lokerfav->count() < 1)
        <div class="untree_co-section" style="background: #2a618b;" hidden>
            <div class="container">
                <div class="row text-center justify-content-center mb-5">
                    <div class="col-lg-7">
                        <h2 class="section-title text-center" style="color: #fff">Lowongan Kerja Favorit</h2>
                    </div>
                </div>
                <div class="owl-carousel owl-3-slider">
                    @forelse ($lokerfav as $lokerfavorit)
                        <div class="item">
                            <div class="media-1">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h5> <span class="d-block"> DIBUTUHKAN</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h3 class="judullokerfavorit">{{ $lokerfavorit->judul }}</h3>
                                            </div>
                                        </div>
                                        <a href="#" class="d-block mb-3"><img
                                                src="{{ asset($lokerfavorit->perusahaan['logo']) }}" alt="Image"
                                                class="img-fluid"></a>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h3 class="JudulLokerFavorit">
                                                    {{ $lokerfavorit->perusahaan['nama_perusahaan'] }}</h3>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-map-marker-alt"></i>
                                                        </td>
                                                        <td class="LokasiLokerFavorit">
                                                            {{ \Illuminate\Support\Str::limit($lokerfavorit->perusahaan['alamat'], 20, $end = '...') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-graduation-cap"></i>
                                                        </td>
                                                        <td class="PendidikanLokerFavorit">
                                                            {{ $lokerfavorit->pendidikan_min }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-business-time"></i>
                                                        </td>
                                                        <td class="JamkerjaLokerFavorit">
                                                            {{ $lokerfavorit->status_kerja }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="center">
                                            <a href="{{ route('detaillokerfavorit', $lokerfavorit->kode_loker) }}"
                                                class="btn btn-primary">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 mb-lg-4 text-center">
                            <i><b>Data yang anda cari tidak ditemukan!</b></i>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    @else
        <div class="untree_co-section" style="background: #2a618b;">
            <div class="container">
                <div class="row text-center justify-content-center mb-5">
                    <div class="col-lg-7">
                        <h2 class="section-title text-center" style="color: #fff">Lowongan Kerja Favorit</h2>
                    </div>
                </div>
                <div class="owl-carousel owl-3-slider">
                    @forelse ($lokerfav as $lokerfavorit)
                        <div class="item">
                            <div class="media-1">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h5> <span class="d-block"> DIBUTUHKAN</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h3 class="judullokerfavorit">{{ $lokerfavorit->judul }}</h3>
                                            </div>
                                        </div>
                                        <a href="#" class="d-block mb-3"><img
                                                src="{{ asset($lokerfavorit->perusahaan['logo']) }}" alt="Image"
                                                class="img-fluid"></a>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h3 class="JudulLokerFavorit">
                                                    {{ $lokerfavorit->perusahaan['nama_perusahaan'] }}</h3>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-map-marker-alt"></i>
                                                        </td>
                                                        <td class="LokasiLokerFavorit">
                                                            {{ \Illuminate\Support\Str::limit($lokerfavorit->perusahaan['alamat'], 20, $end = '...') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-graduation-cap"></i>
                                                        </td>
                                                        <td class="PendidikanLokerFavorit">
                                                            {{ $lokerfavorit->pendidikan_min }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-business-time"></i>
                                                        </td>
                                                        <td class="JamkerjaLokerFavorit">
                                                            {{ $lokerfavorit->status_kerja }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="center">
                                            <a href="{{ route('detaillokerfavorit', $lokerfavorit->kode_loker) }}"
                                                class="btn btn-primary">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 mb-lg-4 text-center">
                            <i><b>Data yang anda cari tidak ditemukan!</b></i>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    @endif --}}
    {{-- <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title text-center mb-3">Lowongan Kerja Terbaru</h2>
                </div>
            </div>
            <form method="GET" action="{{ route('searchByKategori') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <select id="select2-1" name="kategori" class="form-control custom-select">
                                <option selected disabled>Kategori Bidang Pekerjaan</option>
                                @foreach ($katagori as $count => $value)
                                    <option value="{{ $value->id }}">{{ $value->bidang_pekerjaan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary btn-block"
                            style="height:35px; padding-top:5px">Search</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 mb-lg-4 text-center">
                    <i><b>Data yang anda cari tidak ditemukan!</b></i>
                </div>
            </div>
            <div class="center" style="text-transform: uppercase">
                <a href="{{ route('halamanloker') }}" class="btn btn-primary" style="text-transform: uppercase">
                    lowongan lainnya
                </a>
            </div>
        </div>
    </div> --}}

    <div class="hero" style="background-image: url('{{ asset('assets') }}/frontend/images/image-2.png'); height: 50%">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="intro-wrap title">
                        <h1>
                            <span class="d-block">Tur Gate Wisata<br>
                                <span class="typed-words"></span>
                        </h1>
                    </div>
                </div>
                <div class="col-lg-6" style="right: 300px">
                    <div class="intro-wrap image">
                        <img src="{{ asset('assets') }}/frontend/images/image-tur.jpg" alt="Image"
                            style="margin-top: 10%; max-width: 1400%; ">
                    </div>
                </div>
                <div class="col-lg-3 form-search">
                    <div class="row">
                        <div class="col-12" style="margin-left: 72%">
                            <form class="form" action="{{ route('search') }}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="judul" placeholder="Cari Paket Wisata ">
                                </div>
                                <div class="form-group">
                                    <select name="pendidikan" id="" class="form-control custom-select">
                                        <option selected disabled>Kategori Paket Wisata</option>
                                        <option value="SMK">SMA / SMK</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="kota" id="select3" class="form-control custom-select">
                                        <option selected disabled>Lokasi Kota Paket Wisata</option>
                                        @foreach ($kota as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span><b> Jenis Paket Wisata</b></span>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <label class="control  control--checkbox mt-3" name="fullTime">
                                        <span value="Full Time" class="caption">Menginap</span>
                                        <input type="checkbox" name="fullTime" value="Full Time" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="partTime" class="control control--checkbox mt-3">
                                        <span value="Part Time" class="caption">Day Trip</span>
                                        <input type="checkbox" name="partTime" value="Part Time" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="freelance" class="control control--checkbox mt-3">
                                        <span value="Freelance" class="caption">Group</span>
                                        <input type="checkbox" name="freelance" value="Freelance" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="magang" class="control control--checkbox mt-3">
                                        <span value="magang" class="caption">Personal</span>
                                        <input type="checkbox" name="magang" value="Magang" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-6">
                                        <input type="submit" class="btn btn-primary btn-block" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title text-center mb-3">Informasi Paket Wisata 3</h2>
                </div>
            </div>
            <form method="GET" action="{{ route('searchByKategoripaketwisata') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <select id="select2-2" name="katagoripaketwisata" class="form-control custom-select">
                                <option selected disabled>Kategori Paket Wisata 3</option>
                                @foreach ($katagoripaketwisata as $count => $value)
                                    <option value="{{ $value->id }}">{{ $value->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary btn-block"
                            style="height:35px; padding-top:5px">Search</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 mb-lg-4 text-center">
                    <i><b>Data yang anda cari tidak ditemukan!</b></i>
                </div>
            </div>
            <div class="center" style="text-transform: uppercase">
                <a href="{{ route('halamanloker') }}" class="btn btn-primary" style="text-transform: uppercase">
                    lowongan lainnya
                </a>
            </div>
        </div>
    </div>

   

    
{{-- 
    <div class="untree_co-section" style="background: #2a618b;">
        <div class="container">
            <div class="row text-center justify-content-center mb-5">
                <div class="col-lg-7">
                    <h2 class="section-title text-center" style="color: rgb(255, 253, 253)">Partnership</h2>
                </div>
            </div>
            <div class="owl-carousel owl-4-slider">
                @forelse ($partner as $value)
                    <div class="item">
                        <div class="media-1">
                            <div class="card">
                                <div class="card-body">
                                    <a href="https://{{ $value->link }}" class="justify-content-center"><img
                                            src="{{ asset($value['logo']) }}" alt="Image" width="220px"
                                            height="220px"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div> --}}
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
