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
                                              @forelse ($data as $item => $value)
                                                <tr>
                                                    <td>{{ $data->firstItem() + $item }} </td>
                                                    <td>{{ $value->nama_lengkap }}</td>
                                                    <td style="text-align: center"><b>{{ $value->user->kode_registrasi }}</b></td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('datapencaker.show', $value->id) }}"
                                                            class="btn btn-default" data-toggle="confirmation"
                                                            style="text-transform: uppercase"><i class="icon-eye-open"></i>
                                                            Detail
                                                        </a>
                                                        {{-- <a href="{{ route('datapencaker.edit', $item->id) }}" class="btn edit"><i
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
                                            @endforelse
                                        </tbody>
                                    </table>
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
