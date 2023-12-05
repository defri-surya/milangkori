@extends('layouts.backend.master')

@section('title', 'Home | Admin')

@section('style')
    <style>
        .pagination {
            display: inline-block;
        }

        .pagination li {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .pagination li.active {
            background-color: #cc004d;
            color: white;
            border-radius: 5px;
        }

        .pagination li:hover:not(.active) {
            background-color: #ddd;
            border-radius: 5px;
        }

        ul {
            list-style-type: none;
        }

        nav {
            text-align: center;
        }

        a.page-link {
            text-decoration: none;
            color: #000;
        }
    </style>
@endsection
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
                                                        placeholder="Search Lowongan*" data-original-title="Search ...">
                                                    <button type="submit" class="btn btn-warning">Search</button>
                                                </div>
                                            </label>
                                        </form>
                                    </div>
                                    <div style="overflow-x:auto;">
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
                                                @forelse ($data as $item => $value)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $value->nama_perusahaan }}</td>
                                                        <td>{{ $value->user->kode_registrasi }}</td>
                                                        <td style="text-align: center">
                                                            @if ($value->status == 'Belum Verifikasi')
                                                                <span style="color: red"><b>{{ $value->status }}</b></span>
                                                            @endif
                                                            @if ($value->status == 'Verifikasi')
                                                                <span
                                                                    style="color: green"><b>{{ $value->status }}</b></span>
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <form action="{{ route('update_event', $value->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Ikut Event, Anda Yakin ?')"
                                                                style="display: inline-block">
                                                                {!! method_field('PUT') . csrf_field() !!}
                                                                <button class="dropdown-item" type="submit"
                                                                    style="text-transform: uppercase; color:rgb(131, 14, 14); padding:5px; background-color: #faa732; border: none; background-image: linear-gradient(to bottom, #fbb450, #f89406); text-shadow: 0 -1px 0 rgb(0 0 0 / 25%);border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);">
                                                                    Ikut Event
                                                                </button>
                                                            </form>
                                                            <a href="{{ route('dataperusahaan.show', $value->id) }}"
                                                                class="btn btn-info" data-toggle="confirmation"
                                                                style="text-transform: uppercase"><i
                                                                    class="icon-eye-open"></i>
                                                                &nbsp;Detail
                                                            </a>
                                                            <form action="{{ route('verifikasi', $value->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Verifikasi Perusahaan, Anda Yakin ?')"
                                                                style="display: inline-block">
                                                                {!! method_field('PUT') . csrf_field() !!}
                                                                <input type="hidden" name="status_company[]"
                                                                    value="Verifikasi">
                                                                <button class="dropdown-item" type="submit"
                                                                    style="text-transform: uppercase; color:#333333; padding:5px; background-color: #c61818; border: none; border: 1px solid #991313; background-image: linear-gradient(to bottom, #ffffff, #e6e6e6); box-shadow: inset 0 1px 0 rgb(255 255 255 / 20%), 0 1px 2px rgb(0 0 0 / 5%);border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);">
                                                                    verifikasi
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $data->links() }}
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
