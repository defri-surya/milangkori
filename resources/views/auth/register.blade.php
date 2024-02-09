<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Registrasi Customer</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/frontend/images/Job-Sentra-ico.png">
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/css/login.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/backend/assets/magic/magic.css">
</head>

<body>
    <div class="container">
        <div class="text-center">
            <img src="{{ asset('assets') }}/frontend/images/milangkori_logo.png" alt="Metis Logo"
                style="max-width: 350px">
        </div>
        <div class="tab-content">
            <div id="register" class="tab-pane active">
                <form method="POST" action="{{ route('register') }}" class="form-signin">
                    @csrf
                    <p class="muted text-center">
                        Register your account as a Customer
                    </p>

                    <input type="hidden" name="role" value="customer">

                    <input type="text" name="name" placeholder="Username"
                        class="input-block-level @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        style="margin-bottom: 3%" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>Username tidak boleh kosong !</strong>
                        </span>
                    @enderror
                    <input type="email" name="email" placeholder="example@mail.com"
                        class="input-block-level @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        style="margin-bottom: 3%" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Email sudah terdaftar !</strong>
                        </span>
                    @enderror
                    <input type="number" name="no_hp" placeholder="Nomor Telepone"
                        class="input-block-level @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}"
                        style="margin-bottom: 3%" required>
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>Nomor Telephone tidak boleh kosong !</strong>
                        </span>
                    @enderror
                    <input type="password" name="password" placeholder="Password"
                        class="input-block-level @error('password') is-invalid @enderror" value="{{ old('password') }}"
                        required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Password tidak boleh kosong !</strong>
                        </span>
                    @enderror
                    <input id="password-confirm" type="password"
                        class="input-block-level @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" placeholder="Konfirmasi Password"
                        value="{{ old('password_confirmation') }}" required autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>Konfirmasi Password tidak boleh kosong !</strong>
                        </span>
                    @enderror
                    <button class="btn btn-large btn-primary btn-block" type="submit">Daftar</button>
                </form>
            </div>
        </div>
        <div class="text-center">
            <ul class="inline">
                {{-- <li><a class="muted" href="{{ route('password.request') }}" data-toggle="tab">Forgot Password</a>
                </li> --}}
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
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
