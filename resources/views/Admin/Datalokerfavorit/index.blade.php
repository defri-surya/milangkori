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
                                    <h5>&nbsp;Daftar Loker Favorit & Berbayar</h5>
                                    <div class="toolbar">
                                    </div>
                                </header>

                                <div id="collapse4" class="body">
                                    <div class="control-group">
                                        <form action="{{ route('search.loker.favorit') }}" method="GET">
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
                                                <th style="text-align: center">Kode Loker</th>
                                                <th style="text-align: center">Bidang Katagori</th>
                                                <th style="text-align: center">Status Loker </th>
                                                <th style="text-align: center">Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->perusahaan['nama_perusahaan'] }} </td>
                                                    <td style="text-align: center"><b>{{ $item->kode_loker }}</b> </td>
                                                    <td>{{ $item->judul }} </td>
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
                                                            action="{{ url('dataperusahaan/unFavorit/' . $item->id . '/' . $item->id) }}"
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
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{-- <div class="center" style="text-transform: uppercase; color:rgb(35, 26, 14)">
                                    </div> --}}
                                    {{ $data->links() }}
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
