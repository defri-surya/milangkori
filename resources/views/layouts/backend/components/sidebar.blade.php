<!-- BEGIN LEFT  -->
<div id="left">
    <!-- .user-media -->
    @php
        $customer = App\Customer::where('user_id', auth()->user()->id)->first();
        $data = App\Pengelolawisata::where('user_id', auth()->user()->id)->first();
    @endphp
    @can('isAdmin')
        <div class="media user-media hidden-phone">
            <img src="{{ asset('assets') }}/frontend/images/icons8-user-64.png" alt=""
                class="media-object img-polaroid user-img">
            <div class="media-body hidden-tablet">
                <h5 class="media-heading">
                    {{ auth()->user()->name }}
                </h5>
            </div>
        </div>
    @endcan
    @can('isPengelolawisata')
        <div class="media user-media hidden-phone">
            @if ($data == null || $data->logo == null)
                <img src="{{ asset('assets') }}/frontend/images/icons8-user-64.png" alt=""
                    class="media-object img-polaroid user-img">
            @else
                <img src="{{ asset($data->logo) }}" alt="" class="media-object img-polaroid user-img">
            @endif
            <div class="media-body hidden-tablet">
                <h5 class="media-heading">
                    @if ($data == null)
                        {{ auth()->user()->name }}
                    @else
                        {{ $data->nama_pengelola_wisata }}
                    @endif
                </h5>
            </div>
        </div>
    @endcan
    @can('isCustomer')
        <div class="media user-media hidden-phone">
            @if ($customer == null || $customer->foto == null)
                <img src="{{ asset('assets') }}/frontend/images/icons8-user-64.png" alt=""
                    class="media-object img-polaroid user-img">
            @else
                <img src="{{ asset($customer->foto) }}" alt="" class="media-object img-polaroid user-img">
            @endif

            <div class="media-body hidden-tablet">
                <h5 class="media-heading">
                    @if ($customer == null)
                        {{ auth()->user()->name }}
                    @else
                        {{ $customer->nama_lengkap }}
                    @endif
                </h5>
            </div>
        </div>
    @endcan
    <!-- /.user-media -->

    <!-- BEGIN MAIN NAVIGATION -->
    <ul id="menu" class="unstyled accordion collapse in">
        @can('isCustomer')
            <li class="accordion-group @if (Request::segment(1) == 'home') active @endif">
                <a href="{{ route('home') }}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                    data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i>
                    {{ GoogleTranslate::trans('Home', session()->get('language') ?? 'id') }}
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == '') active @endif">
                <a href="{{ route('infocv') }}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                    data-target="#component-nav">
                    <i class="icon-tasks icon-large"></i>
                    {{ GoogleTranslate::trans('Profile Customer', session()->get('language') ?? 'id') }}
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'indexTransaksiCustomer') active @endif">
                <a href="{{ route('indexTransaksiCustomer') }}" data-parent="#menu" data-toggle="collapse"
                    class="accordion-toggle" data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i>
                    {{ GoogleTranslate::trans('Data Transaksi', session()->get('language') ?? 'id') }}
                </a>
            </li>
        @endcan
        @can('isPengelolawisata')
            <li class="accordion-group @if (Request::segment(1) == 'home') active @endif">
                <a href="{{ route('home') }}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                    data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i>
                    {{ GoogleTranslate::trans('Home', session()->get('language') ?? 'id') }}
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'Pengelolawisata') active @endif">
                <a href="profilepengelolawisata" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                    data-target="#component-nav">
                    <i class="icon-briefcase icon-large"></i>
                    {{ GoogleTranslate::trans('Profile Pengelola Wisata', session()->get('language') ?? 'id') }}
                </a>
            </li>
            @if ($data != null)
                <li class="accordion-group @if (Request::segment(1) == 'buatpaketwisata') active @endif">
                    <a href="buatpaketwisata" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                        data-target="#component-nav">
                        <i class="icon-tasks icon-large"></i>
                        {{ GoogleTranslate::trans('Buat Paket Wisata', session()->get('language') ?? 'id') }}
                    </a>
                </li>
            @endif
            @php
                $pengelola = App\Pengelolawisata::where('user_id', auth()->user()->id)->first();
            @endphp
            @if ($pengelola != null)
                @php
                    $waitingList0 = App\Transaksi::with('customer', 'paketWisata')
                        ->where('status_lanjutan', 'Proses')
                        ->where('pengelola_wisata_id', $pengelola->id)
                        ->count();
                    $withdraw = App\withdraw::where('status', 'Proses')
                        ->where('pengelolawisata_id', $pengelola->id)
                        ->count();
                @endphp
                <li class="accordion-group @if (Request::segment(1) == 'indexTransaksi') active @endif">
                    <a href="{{ route('indexTransaksi') }}" data-parent="#menu" data-toggle="collapse"
                        class="accordion-toggle" data-target="#dashboard-nav">
                        <i class="icon-dashboard icon-tasks"></i>
                        {{ GoogleTranslate::trans('Data Transaksi', session()->get('language') ?? 'id') }}
                        <span class="badge badge-pill badge-danger"
                            style="background-color: red">{{ $waitingList0 }}</span>
                    </a>
                </li>
            @else
                @php
                    $waitingList = App\Transaksi::with('customer', 'paketWisata')
                        ->where('status_lanjutan', 'Proses')
                        ->where('user_pengelola', auth()->user()->id)
                        ->count();
                @endphp
                <li class="accordion-group @if (Request::segment(1) == 'indexTransaksi') active @endif">
                    <a href="{{ route('indexTransaksi') }}" data-parent="#menu" data-toggle="collapse"
                        class="accordion-toggle" data-target="#dashboard-nav">
                        <i class="icon-dashboard icon-tasks"></i>
                        {{ GoogleTranslate::trans('Data Transaksi', session()->get('language') ?? 'id') }}
                        <span class="badge badge-pill badge-danger"
                            style="background-color: red">{{ $waitingList }}</span>
                    </a>
                </li>
            @endif
            <li class="accordion-group @if (Request::segment(1) == 'withdraw') active @endif">
                <a href="withdraw" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                    data-target="#component-nav">
                    <i class="icon-tasks icon-large"></i>
                    {{ GoogleTranslate::trans('Withdraw', session()->get('language') ?? 'id') }}
                    <span class="badge badge-pill badge-danger" style="background-color: red">{{ $withdraw }}</span>
                </a>
            </li>
        @endcan
        @can('isAdmin')
            @php
                $withdrawAdmin = App\withdraw::where('status', 'Proses')->count();
            @endphp
            <li class="accordion-group @if (Request::segment(1) == 'home') active @endif">
                <a href="{{ route('home') }}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                    data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i>
                    Home
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'datakatagoripekerjaan') active @endif">
                <a href="{{ route('kategoripaketwisata.index') }}" data-parent="#menu" data-toggle="collapse"
                    class="accordion-toggle" data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i> Katagori Paket Wisata
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'datakatagoripekerjaan') active @endif">
                <a href="{{ route('datapaketwisata.index') }}" data-parent="#menu" data-toggle="collapse"
                    class="accordion-toggle" data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i> Data Paket Wisata
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'datakatagoripekerjaan') active @endif">
                <a href="{{ route('datapengelolawisata.index') }}" data-parent="#menu" data-toggle="collapse"
                    class="accordion-toggle" data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i> Data Pengelola Wisata
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'datakatagoripekerjaan') active @endif">
                <a href="{{ route('datacustomer.index') }}" data-parent="#menu" data-toggle="collapse"
                    class="accordion-toggle" data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i> Data Customer
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'datakatagoripekerjaan') active @endif">
                <a href="{{ route('datatransaksi.index') }}" data-parent="#menu" data-toggle="collapse"
                    class="accordion-toggle" data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i> Data Transaksi
                </a>
            </li>
            <li class="accordion-group @if (Request::segment(1) == 'reqwithdrawAdmin') active @endif">
                <a href="reqwithdrawAdmin" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                    data-target="#dashboard-nav">
                    <i class="icon-dashboard icon-home"></i> Permintaan Withdraw
                    <span class="badge badge-pill badge-danger" style="background-color: red">{{ $withdrawAdmin }}</span>
                </a>
            </li>
        @endcan
    </ul>
    <!-- END MAIN NAVIGATION -->

</div>
<!-- END LEFT -->
