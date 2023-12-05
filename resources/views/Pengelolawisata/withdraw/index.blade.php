@extends('layouts.backend.master')

@section('title', 'Withdraw | Pengelola Wisata')

@section('content')
    <div id="content">

        <!-- Notifikasi Start -->
        <div style="background-color: #FFCC33; padding: 10px; border-radius: 15px; margin: 20px; text-align: center">
            @if ($pengelola != null)
                <header>
                    <span>
                        {{ GoogleTranslate::trans('Hallo', session()->get('language') ?? 'id') }},
                        @php
                            $saldo = App\Transaksi::where('status_pembayaran', 'Terbayar')
                                ->where('pengelola_wisata_id', $pengelola->id)
                                ->sum('harga');
                            $wdSelesai = App\withdraw::where('status', 'Selesai')
                                ->where('pengelolawisata_id', $pengelola->id)
                                ->sum('nominal');
                            
                            $saldoAkhirSelesai = $saldo - $wdSelesai;
                        @endphp
                        <b>{{ $pengelola->nama_pengelola_wisata }}</b>
                    </span>
                    <br>
                    <span>
                        {{ GoogleTranslate::trans('Saldo anda saat ini', session()->get('language') ?? 'id') }} <span
                            class="badge badge-pill badge-danger" style="background-color: red">Rp.
                            {{ number_format($saldoAkhirSelesai) }}</span>
                    </span>
                </header>
            @else
                <header>
                    <span>
                        {{ GoogleTranslate::trans('Hallo', session()->get('language') ?? 'id') }},
                        @php
                            $saldo1 = App\Transaksi::where('status_pembayaran', 'Terbayar')
                                ->where('pengelola_wisata_id', auth()->user()->id)
                                ->sum('harga');
                            $wdSelesai1 = App\withdraw::where('status', 'Selesai')
                                ->where('pengelolawisata_id', auth()->user()->id)
                                ->sum('nominal');
                            
                            $saldoAkhirSelesai1 = $saldo - $wdSelesai;
                        @endphp
                        <b>{{ auth()->user()->name }}</b>
                    </span>
                    <br>
                    <span>
                        {{ GoogleTranslate::trans('Saldo anda saat ini', session()->get('language') ?? 'id') }} <span
                            class="badge badge-pill badge-danger" style="background-color: red">Rp.
                            {{ number_format($saldoAkhirSelesai1) }}</span>
                    </span>
                </header>
            @endif
        </div>
        <!-- Notifikasi End -->

        <!-- .outer -->
        <div class="container-fluid outer">
            <div class="row-fluid">
                <!-- .inner -->
                <div class="span12 inner">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <header>
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Riwayat Withdraw', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <div class="toolbar">
                                        <a href="{{ route('addwithdraw') }}" rel="tooltip" data-placement="bottom"
                                            class="btn btn-defualt">
                                            <i class="fas fa-plus">
                                                {{ GoogleTranslate::trans('Ajukan Penarikan', session()->get('language') ?? 'id') }}</i>
                                        </a>
                                    </div>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ GoogleTranslate::trans('Nomor', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Kode Withdraw', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Tanggal Withdraw', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Nominal', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Rekening Tujuan', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>{{ GoogleTranslate::trans('Status', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->kode }}</td>
                                                    <td>{!! date('d-m-Y', strtotime($item->tgl_request)) !!}</td>
                                                    <td>Rp. {{ number_format($item->nominal) }}</td>
                                                    <td>{{ $item->no_rek }}</td>
                                                    <td>
                                                        @if ($item->status == 'Proses')
                                                            <span class="badge badge-pill badge-danger"
                                                                style="background-color: orange">
                                                                {{ GoogleTranslate::trans($item->status, session()->get('language') ?? 'id') }}
                                                            </span>
                                                        @elseif ($item->status == 'Dibatalkan')
                                                            <span class="badge badge-pill badge-danger"
                                                                style="background-color: red">
                                                                {{ GoogleTranslate::trans($item->status, session()->get('language') ?? 'id') }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger"
                                                                style="background-color: green">
                                                                {{ GoogleTranslate::trans($item->status, session()->get('language') ?? 'id') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 'Proses')
                                                            <form action="{{ route('cancelwithdraw', $item->kode) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" rel="tooltip"
                                                                    data-placement="bottom" class="btn btn-danger">
                                                                    <i class="fas fa-times"></i>
                                                                    {{ GoogleTranslate::trans('Batalkan', session()->get('language') ?? 'id') }}
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" style="text-align: center">
                                                        <i>
                                                            {{ GoogleTranslate::trans('Belum ada riwayat withdraw !', session()->get('language') ?? 'id') }}
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
