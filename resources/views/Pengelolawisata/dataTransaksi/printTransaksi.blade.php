<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Cetak Transaksi</title>
    <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
    <meta name="viewport" content="width=device-width">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/frontend/images/Job-Sentra-ico.png">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/bootstrap-responsive.min.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/Font-awesome/css/all.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/calendar.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/DT_bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/responsive-tables.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/prettify.css" />
    <link type="text/css" rel="stylesheet"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/flick/jquery-ui.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/jquery.tagsinput.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/chosen/chosen/chosen.css" />

    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets') }}/backend/assets/uniform/themes/default/css/uniform.default.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/colorpicker.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/timepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/datepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/bootstrap-toggle-buttons.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/theme.css">

    <script type="text/javascript"
        src="{{ asset('assets') }}/backend/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('ckeditor') }}/ckeditor.js"></script>
    <link href="{{ asset('assets') }}/backend/assets/css/select2.min.css" rel="stylesheet" />

    @yield('style')
</head>

<body>
    <!-- BEGIN WRAP -->
    <!-- .outer -->
    <div class="container-fluid outer">
        <div class="row-fluid">
            <!-- .inner -->
            <div class="span12 inner">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <header>
                                <h5 style="font-size: large">&nbsp;Detail Transaksi</h5>
                            </header>
                            <div class="body">
                                <h5 style="font-size: large">Kode Invoice</h5>
                                <p>
                                    <b>{{ $data->nomor_urut }}</b>
                                </p>
                                <h5 style="font-size: large; margin-top: 25px">Tanggal Booking</h5>
                                <p>
                                    <b>{{ \Carbon\Carbon::parse($data['tgl_booking'])->formatLocalized('%d %B %Y') }}</b>
                                </p>
                                <h5 style="font-size: large; margin-top: 25px">Status Pembayaran</h5>
                                <p>
                                    @if ($data->status_pembayaran == 'Menunggu Pembayaran')
                                        <b style="color:orange">{{ $data->status_pembayaran }}</b>
                                        <form action="" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status_pembayaran" value="Terbayar">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                                                Konfirmasi Pembayaran</button>
                                        </form>
                                    @endif
                                    @if ($data->status_pembayaran == 'Terbayar')
                                        <b style="color:green">{{ $data->status_pembayaran }}</b>
                                    @endif
                                    @if ($data->status_pembayaran == 'Gagal')
                                        <b style="color:red">{{ $data->status_pembayaran }}</b>
                                    @endif
                                </p>

                                <h5 style="font-size: large; margin-top: 30px">Informasi Customer</h5>
                                <hr>
                                <h5 style="font-size: large; margin-top: 25px">Nama Lengkap</h5>
                                <p>
                                    {{ $custom->nama_lengkap }}
                                </p>
                                <h5 style="font-size: large; margin-top: 25px">Email</h5>
                                <p>
                                    {{ $custom->email }}
                                </p>
                                <h5 style="font-size: large; margin-top: 25px">Nomor Telepon</h5>
                                <p>
                                    {{ $custom->no_hp }}
                                </p>

                                <h5 style="font-size: large; margin-top: 30px">Informasi Paket Wisata</h5>
                                <hr>
                                <h5 style="font-size: large; margin-top: 25px">Nama Paket Wisata</h5>
                                <p>
                                    {{ $paket->nama_paket_wisata }}
                                </p>
                                <h5 style="font-size: large; margin-top: 25px">Jenis Paket Wisata</h5>
                                <p>
                                    {{ $paket->jenis_paket_wisata }}
                                </p>
                                <h5 style="font-size: large; margin-top: 25px">QTY</h5>
                                <p>
                                    {{ $data->qty }} Paket
                                </p>
                                <h5 style="font-size: large; margin-top: 25px">Total Orang</h5>
                                <p>
                                    {{ $data->total_orang }} Orang
                                </p>
                                <h5 style="font-size: large; margin-top: 25px">Total Harga</h5>
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
    <!-- #push do not remove -->
    <div id="push"></div>
    <!-- /#push -->
    <!-- END WRAP -->

    <div class="clearfix"></div>

    <x-footerComp>
        {{ $pengelola->nama_pengelola_wisata }}
    </x-footerComp>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write(
            '<script src="{{ asset('assets') }}/backend/assets/js/vendor/jquery-1.10.1.min.js"><\/script>')
    </script>



    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        window.jQuery.ui || document.write(
            '<script src="{{ asset('assets') }}/backend/assets/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')
    </script>


    <script src="{{ asset('assets') }}/backend/assets/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/backend/assets/js/lib/jquery.mousewheel.js"></script>

    <script src="{{ asset('assets') }}/backend/assets/js/lib/jquery.sparkline.min.js"></script>

    <script src="{{ asset('assets') }}/backend/assets/flot/jquery.flot.js"></script>
    <script src="{{ asset('assets') }}/backend/assets/flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('assets') }}/backend/assets/flot/jquery.flot.selection.js"></script>
    <script src="{{ asset('assets') }}/backend/assets/flot/jquery.flot.resize.js"></script>

    <script src="{{ asset('assets') }}/backend/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
    <script src="{{ asset('assets') }}/backend/assets/js/lib/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/DT_bootstrap.js"></script>
    <script src="{{ asset('assets') }}/backend/assets/js/lib/responsive-tables.js"></script>
    <script type="text/javascript">
        $(function() {
            metisTable();
        });
    </script>

    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/prettify.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/jquery.dualListBox-1.3.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/bootstrap-inputmask.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/jquery.autosize-min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/jquery.inputlimiter.1.3.1.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/jquery.tagsinput.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/chosen/chosen/chosen.jquery.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/uniform/jquery.uniform.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/jquery.validVal-4.3.2.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/date.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/daterangepicker.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/lib/jquery.toggle.buttons.js"></script>

    <script src="{{ asset('assets') }}/backend/assets/js/main.js"></script>

    <script>
        $(function() {
            formGeneral();
        });
    </script>

    <script type="text/javascript">
        $(function() {
            dashboard();
        });
    </script>

    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
