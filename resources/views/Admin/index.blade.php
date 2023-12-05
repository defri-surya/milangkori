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
                                <header style="width: 100%">
                                    <h5>&nbsp;Selamat datang di dashboard Admin</h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <img src="{{ asset('assets') }}/frontend/images/milangkori_logo.png" alt=""
                                        class="img-fluid">
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
