@extends('layouts.backend.master')

@section('title', 'Home | Admin Pengelola Wisata')

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
                                    <h5>&nbsp;Data Pengelola Wisata</h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th style="text-align: center">Nama Pengelola</th>
                                                <th style="text-align: center">Email</th>
                                                <th style="text-align: center">No Hanphone</th>
                                                <th style="text-align: center">Alamat</th>
                                                <th style="text-align: center">Status Pengelola Wisata</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item => $value )
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $value->nama_pengelola_wisata }}</td>
                                                    <td>{{ $value->user['email'] }}</td>
                                                    <td>{{ $value->kontak }}</td>
                                                    <td>{!! $value->alamat !!}</td>
                                                    <td style="text-align: center"> 
                                                        @if ($value->status == 'Belum Verifikasi')
                                                            <span style="color: #991313"><b>{{ $value->status }} </b></span>
                                                        @endif
                                                        @if ($value->status == 'Verifikasi')
                                                            <span style="color: rgb(23, 16, 227)"><b> {{ $value->status }}</b> </span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        <form action="{{-- {{ route('kategoripaketwisata.destroy', $value->id) }} --}}" method="POST"
                                                            onsubmit="return confirm('Hapus Data, Anda Yakin ?')"
                                                            style="display: inline-block">
                                                            {!! method_field('delete') . csrf_field() !!}
                                                            <button class="dropdown-item" type="submit">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('datapengelolawisata.show', $value->id) }}"
                                                            class="btn btn-info" data-toggle="confirmation"
                                                            style="text-transform: uppercase"><i
                                                                class="icon-eye-open"></i>
                                                            &nbsp;Detail
                                                        </a>
                                                        <form action="{{ route('verifikasi', $value->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Verifikasi Pengelola Wisata, Anda Yakin ?')"
                                                            style="display: inline-block">
                                                            {!! method_field('PUT') . csrf_field() !!}
                                                            <input type="hidden" name="status_pengelolawisata[]" value="Verifikasi">
                                                            <button class="dropdown-item" type="submit"
                                                                style="text-transform: uppercase; color:#333333; padding:5px; background-color: #c61818; border: none; border: 1px solid #991313; background-image: linear-gradient(to bottom, #ffffff, #e6e6e6); box-shadow: inset 0 1px 0 rgb(255 255 255 / 20%), 0 1px 2px rgb(0 0 0 / 5%);border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);">
                                                                verifikasi
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" style="text-align: center"><i>Katagori Peket Wisata Masih Kosong !</i>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {{-- {{ $data->links() }}   --}}
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

@push('scripts')
<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/bs.notify.min.js')}}"></script>

@endpush



