@extends('layouts.backend.master')

@section('title', 'Home | Admin')

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
                                    <h5>&nbsp;Detail Paket Wisata &#9658; {{ $data->nama_paket_wisata }} </h5>
                                </header>
                                <div class="body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($data->foto1) }}" alt="" style="border: 2px solid #c7c7c7; padding: 5px; border-radius: 15px; vertical-align: middle; max-width: 200px">
                                                    <img src="{{ asset($data->foto2) }}" alt="" style="border: 2px solid #c7c7c7; padding: 5px; border-radius: 15px; vertical-align: middle; max-width: 200px">
                                                    <img src="{{ asset($data->foto3) }}" alt="" style="border: 2px solid #c7c7c7; padding: 5px; border-radius: 15px; vertical-align: middle; max-width: 200px">
                                                    <img src="{{ asset($data->foto4) }}" alt="" style="border: 2px solid #c7c7c7; padding: 5px; border-radius: 15px; vertical-align: middle; max-width: 200px">
                                                </td>
                                            </tr>
                                        </tbody>
                                        <td>
                                            <h4 class="fas fa-dollar-sign" style="margin-top: 0">Rp. {{ $data->harga }}</h4>
                                            <br>
                                            <i class="icon-time"></i>&nbsp;{{ $data->tgl_mulai }} - &nbsp;{{ $data->tgl_akhir }}
                                        </td>
                                        <td>
                                        </td>
                                    </table>
                                    <a href="https://wa.me/{{ $data->pengelolawisata['kontak'] }}?text=Konfirmasi%20pembayaran%20untuk%20kode%20Invoice%20%20"
                                        target="_blank" class="btn btn-success"
                                        style="margin-bottom: 0; text-transform: uppercase"><i
                                        class="fab fa-whatsapp"></i>&nbsp;WhatsApp
                                    </a>
                                    {{-- <button class="btn btn-warning" style="margin-bottom: 0; text-transform: uppercase"> BOOKING PAKET</button> --}}
                                    <h4 style="margin-top: 40px">Deskripsi :</h4>
                                    <p style="text-align: justify">{!! $data->deskripsi !!}</p>
                                    <h4 style="margin-top: 40px">Maps Location :</h4>
                                    <iframe src="https://maps.google.it/maps?q={{ $data->location }}&output=embed"
                                        width="100%" height="350" style="border:1px solid #000; margin-left: 3px"
                                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
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