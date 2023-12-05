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
                                <option selected disabled>Kategorii Bidang Pekerjaan</option>
                                @foreach ($katagori as $count => $value)
                                    <option value="{{ $value->id }}">{{ $value->bidang_pekerjaan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary btn-block" style="height:35px; padding-top:5px">Search</button>
                    </div>
                </div>
            </form>

             <div class="row loker">
                @forelse ($loker as $lok)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-4">
                        <div class="media-1">
                            <div class="card">
                                <div class="card-header text-center">
                                    <b>DIBUTUHKAN</b>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mx-auto">
                                            <span style="font-size:15px; text-transform:uppercase;"><b>{{ $lok->judul }}</b></span>
                                        </div>
                                    </div>
                                    <img src="{{ asset($lok->perusahaan['logo']) }}" alt="Image" class="img-fluid my-3" style="width: 100%; height:150px; object-fit:contain">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <span style="font-size:17px; ">{{ $lok->perusahaan['nama_perusahaan'] }}</span>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </td>
                                                    <td>
                                                        {{ \Illuminate\Support\Str::limit($lok->perusahaan['alamat'], 20, $end = '...') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-graduation-cap"></i>
                                                    </td>
                                                    <td>
                                                        {{ $lok->pendidikan_min }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-business-time"></i>
                                                    </td>
                                                    <td>
                                                        {{ $lok->status_kerja }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="center">
                                        <a href="{{ route('detailloker', $lok->kode_loker) }}" class="btn btn-primary">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
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