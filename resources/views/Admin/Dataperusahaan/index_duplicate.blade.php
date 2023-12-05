@extends('layouts.backend.master')

@section('title', 'Home | Admin')

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
                                    <h5>&nbsp;Daftar Data Perusahaan</h5>
                                    <div class="toolbar">
                                    </div>
                                </header>
                                <div id="collapse4" class="body">
                                    <div class="control-group">
                                        <form action="{{ route('search.company') }}" method="GET">
                                            @csrf
                                            <label>
                                                <div style="text-align: right;">
                                                    <input type="search" name="search"
                                                        style="width: 170px; margin-bottom:0" class="form-control input-sm"
                                                        placeholder="Search Lowongan" data-original-title="Search ...">
                                                    <button type="submit" class="btn btn-warning">Search</button>
                                                </div>
                                            </label>
                                        </form>
                                    </div>
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Nama Perusahaan</th>
                                                <th style="text-align: center">Kode Registrasi</th>
                                                <th style="text-align: center">Status Perusahaan</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($datasearchcompany as $item => $value)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $value->perusahaan->nama_perusahaan }}</td>
                                                    <td style="text-align: center">{{ $value->kode_registrasi }}</td>
                                                    <td style="text-align: center">
                                                        @if ($value->perusahaan->status == 'Belum Verifikasi')
                                                            <span style="color: red"><b>{{ $value->perusahaan->status }}</b></span>
                                                        @endif
                                                        @if ($value->perusahaan->status == 'Verifikasi')
                                                            <span style="color: green"><b>{{ $value->perusahaan->status }}</b></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dataperusahaan.show', $value->perusahaan->id) }}"
                                                            class="btn btn-default" data-toggle="confirmation"
                                                            style="text-transform: uppercase"><i class="icon-eye-open"></i>
                                                            &nbsp;Detail
                                                        </a>
                                                        <form action="{{ route('verifikasi', $value->perusahaan->id) }}" method="POST"
                                                            onsubmit="return confirm('Verifikasi Perusahaan, Anda Yakin ?')"
                                                            style="display: inline-block">
                                                            {!! method_field('PUT') . csrf_field() !!}
                                                            <input type="hidden" name="status_company[]"
                                                                value="Verifikasi">
                                                            <button class="dropdown-item" type="submit"
                                                                style="text-transform: uppercase; color:#333333; padding:5px; background-color: #f5f5f5; border: none; border: 1px solid #cccccc; background-image: linear-gradient(to bottom, #ffffff, #e6e6e6); box-shadow: inset 0 1px 0 rgb(255 255 255 / 20%), 0 1px 2px rgb(0 0 0 / 5%);border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);">
                                                                verifikasi
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" style="text-align: center"><b><i>Data tidak ditemukan!</i></b></td>
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
