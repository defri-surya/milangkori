@extends('layouts.backend.master')

@section('title', 'Home | Customer')

@section('style')
    <style>
        /* Style tab links */
        .tablink {
            background-color: #555;
            color: black;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 25%;

        }

        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
            color: black;
            display: none;
            height: 100%;
        }

        @media only screen and (max-width: 400px) {

            /*Tabel Responsive 2*/
            .responsive-2 {
                width: 100%;
            }

            .responsive-2 thead {
                display: none;
            }

            .responsive-2 td {
                display: block;
                /* text-align: right; */
                border-right: 1px solid #e1edff;
            }

            .responsive-2 td::before {
                float: left;
                text-transform: uppercase;
                font-weight: bold;
                content: attr(data-header);
            }
        }
    </style>
@endsection

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
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Ada', session()->get('language') ?? 'id') }}
                                        {{ $count }}
                                        {{ GoogleTranslate::trans(
                                            'Produk di keranjang belanja Anda, Ayo segera lakukan
                                                                                                                                                                                                                                                                                                                                checkout !',
                                            session()->get('language') ?? 'id',
                                        ) }}
                                    </h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <div class="table-responsive cart_info">
                                        <table class="table table-bordered table-condensed table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <td class="image">
                                                        {{ GoogleTranslate::trans('Gambar', session()->get('language') ?? 'id') }}
                                                    </td>
                                                    <td class="description">
                                                        {{ GoogleTranslate::trans('Nama Paket Wisata', session()->get('language') ?? 'id') }}
                                                    </td>
                                                    <td class="description">
                                                        {{ GoogleTranslate::trans('Jenis Paket', session()->get('language') ?? 'id') }}
                                                    </td>
                                                    <td class="price">
                                                        {{ GoogleTranslate::trans('Harga', session()->get('language') ?? 'id') }}
                                                    </td>
                                                    <td class="price">
                                                        {{ GoogleTranslate::trans('Total Harga', session()->get('language') ?? 'id') }}
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($cart as $item)
                                                    <tr>
                                                        <input type="hidden" name="booking_id"
                                                            value="{{ $item->paket_wisata_id }}">
                                                        <td class="cart_product">
                                                            <img src="{{ asset($item->foto1) }}" alt=""
                                                                style="width: 80px; height: 80px; object-fit: cover">
                                                        </td>
                                                        <td class="cart_description">
                                                            <p>
                                                                <strong>{{ GoogleTranslate::trans($item->nama_paket_wisata, session()->get('language') ?? 'id') }}</strong>
                                                            </p>
                                                        </td>
                                                        <td class="cart_description">
                                                            <p>
                                                                <strong>{{ GoogleTranslate::trans($item->jenis_paket_wisata, session()->get('language') ?? 'id') }}
                                                                    -
                                                                    {{ GoogleTranslate::trans($item->paketWisata->harga_satuan_paket, session()->get('language') ?? 'id') }}</strong>
                                                            </p>
                                                        </td>
                                                        <td class="cart_total">
                                                            <p class="cart_total_price" style="font-size: 20px">Rp.
                                                                {{ number_format($item->harga) }}
                                                            </p>
                                                        </td>
                                                        <td class="cart_total">
                                                            <p class="cart_total_price" style="font-size: 20px">Rp.
                                                                <input type="hidden" name="total_harga"
                                                                    value="{{ number_format($item['harga'] * $item['qty']) }}">
                                                                {{ number_format($item['harga'] * $item['qty']) }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="10" class="text-center">
                                                            <p><i>{{ GoogleTranslate::trans('Keranjang Belanja Masih Kosong', session()->get('language') ?? 'id') }}</i>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                            <tr class="out_button_area">
                                                <td colspan="10">
                                                    @if ($count > 0)
                                                        <a href="{{ route('listkeranjangbelanja') }}"
                                                            class="btn btn-default check_out">{{ GoogleTranslate::trans('Menuju Keranjang Belanja', session()->get('language') ?? 'id') }}</a>
                                                    @else
                                                        <a href="{{ route('welcome') }}"
                                                            class="btn btn-default check_out">{{ GoogleTranslate::trans('Mulai Belanja', session()->get('language') ?? 'id') }}</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
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

        <!-- .outer -->
        <div class="container-fluid outer">
            <div class="row-fluid">
                <!-- .inner -->
                <div class="span12 inner">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <header>
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Menunggu Pembayaran', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>

                                <div id="collapse4" class="body">
                                    <div class="table-responsive cart_info">
                                        <table class="table table-bordered table-condensed table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <td class="image">
                                                        {{ GoogleTranslate::trans('Gambar', session()->get('language') ?? 'id') }}
                                                    </td>
                                                    <td class="description">
                                                        {{ GoogleTranslate::trans('Nama Paket Wisata', session()->get('language') ?? 'id') }}
                                                    </td>
                                                    <td class="description">
                                                        {{ GoogleTranslate::trans('Jenis Paket', session()->get('language') ?? 'id') }}
                                                    </td>
                                                    <td class="price">
                                                        {{ GoogleTranslate::trans('Total Harga', session()->get('language') ?? 'id') }}
                                                    </td>
                                                    <td class="price"></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($waitingList as $item)
                                                    <tr>
                                                        <td class="cart_product">
                                                            <img src="{{ asset($item->paketWisata->foto1) }}"
                                                                alt=""
                                                                style="width: 80px; height: 80px; object-fit: cover">
                                                        </td>
                                                        <td class="cart_description">
                                                            <p>
                                                                <strong>{{ GoogleTranslate::trans($item->paketWisata->nama_paket_wisata, session()->get('language') ?? 'id') }}</strong>
                                                            </p>
                                                        </td>
                                                        <td class="cart_description">
                                                            <p>
                                                                <strong>{{ GoogleTranslate::trans($item->paketWisata->jenis_paket_wisata, session()->get('language') ?? 'id') }}
                                                                    -
                                                                    {{ GoogleTranslate::trans($item->paketWisata->harga_satuan_paket, session()->get('language') ?? 'id') }}</strong>
                                                            </p>
                                                        </td>
                                                        <td class="cart_total">
                                                            <p class="cart_total_price" style="font-size: 20px">Rp.
                                                                <input type="hidden" name="total_harga"
                                                                    value="{{ number_format($item['harga'] * $item['qty']) }}">
                                                                {{ number_format($item['harga'] * $item['qty']) }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('showTransaksiCustomer', $item->id) }}"
                                                                class="btn btn-default"><i
                                                                    class="fas fa-eye"></i>&nbsp;{{ GoogleTranslate::trans('Detail', session()->get('language') ?? 'id') }}</a>
                                                            <a href="https://wa.me/08882466344?text=Konfirmasi%20pembayaran%20untuk%20kode%20Invoice%20{{ $item->nomor_urut }}%20"
                                                                target="_blank" class="btn btn-success"><i
                                                                    class="fab fa-whatsapp"></i>&nbsp;{{ GoogleTranslate::trans('Konfirmasi Pembayaran', session()->get('language') ?? 'id') }}</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="10" class="text-center">
                                                            <p><i>{{ GoogleTranslate::trans('Tidak ada riwayat transaksi', session()->get('language') ?? 'id') }}</i>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
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

@push('script')
    <script>
        function openPage(pageName, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
@endpush
