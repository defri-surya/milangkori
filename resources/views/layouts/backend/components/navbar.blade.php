<!-- BEGIN TOP BAR -->
<div id="top">
    <!-- .navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="navbar-inner">
            <div class="container-fluid" style="background-color: #FF8C00">
                <a class="brand" href="{{ route('welcome') }}">
                    <img src="{{ asset('assets') }}/frontend/images/milangkori_wht_milang.png" alt=""
                        style="max-width: 200px">
                </a>
                <!-- .topnav -->
                <div class="btn-toolbar topnav">
                    <div class="btn-group">
                        <a class="btn btn-inverse" data-placement="bottom" data-original-title="Logout" rel="tooltip"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="icon-off"></i>
                        </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="btn-toolbar topnav">
                    <div class="btn-group">
                        <a class="btn btn-outline-warning btn-md font-weight-bold login" style="width: 150px;"
                            href="#popup2">
                            {{ GoogleTranslate::trans('Ganti Bahasa', session()->get('language') ?? 'id') }}
                        </a>
                    </div>
                </div>
                <!-- /.topnav -->
            </div>
        </div>
    </div>
    <!-- /.navbar -->
    <div id="popup2" class="overlay">
        <div class="popup">
            <h2>{{ GoogleTranslate::trans('Choose Language', session()->get('language') ?? 'id') }}</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form action="{{ route('welcome') }}" id="myForm">
                    <div>
                        <select class="nav-link" name="language" onchange="submitForm()"
                            style="border-radius: 5px; width: 100%">
                            <option value="id" {{ session()->get('language') == 'id' ? 'selected' : '' }}>
                                Indonesia
                            </option>
                            <option value="en" {{ session()->get('language') == 'en' ? 'selected' : '' }}>
                                English
                            </option>
                            <option value="zh-CN" {{ session()->get('language') == 'zh-CN' ? 'selected' : '' }}>
                                Chinese
                            </option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END TOP BAR -->
