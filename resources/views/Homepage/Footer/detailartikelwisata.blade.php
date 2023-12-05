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

        .img-responsive {
            max-width: 100%; 
            display:block; 
            height: auto;
        }

        .tengah {
          margin-left:auto;
          margin-right:auto;
          display:block;
          width:100%
        }
    </style>
@endsection

@section('content')
      <div class="untree_co-section">
        <div class="container my-5">
          <div class="mb-5">
            <div class="owl-single dots-absolute owl-carousel owl-loaded owl-drag">         
            </div>
          </div>
          <div class="row justify-content-center mt-5 section">
            <div class="col-lg-10">
              <div class="row mb-5">
                <div class="col text-center">
                  <h2 class="section-title text-center">{{ $data->judul }}</h2>
                  <br/>
                  <br/>
                  <br/>
                  <div class="tengah">
                    <img src="{{ asset($data->foto) }}" alt="Image" class="img-fluid mb-6">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 mb-6">
                  <div class="team">
                    <div class="px-6">
                      <p>{!! $data->deskripsi !!} </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
