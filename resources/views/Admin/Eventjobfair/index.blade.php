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
                                    <h5>&nbsp;Data Event Job Fair</h5>
                                    <div class="toolbar"> </div>
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
                                        @if ($dataimage == null)
                                            <div class="toolbar">
                                                <a href="{{ route('dataeventjobfair.create') }}" rel="tooltip"
                                                    data-placement="bottom" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i> ADD DATA IMAGE
                                                </a>
                                            </div>
                                        @else
                                            <div class="toolbar" hidden>
                                                <a href="{{ route('dataeventjobfair.create') }}" rel="tooltip"
                                                    data-placement="bottom" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i> ADD DATA IMAGE
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div style="overflow-x:auto;">
                                        <table class="table table-bordered table-condensed table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">IMAGE BANNER JOB FAIR</th>
                                                    <th style="text-align: center"> DATA END EVENT</th>
                                                    <th style="text-align: center">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($dataimage != null)
                                                    <tr>
                                                        <td style="text-align: center">
                                                            <img width="70" src="{{ asset($dataimage->image) }}"
                                                                alt="">
                                                        </td>
                                                        <td>{{ $dataimage->date_end_event }}</td>
                                                        <td style="text-align: center;">
                                                            <a href="{{ route('dataeventjobfair.edit', $dataimage->id) }}"
                                                                class="btn edit"><i class="icon-edit"></i>
                                                                Edit
                                                            </a>
                                                            <form
                                                                action="{{ route('dataeventjobfair.destroy', $dataimage->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Hapus Data, Anda Yakin ?')"
                                                                style="display: inline-block">
                                                                {!! method_field('delete') . csrf_field() !!}
                                                                <button class="dropdown-item" type="submit">
                                                                    <i class="icon-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td colspan="4" style="text-align: center"><i>Data Kosong !</i>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <header>
                                        <h5>&nbsp;Daftar Data Perusahaan</h5>
                                    </header>
                                    <div style="overflow-x:auto;">
                                        <table class="table table-bordered table-condensed table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">No</th>
                                                    <th style="text-align: center">Logo</th>
                                                    <th style="text-align: center">Nama Perusahaan</th>
                                                    <th style="text-align: center">Delete Ivent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($data as $item => $value)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td style="text-align: center">
                                                            <img width="70" src="{{ asset($value->logo) }}"
                                                                alt="">
                                                        </td>
                                                        <td>{{ $value->nama_perusahaan }}</td>
                                                        <td style="text-align: center;">
                                                            <form action="{{ route('hapus_update_event', $value->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Delete Ikut Event, Anda Yakin ?')"
                                                                style="display: inline-block">
                                                                {!! method_field('PUT') . csrf_field() !!}
                                                                <button class="dropdown-item" type="submit"
                                                                    style="text-transform: uppercase; color:rgb(131, 14, 14); padding:5px; background-color: #faa732; border: none; background-image: linear-gradient(to bottom, #fbb450, #f89406); text-shadow: 0 -1px 0 rgb(0 0 0 / 25%);border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);">
                                                                    Hapus Ikut Event
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" style="text-align: center"><i>Data Kosong !</i>
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
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.row-fluid -->
        </div>
        <!-- /.outer -->
    </div>
@endsection
