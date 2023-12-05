@extends('layouts.backend.master')

@section('title', 'Home | Admin Paket Wisata')

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
                                    <h5>&nbsp;Data Peket Wisata</h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th style="text-align: center">Nama Paket Wisata</th>
                                                <th>Image</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item => $value )
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td style="text-align: center">
                                                        <img width="80" src="{{ asset($value->foto1) }}"
                                                            alt="">
                                                    </td>
                                                    <td>{{ $value->nama_paket_wisata }}</td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('datapaketwisata.show', $value->id) }}" 
                                                            class="btn btn-info" data-toggle="confirmation"
                                                            style="text-transform: uppercase"><i
                                                                class="icon-eye-open"></i>
                                                            &nbsp;Detail
                                                        </a>
                                                        {{-- <form action="{{ route('kategoripaketwisata.destroy', $value->id) }}" method="POST"
                                                            onsubmit="return confirm('Hapus Data, Anda Yakin ?')"
                                                            style="display: inline-block">
                                                            {!! method_field('delete') . csrf_field() !!}
                                                            <button class="dropdown-item" type="submit">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </form> --}}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" style="text-align: center"><i>Data Peket Wisata Masih Kosong !</i>
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



