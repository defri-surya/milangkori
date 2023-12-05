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
            <h3>{{--  Artikel Wisata  --}}</h3>
            <br>
            <div class="row">
                    @forelse ($data as $value)    
                        <div class="col-6 col-md-6 col-lg-3">
                            <div class="media-1">
                                <a href="{{ route('detailartikelwisata', $value->id) }}" class="d-block mb-3"><img src="{{ asset($value->foto) }} " alt="Image" class="img-fluid"
                                    style="width: 200%; height:250px; border-radius: 0" >
                                </a>
                                <div class="d-flex">
                                <div>
                                    <h3><a href="#">{{ $value->judul }}</a></h3>
                                    <p>{!! \Illuminate\Support\Str::limit($value->deskripsi, 300, $end = '...') !!}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-lg-4 text-center">
                            <i><b>Artikel tidak tersedia!</b></i>
                        </div>
                    @endforelse
                </div>
                <div class="center" style="text-transform: uppercase; color:rgb(35, 26, 14)">
                     {{ $data->links() }}
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
