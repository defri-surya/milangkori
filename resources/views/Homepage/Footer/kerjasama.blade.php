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
            <h3>Kerjasama</h3>
            {{-- <div class="row loker">
                @forelse ($paketwisata as $value)
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-4">
                    <div class="media-1">
                        <div class="card">
                            
                            <div class="card-body">
                                <img src="{{ asset($value->foto1) }}" alt="Image" 
                                class="img-fluid my-3" style="width: 150%; height:150px; object-fit:contain">

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
            @endforelse
            </div>
            <div class="center" style="text-transform: uppercase; color:rgb(35, 26, 14)">
                {{ $paketwisata->links() }}
            </div> --}}
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
