<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ GoogleTranslate::trans('Invoice', session()->get('language') ?? 'id') }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('front') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('front') }}/dist/css/adminlte.min.css">
    <!-- Icon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/frontend/images/nuswatrip_icon.png">
</head>

<body class="hold-transition sidebar-mini">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i>
                            {{ GoogleTranslate::trans('Bukti Transaksi Pembayaran', session()->get('language') ?? 'id') }}
                        </h5>
                    </div>

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->

                        <div class="row invoice-info">
                            <!-- /.col -->
                            <div class="col-sm-8 invoice-col">
                                {{ GoogleTranslate::trans('Kepada :', session()->get('language') ?? 'id') }}
                                <strong>{{ GoogleTranslate::trans($customer->name, session()->get('language') ?? 'id') }}</strong><br>
                                <address>
                                    {{ GoogleTranslate::trans('Nomor Telepon :', session()->get('language') ?? 'id') }}
                                    {{ $customer->no_hp }}<br>
                                    {{ GoogleTranslate::trans('Email :', session()->get('language') ?? 'id') }}
                                    {{ $customer->email }}<br>
                                    {{ GoogleTranslate::trans('Alamat :', session()->get('language') ?? 'id') }}
                                    {!! GoogleTranslate::trans($customer->alamat, session()->get('language') ?? 'id') !!}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>{{ GoogleTranslate::trans('Kode Invoice :', session()->get('language') ?? 'id') }}
                                    {{ $invoice->nomor_urut }}</b><br>
                                @php
                                    $tgl1 = $invoice->tgl_transaksi;
                                    $date1 = Carbon\Carbon::parse($tgl1);
                                    $formattedDate1 = $date1->locale('id')->translatedFormat('l, j F Y');
                                @endphp
                                <b>{{ GoogleTranslate::trans('Tanggal Transaksi :', session()->get('language') ?? 'id') }}
                                    {{ $formattedDate1 }}</b><br>
                                <br>
                                <b>{{ GoogleTranslate::trans('Status Pembayaran', session()->get('language') ?? 'id') }}</b>
                                @if ($invoice->status_pembayaran == 'Menunggu Pembayaran')
                                    <span
                                        style="color: red">{{ GoogleTranslate::trans($invoice->status_pembayaran, session()->get('language') ?? 'id') }}</span>
                                @endif
                                @if ($invoice->status_pembayaran == 'Terbayar')
                                    <span
                                        style="color: green">{{ GoogleTranslate::trans($invoice->status_pembayaran, session()->get('language') ?? 'id') }}</span>
                                @endif
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ GoogleTranslate::trans('Nama Paket', session()->get('language') ?? 'id') }}
                                            </th>
                                            <th>{{ GoogleTranslate::trans('Gambar', session()->get('language') ?? 'id') }}
                                            </th>
                                            <th>{{ GoogleTranslate::trans('Harga', session()->get('language') ?? 'id') }}
                                            </th>
                                            <th>{{ GoogleTranslate::trans('Quantity', session()->get('language') ?? 'id') }}
                                            </th>
                                            <th>{{ GoogleTranslate::trans('Total Peserta', session()->get('language') ?? 'id') }}
                                            </th>
                                            <th>{{ GoogleTranslate::trans('Tanggal Booking', session()->get('language') ?? 'id') }}
                                            </th>
                                            <th>{{ GoogleTranslate::trans('Sub Total', session()->get('language') ?? 'id') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $item)
                                        @php
                                            $tgl1 = $item['tgl_booking'];
                                            $date1 = Carbon\Carbon::parse($tgl1);
                                            $formattedDate1 = $date1->locale('id')->translatedFormat('l, j F Y');
                                        @endphp
                                        <tbody>
                                            <tr>
                                                <td>{{ GoogleTranslate::trans($item->paketWisata->nama_paket_wisata, session()->get('language') ?? 'id') }}
                                                    <br>
                                                    {{ GoogleTranslate::trans('Dari :', session()->get('language') ?? 'id') }}
                                                    {{ $item->pengelola->nama_pengelola_wisata }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset($item->paketWisata->foto1) }}" alt=""
                                                        style="width: 80px; height: 80px; object-fit: cover">
                                                </td>
                                                @if ($item->paketWisata['harga_satuan_paket'] == 'Personal')
                                                    <td>Rp. {{ number_format($item->paketWisata['harga']) }} /
                                                        {{ GoogleTranslate::trans('Orang', session()->get('language') ?? 'id') }}
                                                    </td>
                                                @else
                                                    <td>Rp. {{ number_format($item->paketWisata['harga']) }} /
                                                        {{ GoogleTranslate::trans('Grup', session()->get('language') ?? 'id') }}
                                                    </td>
                                                @endif
                                                <td>{{ $item['qty'] }}</td>
                                                <td>{{ $item['total_orang'] }}
                                                    {{ GoogleTranslate::trans('Orang', session()->get('language') ?? 'id') }}
                                                </td>
                                                <td>{{ $formattedDate1 }}
                                                </td>
                                                <td>Rp. {{ number_format($item['harga'] * $item['qty']) }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">
                                    {{ GoogleTranslate::trans('Informasi Pembayaran :', session()->get('language') ?? 'id') }}
                                </p>

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    {{ GoogleTranslate::trans(
                                        'Segera lakukan pembayaran dalam waktu 2x24 jam. Jika dalam waktu 2x24 jam pembayaran
                                                                                                                                                                                    tidak dilakukan, maka transaksi akan dibatalkan.',
                                        session()->get('language') ?? 'id',
                                    ) }}
                                    <br>
                                    {{ GoogleTranslate::trans('Setelah melakukan pembayaran, kirim bukti pembayaran melalui WhatsApp ke nomor :', session()->get('language') ?? 'id') }}
                                    <br>
                                    <b>08123456789</b>
                                    <br>
                                    {{ GoogleTranslate::trans('Atau melalui link WhatsApp di bawah ini :', session()->get('language') ?? 'id') }}
                                    <br>
                                    <a href="https://wa.me/{{-- {{ $profile->no_tlp }} --}}?text=Konfirmasi%20pembayaran%20untuk%20kode%20Invoice%20{{-- {{ $data->kode_invoice }} --}}%20"
                                        target="_blank" class="btn btn-success"><i
                                            class="fab fa-whatsapp"></i>&nbsp;WhatsApp</a>
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                @php
                                    use Carbon\Carbon;
                                    
                                    $tigaHariSetelahIni = Carbon::now()
                                        ->addDays(2)
                                        ->locale('id') // set locale ke Indonesia
                                        ->translatedFormat('l, j F Y'); // format tanggal
                                @endphp
                                <p class="lead">
                                    {{ GoogleTranslate::trans('Batas Pembayaran', session()->get('language') ?? 'id') }}
                                    <b>{{ $tigaHariSetelahIni }}</b>
                                </p>
                                <p class="lead">
                                    <b>
                                        {{ GoogleTranslate::trans(
                                            'Cetak invoice sebagai bukti bahwa anda telah melakukan booking paket
                                                                                                                                                                dan lanjutkan untuk melakukan pembayaran.',
                                            session()->get('language') ?? 'id',
                                        ) }}
                                    </b>
                                </p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>{{ GoogleTranslate::trans('Total Harga', session()->get('language') ?? 'id') }}
                                            </th>
                                            <td>Rp. {{ number_format($totalharga) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print mt-5">
                            <div class="col-12">
                                <a href="{{ route('home') }}" rel="noopener" class="btn btn-primary float-start"><i
                                        class="fas fa-arrow-left"></i>
                                    {{ GoogleTranslate::trans('Kembali', session()->get('language') ?? 'id') }}</a>
                                <a href="{{ route('printInvoice') }}" rel="noopener" target="_blank"
                                    class="btn btn-warning float-right"><i class="fas fa-print"></i>
                                    {{ GoogleTranslate::trans('Cetak Invoice', session()->get('language') ?? 'id') }}</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    {{-- <script>
        setTimeout(function() {
            window.location.href = "{{ route('home') }}";
        }, 120000); // 120000 milidetik = 120 detik
    </script> --}}

    <!-- jQuery -->
    <script src="{{ asset('front') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('front') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('front') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
