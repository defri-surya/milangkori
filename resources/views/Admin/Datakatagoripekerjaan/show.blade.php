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
                                    <h5>&nbsp;Detail Partnership</h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <table class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Link Partnership</th>
                                                <th>Logo Partnership</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>{{ $data->link }}</td>
                                                    <td>
                                                        <img width="90" src="{{ asset($data->logo) }}" alt="">
                                                    </td>
                                                </tr>
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
