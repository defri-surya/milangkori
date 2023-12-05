<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ GoogleTranslate::trans('Keranjang Belanja', session()->get('language') ?? 'id') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('front') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/price-range.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/main.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/responsive.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- MIDTRANS CLIENT KEY -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-ZIuQ4BWKiqlM1TO0"></script>
</head>

<body>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a
                            href="{{ route('welcome') }}">{{ GoogleTranslate::trans('Home', session()->get('language') ?? 'id') }}</a>
                    </li>
                    <li class="active">
                        {{ GoogleTranslate::trans('Keranjang Belanja', session()->get('language') ?? 'id') }}</li>
                </ol>
            </div>
            <div>
                <ol class="breadcrumb" style="background: #FE980F">
                    <li>
                        <a href="{{ route('welcome') }}" style="color: #FFFFFF; text-decoration: none;">
                            <i
                                class="fas fa-arrow-left">&nbsp;{{ GoogleTranslate::trans('Pilih Paket Wisata Lainnya', session()->get('language') ?? 'id') }}</i>
                        </a>
                    </li>
                </ol>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    @csrf
                    @method('PUT')
                    <thead>
                        <tr class="cart_menu">
                            <td class="image" width="130px">
                                {{ GoogleTranslate::trans('Gambar', session()->get('language') ?? 'id') }}</td>
                            <td class="description">
                                {{ GoogleTranslate::trans('Nama Paket Wisata', session()->get('language') ?? 'id') }}
                            </td>
                            <td class="description">
                                {{ GoogleTranslate::trans('Jenis Paket', session()->get('language') ?? 'id') }}</td>
                            <td class="price">
                                {{ GoogleTranslate::trans('Harga', session()->get('language') ?? 'id') }}</td>
                            <td class="description">
                                {{ GoogleTranslate::trans('Jumlah Paket', session()->get('language') ?? 'id') }}</td>
                            <td class="description">
                                {{ GoogleTranslate::trans('Jumlah Peserta', session()->get('language') ?? 'id') }}</td>
                            <td class="description">
                                {{ GoogleTranslate::trans('Tanggal Booking', session()->get('language') ?? 'id') }}
                            </td>
                            <td class="price">
                                {{ GoogleTranslate::trans('Total Harga', session()->get('language') ?? 'id') }}</td>
                            <td class="price"></td>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    <tbody>
                        @forelse ($cart as $item)
                            <tr>
                                <input type="hidden" name="booking_id" value="{{ $item->paket_wisata_id }}">
                                <td class="cart_product" style="width: 20px">
                                    <img src="{{ asset($item->foto1) }}" alt=""
                                        style="width: 80px; height: 80px;">
                                </td>
                                <td class="cart_description">
                                    <p>
                                        <strong>{{ GoogleTranslate::trans($item->nama_paket_wisata, session()->get('language') ?? 'id') }}</strong>
                                    </p>
                                </td>
                                <td class="cart_description">
                                    <p>
                                        <strong>{{ GoogleTranslate::trans($item->jenis_paket_wisata, session()->get('language') ?? 'id') }}
                                            -
                                            {{ GoogleTranslate::trans($item->paketWisata->harga_satuan_paket, session()->get('language') ?? 'id') }}</strong>
                                    </p>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" style="font-size: 20px">Rp.
                                        {{ number_format($item->paketWisata->harga) }}
                                    </p>
                                </td>
                                <td class="cart_total text-center">
                                    <p>
                                        {{ $item['qty'] }}
                                        <input type="hidden" name="product_id[]"
                                            value="{{ $item['paket_wisata_id'] }}" class="form-control">
                                    </p>
                                </td>
                                @if ($item->paketWisata->harga_satuan_paket == 'Group')
                                    <td class="cart_total text-center">
                                        <p>
                                            {{ $item['jml_org'] }}
                                        </p>
                                    </td>
                                @else
                                    <td class="cart_total text-center">
                                        <p>
                                            {{ $item['jml_org'] }}
                                        </p>
                                    </td>
                                @endif

                                @php
                                    $tgl1 = $item['tgl_booking'];
                                    $date1 = Carbon\Carbon::parse($tgl1);
                                    $formattedDate1 = $date1->locale('id')->translatedFormat('l, j F Y');
                                @endphp

                                <td class="cart_total text-center">
                                    <p>
                                        {{ $formattedDate1 }}
                                    </p>
                                </td>

                                @if ($item->paketWisata->harga_satuan_paket == 'Group')
                                    <td class="cart_total">
                                        <p class="cart_total_price" style="font-size: 20px">Rp.
                                            <input type="hidden" name="total_harga"
                                                value="{{ number_format($item['harga'] * $item['qty']) }}">
                                            {{ number_format($item['harga'] * $item['qty']) }}
                                        </p>
                                    </td>
                                @else
                                    <td class="cart_total">
                                        <p class="cart_total_price" style="font-size: 20px">Rp.
                                            <input type="hidden" name="total_harga"
                                                value="{{ number_format($item->paketWisata->harga * $item['jml_org']) }}">
                                            {{ number_format($item->paketWisata->harga * $item['jml_org']) }}
                                        </p>
                                    </td>
                                @endif

                                <td class="cart_delete" style="margin-right: 10px">
                                    <a class="cart_quantity_delete" href="{{ route('hapus.cart', $item) }}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">
                                    <p><i>{{ GoogleTranslate::trans('Keranjang Masih Kosong', session()->get('language') ?? 'id') }}</i>
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>{{ GoogleTranslate::trans('Informasi Customer', session()->get('language') ?? 'id') }}</h3>
            </div>
            <form action="{{ route('proses.ordertuku') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="chose_area">
                            <ul class="user_info">
                                <li>
                                    @if ($member->name == null)
                                        <label>{{ GoogleTranslate::trans('Nama', session()->get('language') ?? 'id') }}</label>
                                        <input type="text" name="nama_lengkap"
                                            class="@error('nama_lengkap') is-invalid @enderror"
                                            value="{{ auth()->user()->name }}">
                                    @else
                                        <label>{{ GoogleTranslate::trans('Nama', session()->get('language') ?? 'id') }}</label>
                                        <input type="text" name="nama_lengkap"
                                            class="@error('nama_lengkap') is-invalid @enderror"
                                            value="{{ $member->name }}">
                                    @endif
                                </li>
                                <li>
                                    @if ($member->no_hp == null)
                                        <label>{{ GoogleTranslate::trans('Nomor Telepon', session()->get('language') ?? 'id') }}</label>
                                        <input type="number" name="no_hp"
                                            class="@error('no_hp') is-invalid @enderror"
                                            value="{{ auth()->user()->no_hp }}">
                                    @else
                                        <label>{{ GoogleTranslate::trans('Nomor Telepon', session()->get('language') ?? 'id') }}</label>
                                        <input type="number" name="no_hp"
                                            class="@error('no_hp') is-invalid @enderror"
                                            value="{{ $member->no_hp }}">
                                    @endif
                                </li>
                            </ul>
                            <ul class="user_info">
                                <li>
                                    @if ($member->email == null)
                                        <label>{{ GoogleTranslate::trans('Email', session()->get('language') ?? 'id') }}</label>
                                        <input type="text" name="email"
                                            class="@error('email') is-invalid @enderror"
                                            value="{{ auth()->user()->email }}">
                                    @else
                                        <label>{{ GoogleTranslate::trans('Email', session()->get('language') ?? 'id') }}</label>
                                        <input type="text" name="email"
                                            class="@error('email') is-invalid @enderror"
                                            value="{{ $member->email }}">
                                    @endif
                                </li>
                            </ul>
                            {{-- <ul>
                                <li class="single_field">
                                    <label>Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="6"
                                        class="@error('alamat') is-invalid @enderror">{{ strip_tags($member->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="alert alert-danger" role="alert">
                                            Alamat tidak boleh kosong!
                                        </div>
                                    @enderror
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <input type="hidden" name="total_bayar" value="{{ $totalHarga }}">
                                <li>{{ GoogleTranslate::trans('Total Pembayaran', session()->get('language') ?? 'id') }}
                                    <span>Rp. {{ number_format($totalHarga) }}</span></li>
                                <button
                                    class="btn btn-default check_out">{{ GoogleTranslate::trans('Check Out', session()->get('language') ?? 'id') }}</button>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--/#cart_items-->
    <!--/#do_action-->
    <script src="{{ asset('front') }}/js/jquery.js"></script>
    <script src="{{ asset('front') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('front') }}/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('front') }}/js/jquery.prettyPhoto.js"></script>
    <script src="{{ asset('front') }}/js/main.js"></script>

</body>

</html>
