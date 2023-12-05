<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - {{ $invoice->nomor_urut }}</title>

    <style>
        * {
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: #FFF;
            font-family: 'Roboto', sans-serif;
            background-image: url('');
            background-repeat: repeat-y;
            background-size: 100%;
        }

        ::selection {
            background: #f31544;
            color: #FFF;
        }

        ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        h1 {
            font-size: 1.5em;
            color: #222;
        }

        h2 {
            font-size: .9em;
        }

        h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        p {
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #invoiceholder {
            width: 100%;
            hieght: 100%;
            padding-top: 50px;
        }

        #invoice {
            position: relative;
            top: -290px;
            margin: 0 auto;
            width: 700px;
            background: #FFF;
        }

        [id*='invoice-'] {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
            padding: 30px;
        }

        #invoice-top {
            min-height: 120px;
        }

        #invoice-mid {
            min-height: 120px;
        }

        #invoice-bot {
            min-height: 250px;
        }

        .logo {
            float: left;
            height: 60px;
            width: 60px;
            background: url({{ $base64Comp }}) no-repeat;
            background-size: 60px 60px;
        }

        .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url({{ $base64Client }}) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        .info {
            display: block;
            float: left;
            margin-left: 20px;
        }

        .title {
            float: right;
        }

        .title p {
            text-align: right;
        }

        #project {
            margin-left: 52%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 5px 0 5px 15px;
            border: 1px solid #EEE
        }

        .tabletitle {
            padding: 5px;
            background: #EEE;
        }

        .service {
            border: 1px solid #EEE;
        }

        .item {
            width: 25%;
        }

        .itemtext {
            font-size: .9em;
        }

        #legalcopy {
            margin-top: 30px;
        }

        form {
            float: right;
            margin-top: 30px;
            text-align: right;
        }


        .effect2 {
            position: relative;
        }

        .effect2:before,
        .effect2:after {
            z-index: -1;
            position: absolute;
            content: "";
            bottom: 15px;
            left: 10px;
            width: 50%;
            top: 80%;
            max-width: 300px;
            background: #777;
            -webkit-box-shadow: 0 15px 10px #777;
            -moz-box-shadow: 0 15px 10px #777;
            box-shadow: 0 15px 10px #777;
            -webkit-transform: rotate(-3deg);
            -moz-transform: rotate(-3deg);
            -o-transform: rotate(-3deg);
            -ms-transform: rotate(-3deg);
            transform: rotate(-3deg);
        }

        .effect2:after {
            -webkit-transform: rotate(3deg);
            -moz-transform: rotate(3deg);
            -o-transform: rotate(3deg);
            -ms-transform: rotate(3deg);
            transform: rotate(3deg);
            right: 10px;
            left: auto;
        }

        .legal {
            width: 70%;
        }
    </style>
</head>

<body>
    <div id="invoiceholder">
        <div id="invoice-top">
            <!-- Logo Nuswatrip -->
            <div class="logo"></div>

            <!--End Info-->
            <div class="title">
                <h1>Invoice #{{ $invoice->nomor_urut }}</h1>
                @php
                    $tgl1 = $invoice->tgl_transaksi;
                    $date1 = Carbon\Carbon::parse($tgl1);
                    $formattedDate1 = $date1->locale('id')->translatedFormat('l, j F Y');
                @endphp
                <h4>Transaction Date : {{ $formattedDate1 }}</h4>
            </div>
            <!--End Title-->
        </div>
        <!--End InvoiceTop-->

        <div id="invoice-mid">
            <div class="clientlogo"></div>
            <div class="info">
                <h2>Client Information</h2>
                <p>{{ $customer->nama_lengkap }}</br>
                    {{ $customer->email }}</br>
                    {{ $customer->no_hp }}
                </p>
            </div>

            <div id="project">
                <h2>Payment Status</h2>
                <p>
                    @if ($invoice->status_pembayaran == 'Menunggu Pembayaran')
                        <span style="color: orange">{{ $invoice->status_pembayaran }}</span>
                    @endif
                    @if ($invoice->status_pembayaran == 'Terbayar')
                        <span style="color: green">{{ $invoice->status_pembayaran }}</span>
                    @endif
                    @if ($invoice->status_pembayaran == 'Gagal')
                        <span style="color: red">{{ $invoice->status_pembayaran }}</span>
                    @endif
                </p>
            </div>

        </div>
        <!--End Invoice Mid-->

        <div id="invoice-bot">
            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="Hours">
                        </td>
                        <td class="item">
                            <h2>Item</h2>
                        </td>
                        <td class="item">
                            <h2>Harga</h2>
                        </td>
                        <td class="Hours">
                            <h2>Quantity</h2>
                        </td>
                        <td class="Rate">
                            <h2>Participant</h2>
                        </td>
                        <td class="subtotal">
                            <h2>Sub-total</h2>
                        </td>
                    </tr>

                    @foreach ($data as $item)
                        @php
                            // Convert Image to base64
                            $path = public_path($item->paketWisata->foto1);
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $img = file_get_contents($path);
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
                        @endphp
                        <tr class="service">
                            <td class="tableitem">
                                <img src="{{ $base64 }}" alt="" style="width: 60px; height: 60px;">
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $item->paketWisata->nama_paket_wisata }}</p>
                                <p class="itemtext">
                                    {{ $item->pengelola->nama_pengelola_wisata }}</p>
                            </td>
                            @if ($item->paketWisata['harga_satuan_paket'] == 'Personal')
                                <td class="tableitem">
                                    <p class="itemtext">{{ $item->paketWisata->harga }} / Orang</p>
                                </td>
                            @else
                                <td class="tableitem">
                                    <p class="itemtext">{{ $item->paketWisata->harga }} / Group</p>
                                </td>
                            @endif
                            <td class="tableitem">
                                <p class="itemtext">{{ $item['qty'] }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $item['total_orang'] }} Orang</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">Rp. {{ number_format($item['harga'] * $item['qty']) }}</p>
                            </td>
                        </tr>
                    @endforeach

                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="Rate">
                            <h2>Total</h2>
                        </td>
                        <td class="payment">
                            <h2>Rp. {{ number_format($totalharga) }}</h2>
                        </td>
                    </tr>

                </table>
            </div>
            <!--End Table-->

            <div id="legalcopy">
                <p class="legal"><strong>Terimakasih Telah Melakukan Booking Paket Wisata!</strong>  Segera lakukan
                    pembayaran dalam waktu 2x24 jam. Jika dalam waktu 2x24 jam pembayaran
                    tidak dilakukan, maka transaksi akan dibatalkan.
                </p>
                <br>
                @php
                    use Carbon\Carbon;
                    
                    $tigaHariSetelahIni = Carbon::now()
                        ->addDays(3)
                        ->locale('id') // set locale ke Indonesia
                        ->translatedFormat('l, j F Y'); // format tanggal
                @endphp
                <p class="legal"><strong>Batas Pembayaran : {{ $tigaHariSetelahIni }}</strong>
                </p>
            </div>

        </div>
        <!--End InvoiceBot-->
    </div>
    <!--End Invoice-->
    </div><!-- End Invoice Holder-->
</body>

</html>
