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
                                    <h5>&nbsp;Daftar Pencaker</h5>
                                    <div class="toolbar">
                                    </div>
                                </header>
                                <div id="collapse4" class="body">
                                    <div class="control-group">
                                        <form action="{{ route('search.pencaker') }}" method="GET">
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
                                                <th>No</th>
                                                <th style="text-align: center">Nama Pencaker</th>
                                                <th style="text-align: center">Kode Registrasi</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($datasearch as $value)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $value->pencaker->nama_lengkap }}</td>
                                                    <td style="text-align: center"><b>{{ $value->kode_registrasi }}</b></td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('datapencaker.show', $value->pencaker->id) }}"
                                                            class="btn btn-default" data-toggle="confirmation"
                                                            style="text-transform: uppercase"><i class="icon-eye-open"></i>
                                                            Detail
                                                        </a>
                                                        {{-- <a href="{{ route('datapencaker.edit', $item->pencaker->id) }}" class="btn edit"><i
                                                            class="icon-edit"></i>Activate
                                                        </a> --}}
                                                        <form action="" method="POST"
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
