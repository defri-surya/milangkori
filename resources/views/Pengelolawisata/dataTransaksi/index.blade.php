@extends('layouts.backend.master')

@section('title', 'Home | Pengelola Wisata')

@section('content')
    <div id="content">
        <!-- .outer -->
        <div class="container-fluid outer">
            <div class="row-fluid">
                <!-- .inner -->
                <div class="span12 inner">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <header>
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Waiting List', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ GoogleTranslate::trans('Nomor', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Kode Transaksi', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Tanggal Transaksi', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Tanggal Booking', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Nama Paket', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($pengelola == null)
                                                <tr>
                                                    <td colspan="7" style="text-align: center">
                                                        <i>
                                                            {{ GoogleTranslate::trans('Silahkan lengkapi profil ada terlebih dahulu', session()->get('language') ?? 'id') }}
                                                        </i>
                                                    </td>
                                                </tr>
                                            @else
                                                @forelse ($waitingList as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item->nomor_urut }}</td>
                                                        <td>{{ $item->tgl_transaksi }}</td>
                                                        <td>{{ $item->tgl_booking }}</td>
                                                        <td>
                                                            {{ GoogleTranslate::trans($item->paketWisata->nama_paket_wisata, session()->get('language') ?? 'id') }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('showTransaksi', $item->id) }}"
                                                                class="btn edit">
                                                                {{ GoogleTranslate::trans('Konfirmasi', session()->get('language') ?? 'id') }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" style="text-align: center">
                                                            <i>
                                                                {{ GoogleTranslate::trans('Belum ada transaksi', session()->get('language') ?? 'id') }}
                                                            </i>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.row-fluid -->
        </div>
        <!-- /.outer -->

        <!-- .outer -->
        <div class="container-fluid outer">
            <div class="row-fluid">
                <!-- .inner -->
                <div class="span12 inner">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <header>
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Daftar Transaksi Terselesaikan', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ GoogleTranslate::trans('Nomor', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Kode Transaksi', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Tanggal Transaksi', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Tanggal Booking', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Nama Paket', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Status', session()->get('language') ?? 'id') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($pengelola == null)
                                                <tr>
                                                    <td colspan="7" style="text-align: center">
                                                        <i>
                                                            {{ GoogleTranslate::trans('Silahkan lengkapi profil ada terlebih dahulu', session()->get('language') ?? 'id') }}
                                                        </i>
                                                    </td>
                                                </tr>
                                            @else
                                                @forelse ($selesai as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>
                                                            <a href="{{ route('showTransaksi', $item->nomor_urut) }}"
                                                                style="text-decoration: underline">
                                                                {{ $item->nomor_urut }}
                                                            </a>
                                                        </td>

                                                        <!--<td>{{ $item->nomor_urut }}</td>-->
                                                        <td>{{ $item->tgl_transaksi }}</td>
                                                        <td>{{ $item->tgl_booking }}</td>
                                                        <td>
                                                            {{ GoogleTranslate::trans($item->paketWisata->nama_paket_wisata, session()->get('language') ?? 'id') }}
                                                        </td>
                                                        <td>
                                                            <b
                                                                style="color:green">{{ GoogleTranslate::trans('Selesai', session()->get('language') ?? 'id') }}</b>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" style="text-align: center">
                                                            <i>
                                                                {{ GoogleTranslate::trans('Belum ada transaksi terselasikan', session()->get('language') ?? 'id') }}
                                                            </i>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
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
@endsection
