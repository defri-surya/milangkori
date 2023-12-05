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
                            <h5 style="font-size: large">&nbsp; Data Detail Customer</h5>
                            <div class="box">
                                <div class="body">
                                    <h5 style="font-size: large; margin-top: 25px">Foto Customer</h5>
                                    <div class="control-group">
                                        <div class="controls">
                                            <img width="150" src="{{ asset($data->foto) }}" alt="">
                                        </div>
                                    </div>
                                    <h5 style="font-size: large; margin-top: 25px">Data Customer</h5>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <p style="margin-top: 0"><b>Nama Lengkap</b></p>
                                            <p style="margin-top: 0"><b>Email</b></p>
                                            <p style="margin-top: 0"><b> No Telpon / WA </b> </p>
                                            <p style="margin-top: 0"><b> Alamat </b></p>
                                        </div>
                                        <div class="span10">
                                            @if ($data == null)
                                                <p>
                                                    <i>Data kosong!</i>
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{{ $data->nama_lengkap }}</p>
                                            @endif
                                            @if ($data == null)
                                                <p>
                                                    <i>Data kosong!</i>
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{{ $data->email }}</p>
                                            @endif
                                            @if ($data == null)
                                                <p>
                                                    <i>Data kosong!</i>
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{{ $data->no_hp }}</p>
                                            @endif
                                            @if ($data == null)
                                                <p>
                                                    <i>Data kosong!</i>
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{!! $data->alamat !!}</p>
                                            @endif
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
    </div>
@endsection
