<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Verify Your Email First !</title>
    <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
    <meta name="viewport" content="width=device-width">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets') }}/backend/assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/Font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/error.css" />
</head>

<body>
    <!-- #main -->
    <div id="main">
        <!-- .container-fluid -->
        <div class="container-fluid">
            <!-- .row-fluid -->
            <div class="row-fluid">
                <!-- .span12 -->
                <div class="span12 logo">
                    <h1 style="color: #FFF; font-size: 32px">Verifikasi alamat email anda!</h1>
                </div>
                <!-- /.span12 -->
            </div>
            <!-- /.row-fluid -->
            <!-- .row-fluid -->
            <div class="row-fluid">
                <!-- .span6 -->
                <div class="span6 offset3">
                    @if (session('resent'))
                        <div class="alert alert-success">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email anda.') }}
                        </div>
                    @endif
                    <p class="lead" style="color: #FFF">Sebelum melanjutkan, harap periksa email anda untuk melakukan
                        verifikasi
                        akun.</p>
                    <p class="lead" style="color: #FFF">Jika anda tidak menerima email</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}"
                        style="margin-top: 10px">
                        @csrf
                        <button type="submit" class="btn btn-danger p-0 m-0 align-baseline">
                            {{ __('Klik di sini untuk kirim ulang') }}</button>
                    </form>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                        class="btn btn-info">Kembali</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <!-- /.span6 -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#main -->
</body>

</html>
