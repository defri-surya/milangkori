@extends('layouts.backend.master')

@section('title', 'Home | Pengelola Wisata')

@section('content')
    <div id="content">
        <!-- Notifikasi Start -->
        <div style="background-color: #FFCC33; padding: 10px; border-radius: 15px; margin: 20px; text-align: center">
            <header>
                <span>
                    {{ GoogleTranslate::trans('Hallo', session()->get('language') ?? 'id') }},
                    @php
                        $waitingList1 = App\Transaksi::with('customer', 'paketWisata')
                            ->where('status_lanjutan', 'Proses')
                            ->where('pengelola_wisata_id', $pengelola->id)
                            ->count();
                    @endphp
                    <b>
                        @if (empty($pengelola))
                            {{ auth()->user()->name }}
                        @else
                            {{ $pengelola->nama_pengelola_wisata }}
                        @endif
                    </b>
                </span>
                <br>
                <span>
                    {{ GoogleTranslate::trans('Anda memiliki', session()->get('language') ?? 'id') }} <span
                        class="badge badge-pill badge-danger" style="background-color: red">{{ $waitingList1 }}</span>
                    {{ GoogleTranslate::trans('transaksi yang belum terselesaikan', session()->get('language') ?? 'id') }},
                    <a href="{{ route('indexTransaksi') }}"
                        style="text-decoration: underline">{{ GoogleTranslate::trans('Lihat', session()->get('language') ?? 'id') }}</a>
                </span>
            </header>
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
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Daftar Paket Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    {{ GoogleTranslate::trans('Nomor', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th>
                                                    {{ GoogleTranslate::trans('Nama Paket', session()->get('language') ?? 'id') }}
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($paketwisata as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ GoogleTranslate::trans($item->nama_paket_wisata, session()->get('language') ?? 'id') }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('editpaketwisata', $item->id) }}"
                                                            class="btn edit">
                                                            <i class="icon-edit"></i>
                                                        </a>
                                                        <form action="{{ route('deletepaketwisata', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Hapus Data, Anda Yakin ?')"
                                                            style="display: inline-block">
                                                            {!! method_field('delete') . csrf_field() !!}
                                                            <button class="dropdown-item" type="submit">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" style="text-align: center">
                                                        <i>
                                                            {{ GoogleTranslate::trans('Belum ada paket wisata !', session()->get('language') ?? 'id') }}
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
