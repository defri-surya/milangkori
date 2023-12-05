<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('front') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('front') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Bukti Transaksi Pembayaran Tur Gate</h5>
                    </div>

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                {{-- <h4>
                                    <img src="{{ asset('images/nyawiji-modified.png') }}"
                                        class="navbar-brand-img h-100" alt="main_logo"
                                        style="width: 30px; height: 30px"> Nyawiji
                                    <small class="float-right">Tanggal Transaksi :
                                        {{ Carbon\Carbon::parse($data->tgl_transaksi)->isoFormat('D MMMM Y') }}</small>
                                </h4> --}}
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->

                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Dari :
                                <address>
                                    <strong>Pengelola Tur-Gate</strong><br>
                                    {!! $pengelolawisata->alamat !!} <br>
                                    Phone : {{ $pengelolawisata->kontak }}<br>
                                    Email : {{ $user->email }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Kepada : <strong>{{ $customer->nama_lengkap }}</strong><br>
                                <address>
                                    Phone : {{ $customer->no_hp }}<br>
                                    Email : {{ $customer->email }}<br>
                                    Alamat : {!! $customer->alamat !!}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Kode Invoice : {{ $dataCustom->nomor_urut }}</b><br>
                                <br>
                                <b>Status Pembayaran :</b>
                                @if ($dataCustom->status_pembayaran == 'Menunggu Pembayaran')
                                    <span style="color: red">{{ $dataCustom->status_pembayaran }}</span>
                                @endif
                                @if ($dataCustom->status_pembayaran == 'Terbayar')
                                    <span style="color: green">{{ $dataCustom->status_pembayaran }}</span>
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
                                            <th>Nama Paket</th>
                                            <th>Image</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Total Orang</th>
                                            <th>Tanggal Booking</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $paket->nama_paket_wisata }}</td>
                                            <td>
                                                <img src="{{ asset($paket->foto1) }}" alt=""
                                                    style="width: 80px; height: 80px; object-fit: cover">
                                            </td>
                                            <td>Rp. {{ number_format($dataCustom['harga']) }}</td>
                                            <td>{{ $dataCustom['qty'] }}</td>
                                            <td>{{ $dataCustom['total_orang'] }} Orang</td>
                                            <td>{{ \Carbon\Carbon::parse($dataCustom['tgl_booking'])->formatLocalized('%d %B %Y') }}
                                            </td>
                                            <td>Rp. {{ number_format($dataCustom['harga'] * $dataCustom['qty']) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Informasi Pembayaran :</p>

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Segera lakukan pembayaran dalam waktu 2x24 jam. Jika pembayaran dalam waktu 2x24 jam
                                    tidak dilakukan, maka transaksi akan dibatalkan. <br>
                                    Pembayaran melalui Rekening <b>{{ $pengelolawisata->bank }} -
                                        {{ $pengelolawisata->no_rek }}</b>
                                    <br>
                                    <br>
                                    Setelah melakukan pembayaran, kirim bukti pembayaran melalui WhatsApp ke nomor :
                                    <br>
                                    Atau melalui link WhatsApp di bawah ini : <br>
                                    <a href="https://wa.me/{{-- {{ $profile->no_tlp }} --}}?text=Konfirmasi%20pembayaran%20untuk%20kode%20Invoice%20{{-- {{ $data->kode_invoice }} --}}%20"
                                        target="_blank" class="btn btn-success"><i
                                            class="fab fa-whatsapp"></i>&nbsp;WhatsApp</a>
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Total</th>
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
                                <a href="{{ route('datatransaksi.index') }}" rel="noopener"
                                    class="btn btn-primary float-start"><i class="fas fa-arrow-left"></i>
                                    Kembali</a>
                                <a href="{{ route('printInvoiceAdmin', $dataCustom->id) }}" rel="noopener"
                                    target="_blank" class="btn btn-warning float-right"><i class="fas fa-print"></i>
                                    Print Bukti
                                    Transaksi</a>
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

    <!-- jQuery -->
    <script src="{{ asset('front') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('front') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('front') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
