@extends('layouts.backend.master')

@section('title', 'Home | Detail Transaksi')

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
                                    <h5 style="font-size: large">
                                        &nbsp;{{ GoogleTranslate::trans('Detail Transaksi', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <div class="toolbar">
                                        <a href="{{ route('printTransaksi', $data->id) }}" rel="tooltip"
                                            data-placement="bottom" class="btn btn-primary" target="_blank">
                                            <i class="fas fa-print"></i>
                                            {{ GoogleTranslate::trans('Cetak', session()->get('language') ?? 'id') }}
                                        </a>
                                    </div>
                                    @if ($data->status_lanjutan != 'Selesai')
                                        <div class="toolbar">
                                            <form action="{{ route('finishTransaksi', $data->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status_lanjutan" value="Selesai">
                                                <button type="submit" rel="tooltip" data-placement="bottom"
                                                    class="btn btn-success">
                                                    <i class="fas fa-check"></i>
                                                    {{ GoogleTranslate::trans('Selesai', session()->get('language') ?? 'id') }}
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                    <div class="toolbar">
                                        <a href="{{ route('indexTransaksi') }}" rel="tooltip" data-placement="bottom"
                                            class="btn btn-defualt">
                                            <i class="fas fa-arrow-left"></i>
                                            {{ GoogleTranslate::trans('Kembali', session()->get('language') ?? 'id') }}
                                        </a>
                                    </div>
                                </header>
                                <div class="body">
                                    <h5 style="font-size: large">
                                        {{ GoogleTranslate::trans('Kode Invoice', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <p>
                                        <b>{{ $data->nomor_urut }}</b>
                                    </p>
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Tanggal Booking', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <p>
                                        <b>{{ \Carbon\Carbon::parse($data['tgl_booking'])->formatLocalized('%d %B %Y') }}</b>
                                    </p>
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Status Pembayaran', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <p>
                                        @if ($data->status_pembayaran == 'Menunggu Pembayaran')
                                            <b
                                                style="color:orange">{{ GoogleTranslate::trans($data->status_pembayaran, session()->get('language') ?? 'id') }}</b>
                                            <form action="{{ route('konfirmbayarTransaksi', $data->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status_pembayaran" value="Terbayar">
                                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                                                    {{ GoogleTranslate::trans('Konfirmasi Pembayaran', session()->get('language') ?? 'id') }}
                                                </button>
                                            </form>
                                        @endif
                                        @if ($data->status_pembayaran == 'Terbayar')
                                            <b
                                                style="color:green">{{ GoogleTranslate::trans($data->status_pembayaran, session()->get('language') ?? 'id') }}</b>
                                        @endif
                                        @if ($data->status_pembayaran == 'Gagal')
                                            <b
                                                style="color:red">{{ GoogleTranslate::trans($data->status_pembayaran, session()->get('language') ?? 'id') }}</b>
                                        @endif
                                    </p>
                                    <br>

                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Informasi Customer', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <hr>
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Nama Lengkap', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <p>
                                        {{ $custom->nama_lengkap }}
                                    </p>
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Email', session()->get('language') ?? 'id') }}</h5>
                                    <p>
                                        {{ $custom->email }}
                                    </p>
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Nomor Telepon', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <p>
                                        {{ $custom->no_hp }}
                                    </p>
                                    <br>

                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Informasi Paket Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <hr>
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Nama Paket Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <p>
                                        {{ GoogleTranslate::trans($paket->nama_paket_wisata, session()->get('language') ?? 'id') }}
                                    </p>
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Jenis Paket Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <p>
                                        {{ GoogleTranslate::trans($paket->jenis_paket_wisata, session()->get('language') ?? 'id') }}
                                    </p>
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Quantity', session()->get('language') ?? 'id') }}</h5>
                                    <p>
                                        {{ $data->qty }}
                                        {{ GoogleTranslate::trans('Paket', session()->get('language') ?? 'id') }}
                                    </p>
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Total Orang', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <p>
                                        {{ $data->total_orang }}
                                        {{ GoogleTranslate::trans('Orang', session()->get('language') ?? 'id') }}
                                    </p>
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Total Harga', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <p>
                                        Rp. {{ number_format($data->harga) }}
                                    </p>
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
    </div>
@endsection
