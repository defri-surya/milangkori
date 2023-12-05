@extends('layouts.backend.master')

@section('title', 'Home | Riwayat Transaksi')

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
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Riwayat Transaksi', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ GoogleTranslate::trans('No', session()->get('language') ?? 'id') }}
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
                                            @forelse ($selesai as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <!-- <td>-->
                                                    <!--    <a href="{{ route('showTransaksi', $item->nomor_urut) }}"-->
                                                    <!--        style="text-decoration: underline">-->
                                                    <!--        {{ $item->nomor_urut }}-->
                                                    <!--    </a>-->
                                                    <!--</td>-->

                                                    <td>{{ $item->nomor_urut }}</td>

                                                    <td>{{ $item->tgl_transaksi }}</td>
                                                    <td>{{ $item->tgl_booking }}</td>
                                                    <td>{{ GoogleTranslate::trans($item->paketWisata->nama_paket_wisata, session()->get('language') ?? 'id') }}
                                                    </td>
                                                    <td>
                                                        <b
                                                            style="color:green">{{ GoogleTranslate::trans('Terbayar', session()->get('language') ?? 'id') }}</b>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" style="text-align: center">
                                                        <i>
                                                            {{ GoogleTranslate::trans('Belum Ada Transaksi Terbayar!', session()->get('language') ?? 'id') }}
                                                        </i>
                                                    </td>
                                                </tr>
                                            @endforelse
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
