@extends('layouts.backend.master')

@section('title', 'Home | Admin Wisata Wisata')

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
                                    <h5>&nbsp;Artikel Wisata</h5>
                                    <div class="toolbar">
                                        <a href="{{ route('dataartikelwisata.create') }}" rel="tooltip"
                                            data-placement="bottom" class="btn btn-primary">
                                            <i class="fas fa-edit"></i> Tambah Artikel Wisata
                                        </a>
                                    </div>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th style="text-align: center">Judul </th>
                                                <th style="text-align: center">Foto</th>
                                                <th style="text-align: center">Deskripsi Wisata</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $item => $value)
                                                <tr>
                                                     <td>{{ $data->firstItem() + $item }} </td>
                                                    <td>{{ $value->judul }}</td>
                                                    <td style="text-align: center">
                                                        <img width="70" src="{{ asset($value->foto) }}" alt="">
                                                    </td>
                                                    <td>{!! \Illuminate\Support\Str::limit($value->deskripsi, 100, $end = '...') !!}</td>
                                                     <td style="text-align: center">
                                                        <a href="{{ route('dataartikelwisata.edit', $value->id) }}"
                                                            class="btn btn-primary"><i class="icon-edit"></i>
                                                            Edit
                                                        </a>
                                                        <a href="{{ route('dataartikelwisata.show', $value->id) }}" 
                                                            class="btn btn-info" data-toggle="confirmation"
                                                            style="text-transform: uppercase"><i
                                                                class="icon-eye-open"></i>
                                                            &nbsp;Detail
                                                        </a>
                                                        <form
                                                            action="{{ route('dataartikelwisata.destroy', $value->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Hapus Data, Anda Yakin ?')"
                                                            style="display: inline-block">
                                                            {!! method_field('delete') . csrf_field() !!}
                                                            <button class="dropdown-item" type="submit">
                                                                <i class="icon-trash"></i> &nbsp;Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            
                                                @empty
                                                <tr>
                                                    <td colspan="4" style="text-align: center"><i>Katagori Peket Wisata
                                                            Masih Kosong !</i>
                                                    </td>
                                                </tr>
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

@push('scripts')
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bs.notify.min.js') }}"></script>
@endpush
