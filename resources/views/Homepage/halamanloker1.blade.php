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
            <form method="GET" action="{{ route('searchByKategorihalaman') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <select id="select2-1" name="kategori" class="form-control custom-select">
                                <option selected disabled>Kategoriii Bidang Pekerjaan</option>
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

            <div class="row loker">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 mb-lg-4 text-center">
                    <i><b>Data yang anda cari tidak ditemukan!</b></i>
                </div>
            </div>
            <div class="center" style="text-transform: uppercase; color:rgb(35, 26, 14)">
                {{-- {{ $data2->links() }} --}}
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
    </script>
@endpush
