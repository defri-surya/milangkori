<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
    <meta name="viewport" content="width=device-width">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/frontend/images/milangkori_icon.png">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Pop Up */
        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
            z-index: 99;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 5s ease-in-out;
        }

        .popup h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .popup .close:hover {
            color: #06D85F;
        }

        .popup .content {
            max-height: 30%;
            overflow: auto;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 100%;
            }

            .popup {
                width: 70%;
            }
        }
    </style>

    @yield('style')
</head>

<body>
    <!-- BEGIN WRAP -->
    <div id="wrap">

        @include('layouts.backend.components.navbar')

        @include('sweetalert::alert')

        @yield('header')

        @include('layouts.backend.components.sidebar')

        @yield('content')

        <!-- #push do not remove -->
        <div id="push"></div>
        <!-- /#push -->
    </div>
    <!-- END WRAP -->

    <div class="clearfix"></div>

    @include('layouts.backend.components.footer')

    <!-- #helpModal -->
    <div id="helpModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel"
        aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="helpModalLabel"><i class="icon-external-link"></i> Help</h3>
        </div>
        <div class="modal-body">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>
        </div>
        <div class="modal-footer">

            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
    <!-- /#helpModal -->

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
        function submitForm() {
            document.getElementById("myForm").submit();
        }
    </script>

    @stack('script')
</body>

</html>
