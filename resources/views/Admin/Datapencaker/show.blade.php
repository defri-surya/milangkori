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
                                    <h5>&nbsp;DETAIL DATA PENCARI KERJA</h5>
                                    <div class="toolbar"> </div>
                                </header>
                                <div id="collapse4" class="body">
                                    {{-- <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama Lengkap</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Tempat Lahir</th>
                                                <th> Keterangan</th>
                                                <th>Email</th>
                                                <th>Akun Ig</th>
                                                <th>Akun Fb</th>
                                                <th>Akun Linkeid</th>
                                                <th>No Hp</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img width="90" src="{{ asset($data->logo) }}" alt="">
                                                </td>
                                                <td>{{ $data->nama_lengkap }}</td>
                                                <td>{{ $data->tgl_lahir }}</td>
                                                <td>{{ $data->tmpt_lahir }}</td>
                                                <td>{!! $data->about !!}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->ig }}</td>
                                                <td>{{ $data->fb }}</td>
                                                <td>{{ $data->linkedin }}</td>
                                                <td>{{ $data->no_hp }}</td>
                                                <td>{{ $data->user['password'] }}</td>
                                                <td>{{ $data->status }}</td>
                                            </tr>
                                        </tbody>
                                    </table> --}}

                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Foto Pencari Kerja</th>
                                                <td>
                                                    <img width="90" src="{{ asset($data->logo) }}" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <td>{{ $data->nama_lengkap }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td>{{ $data->tgl_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tempat Lahir</th>
                                                <td>{{ $data->tmpt_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pengalaman Kerja</th>
                                                <td>{!! $data->about !!}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $data->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Akun Istagram</th>
                                                <td>{{ $data->ig }}</td>
                                            </tr>
                                            <tr>
                                                <th>Akun Facebook</th>
                                                <td>{{ $data->fb }}</td>
                                            </tr>
                                            <tr>
                                                <th>Akun Linkeid</th>
                                                <td>{{ $data->linkedin }}</td>
                                            </tr>
                                            <tr>
                                                <th>No Hanphone</th>
                                                <td>{{ $data->no_hp }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status Pencari Kerja</th>
                                                <td>{{ $data->status }}</td>
                                            </tr>
                                        </thead>
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
