@extends('layouts.backend.master')

@section('title', 'Withdraw | Pengelola Wisata')

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
                                    <h5>&nbsp;Request Withdraw</h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Withdraw</th>
                                                <th>Tanggal Withdraw</th>
                                                <th>Tanggal Konfirmasi</th>
                                                <th>Nominal</th>
                                                <th>Ke Rekening</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->kode }}</td>
                                                    <td>{!! date('d-m-Y', strtotime($item->tgl_request)) !!}</td>
                                                    <td>
                                                        @if ($item->tgl_konfirm != null)
                                                            {!! date('d-m-Y', strtotime($item->tgl_konfirm)) !!}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>Rp. {{ number_format($item->nominal) }}</td>
                                                    <td>{{ $item->no_rek }}</td>
                                                    <td>
                                                        @if ($item->status == 'Proses')
                                                            <span class="badge badge-pill badge-danger"
                                                                style="background-color: orange">
                                                                {{ $item->status }}</span>
                                                        @elseif ($item->status == 'Dibatalkan')
                                                            <span class="badge badge-pill badge-danger"
                                                                style="background-color: red">
                                                                {{ $item->status }}</span>
                                                        @else
                                                            <span class="badge badge-pill badge-danger"
                                                                style="background-color: green">
                                                                {{ $item->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status != 'Selesai')
                                                            <form action="{{ route('konfirmwithdraw', $item->kode) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" rel="tooltip"
                                                                    data-placement="bottom" class="btn btn-success">
                                                                    <i class="fas fa-check"></i> Konfirmasi
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" style="text-align: center"><i>Belum Ada Riwayat
                                                            !</i>
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
