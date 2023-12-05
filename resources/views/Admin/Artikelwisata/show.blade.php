@extends('layouts.backend.master')

@section('title', 'Home | Admin')
<style>
    .responsive {
      width: 100%;
      max-width: 600px;
      height: auto;
    }
</style>
@section('content')
    <div id="content">
        <!-- .outer -->
        <div class="container-fluid outer">
            <div class="row-fluid">
                <!-- .inner -->
                <div class="span12 inner">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <header>
                                    <h5>&nbsp;Detail Artikel Wisata &#9658; {{ $data->nama_paket_wisata }} </h5>
                                </header>
                                <div class="body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($data->foto) }}" alt="" class="responsive" 
                                                    style="border: 2px solid #c7c7c7; padding: 5px; 
                                                    border-radius: 15px; vertical-align: middle; max-width: 600px">
                                                </td>
                                            </tr>
                                        </tbody>
                                        <td>
                                            {{-- <h4 class="" style="margin-top: 5px"> Judul Artikel Wisata : {{ $data->judul }}</h4> --}}
                                            {{-- <br> --}}
                                        </td>
                                        <td>
                                        </td>
                                    </table>
                                    <h4 style="margin-top: 5px">Judul Artikel Wisata : {{  $data->judul  }}</h4>
                                    {{-- <p style="text-align: justify">{{  $data->judul  }}</p> --}}

                                    <h4 style="margin-top: 30px">Deskripsi :</h4>
                                    <p style="text-align: justify">{!! $data->deskripsi !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.row-fluid -->
        </div>
        <!-- /.outer -->
    </div>
@endsection