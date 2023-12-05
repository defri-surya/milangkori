@extends('layouts.backend.master')

@section('title', 'Home | Admin Detail Pengelola Wisata')

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
                                    <h5>&nbsp;DETAIL DATA PENGELOLA WISATA</h5>
                                    <div class="toolbar"> </div>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Image Pengelola Wisata</th>
                                                <td>
                                                    <img width="90" src="{{ asset($data->logo) }}" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pengelola Wisata</th>
                                                <td>{{ $data->nama_pengelola_wisata }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Kontak</th>
                                                <td>{{ $data->kontak }}</td>
                                            </tr>
                                          
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $data->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tentang Pengelola Wisata</th>
                                                <td>{!! $data->about !!}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Status Pengelola Wisata</th>
                                                <td>
                                                    @if ($data->status == 'Belum Verifikasi')
                                                        <span style="color: red"><b>{{ $data->status }}</b></span>
                                                    @endif
                                                    @if ($data->status == 'Verifikasi')
                                                        <span style="color: green"><b>{{ $data->status }}</b></span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="box">
                                <header>
                                    <h5>&nbsp;LOWONGAN KERJA</h5>
                                    <div class="toolbar"> </div>
                                </header>
                                <div id="collapse4" class="body">
                                    <div class="control-group">
                                        <form action="{{ route('search.loker', $data->id) }}" method="GET">
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
                                    <div style="overflow-x:auto;">
                                        <table class="table table-bordered table-condensed table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">No</th>
                                                    <th style="text-align: center">Judul Lowongan</th>
                                                    <th style="text-align: center">Kode Loker</th>
                                                    <th style="text-align: center">Waktu Input </th>
                                                    <th style="text-align: center">Status Loker </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($loker as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item->judul }} </td>
                                                        <td style="text-align: center"><b>{{ $item->kode_loker }}</b> </td>
                                                        <td>{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            @if ($item->status == 'Standar')
                                                                <span style="color: red"><b>{{ $item->status }}</b></span>
                                                            @endif
                                                            @if ($item->status == 'Favorit')
                                                                <span style="color: green"><b>{{ $item->status }}</b></span>
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center">
                                                            <form
                                                                action="{{ url('dataperusahaan/update/' . $data->id . '/' . $item->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Jadikan Favorit, Anda Yakin ?')"
                                                                style="display: inline-block">
                                                                {!! method_field('PUT') . csrf_field() !!}
                                                                <button class="dropdown-item" type="submit"
                                                                    style="text-transform: uppercase; color:rgb(131, 14, 14); padding:5px; background-color: #faa732; border: none; background-image: linear-gradient(to bottom, #fbb450, #f89406); text-shadow: 0 -1px 0 rgb(0 0 0 / 25%);border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);">
                                                                    JADIKAN FAVORIT *
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="{{ url('dataperusahaan/unFavorit/' . $data->id . '/' . $item->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Hapus Favorit, Anda Yakin ?')"
                                                                style="display: inline-block">
                                                                {!! method_field('PUT') . csrf_field() !!}
                                                                <button class="dropdown-item" type="submit"
                                                                    style="text-transform: uppercase; color:rgb(131, 14, 14); padding:5px; background-color: #faa732; border: none; background-image: linear-gradient(to bottom, #fbb450, #f89406); text-shadow: 0 -1px 0 rgb(0 0 0 / 25%);border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);">
                                                                    Hapus FAVORIT
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7"><span><b><i>Data Tidak Tersedia!</i></b></span></td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $loker->links() }}
                            </div> --}}
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
