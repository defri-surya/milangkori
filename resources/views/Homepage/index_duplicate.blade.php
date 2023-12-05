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
    <div class="hero" style="background-image: url('{{ asset('assets') }}/frontend/images/image-2.png'); height: 50%">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4" {{-- style="right: 10%" --}}>
                    <div class="intro-wrap title">
                        <h1>
                            <span class="d-block">Tur Gate Wisata<br>
                                <span class="typed-words"></span>
                        </h1>
                    </div>
                </div>
                <div class="col-lg-4" style="right: 300px">
                    <div {{-- class="intro-wrap image" --}}>
                        <img src="{{ asset('assets') }}/frontend/images/image-tur.jpg" alt="Image"
                            style="margin-top: 15%; max-width: 1600%; ">
                    </div>
                </div>
                <div class="col-lg-4 form-search">
                    <div class="row">
                        <div class="col-12" style="margin-left: 30%">
                            <form class="form" action="{{ route('searchpaket') }}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_paket_wisata" placeholder="Cari Paket Wisata ">
                                </div>
                                <div class="form-group">
                                    <select name="katagoripaketwisata" id="select2-3" class="form-control custom-select">
                                        <option selected disabled>Kategori Paket Wisata</option>
                                        @forelse ($katagoripaketwisata as $value)
                                            <option value="{{ $value->id }}">{{ $value->nama_paket }}</option>
                                        @empty
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 mb-lg-4 text-center">
                                                <i><b>Data yang anda cari tidak ditemukan!</b></i>
                                            </div>
                                        @endforelse
                                    </select>
                                </div>
                                <span><b> Jenis Paket Wisata</b></span>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <label class="control  control--checkbox mt-3" name="Menginap">
                                        <span value="Menginap" class="caption">Menginap</span>
                                        <input type="checkbox" name="Menginap" value="Menginap" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="DayTrip" class="control control--checkbox mt-3">
                                        <span value="DayTrip" class="caption">Day Trip</span>
                                        <input type="checkbox" name="DayTrip" value="DayTrip" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="Group" class="control control--checkbox mt-3">
                                        <span value="Group" class="caption">Group</span>
                                        <input type="checkbox" name="Group" value="Group" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label name="Personal" class="control control--checkbox mt-3">
                                        <span value="Personal" class="caption">Personal</span>
                                        <input type="checkbox" name="Personal" value="Personal" />
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
                    <h2 class="section-title text-center mb-3">Lowongan Kerja Terbaru </h2>
                </div>
            </div>
            <form method="GET" action="{{ route('searchByKategoripaketwisata') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <select id="select2-2" name="katagoripaketwisata" class="form-control custom-select">
                                <option selected disabled>Kategori Paket Wisata</option>
                                @forelse ($katagoripaketwisata as $count => $value)
                                    <option value="{{ $value->id }}">{{ $value->nama_paket }}</option>
                                @empty
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 mb-lg-4 text-center">
                                        <i><b>Data yang anda cari tidak ditemukan!</b></i>
                                    </div>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary btn-block"
                            style="height:35px; padding-top:5px">Search</button>
                    </div>
                </div>
            </form>

            <div class="row loker">
                @forelse ($data  as $value)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-4">
                        <div class="media-1">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset($value->foto1) }}" alt="Image" 
                                    class="img-fluid my-3" style="width: 130%; height:130px; object-fit:contain">
                                    <div class="d-flex align-items-left">
                                        <div class="mx-auto">
                                            <span style="font-size:18px; text-transform:uppercase;"><b> {{ $value->nama_paket_wisata }}</b></span>
                                        </div>
                                    </div>
                                    &nbsp;
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-user"></i>
                                                    </td>
                                                    <td>
                                                        <b>
                                                        <span style="color:darkorange">
                                                        {{ $value->pengelolawisata['nama_pengelola_wisata']}}
                                                        </span>
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </td>
                                                    <td>
                                                        <b>
                                                        Rp. {{ number_format($value->harga) }}
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-clock"></i>
                                                    </td>
                                                    <td>
                                                        {{ $value->tgl_mulai }} - {{ $value->tgl_akhir }}
                                                    </td>
                                                </tr>
                                                <tr >
                                                    <td>
                                                        <i class="fas fa-campground"></i>
                                                    </td>
                                                    <td>
                                                        <b>
                                                        {{ $value->jenis_paket_wisata }}
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr hidden>
                                                    <td>
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </td>
                                                    <td>
                                                        <b>
                                                        {{ $value->lokasi }}
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr >
                                                    <td>
                                                        <i class="fas fa-archway"></i>
                                                    </td>
                                                    <td>
                                                        <b>
                                                        {{ $value->kategori_paket_wisata['nama_paket'] }}
                                                        </b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="center">
                                                <a href="{{ route('detailpaketwisata', $value->id) }}" class="btn btn-primary">Detail Paket</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 mb-lg-4 text-center">
                    <i><b>Data yang anda cari tidak ditemukan!</b></i>
                </div>>
                @endforelse
            </div>

            <div class="center" style="text-transform: uppercase">
                <a href="{{ route('halamanloker') }}" class="btn btn-primary" style="text-transform: uppercase">
                    lowongan lainnya
                </a>
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
        $('#select2-3').select2({
            theme: "bootstrap4"
        });
    </script>
@endpush
