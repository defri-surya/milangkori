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
            <div>
                <div class="text-center">
                    <a href="#" target="_blank"><img src="{{ asset($event->image) }}" alt="Image" width="1000px"></a>
                </div>
            </div>
                &nbsp;
                <br>
                &nbsp;
                <br>
                &nbsp;
                <br>
                &nbsp;
                <br>
                &nbsp;
            <div>
                <div class="text-center">
                    <h2 style="color: #fd7e14 "> DAFTAR PESERTA JOB FAIR  : </h2>
                </div>
            </div>
                <div class="row justify-content-center mt-4 section">
                    <div class="col-lg-10">
                      <div class="row">
                            @forelse ($eventJob as $item => $ikutevent )
                                <div class="col-lg-3 mb-4">
                                    <a href="{{ route('detailperusahaan', $ikutevent->id) }}">
                                        <div class="team">
                                            <img src="{{ asset($ikutevent->logo) }}" alt="Image" class="mb-4" style="width: 80%; height: 170px; margin-left:20px; margin-right:auto">
                                            <div class="px-3 text-center">
                                                <p class="mb-0" style="font-size: 18px">{{ $ikutevent->nama_perusahaan }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                            @endforelse
                      </div>
                    </div>
                </div>            
        </div>
    </div>
@endsection
