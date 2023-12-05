<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reset Password</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/backend/assets/img/JobSentra.png">
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/login.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/magic/magic.css">
</head>

<body>
    <div class="container">
        <div class="text-center">
            <img src="{{ asset('assets') }}/frontend/images/nuswatrip_logo.png" alt="Metis Logo" style="max-width: 350px">
        </div>
        <div class="tab-content">
            <div id="login" class="tab-pane active">
                <form method="POST" action="{{ route('password.email') }}" class="form-signin">
                    @csrf
                    <p class="muted text-center">
                        Reset your password
                    </p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input type="email" name="email" placeholder="example@mail.com"
                        class="input-block-level @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        style="margin-bottom: 3%">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Email tidak boleh kosong !</strong>
                        </span>
                    @enderror
                    <button class="btn btn-large btn-primary btn-block" type="submit">Send Password Reset Link</button>
                </form>
            </div>
        </div>


    </div> <!-- /container -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write(
            '<script src="{{ asset('assets') }}/backend/assets/js/vendor/jquery-1.10.1.min.js"><\/script>')
    </script>
    <script type="text/javascript" src="{{ asset('assets') }}/backend/assets/js/vendor/bootstrap.min.js"></script>

    <script>
        $('.inline li > a').click(function() {
            var activeForm = $(this).attr('href') + ' > form';
            //console.log(activeForm);
            $(activeForm).addClass('magictime swap');
            //set timer to 1 seconds, after that, unload the magic animation
            setTimeout(function() {
                $(activeForm).removeClass('magictime swap');
            }, 1000);
        });
    </script>
</body>

</html>


{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
