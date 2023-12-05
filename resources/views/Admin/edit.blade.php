@extends('layouts.backend.master')

@section('title', 'Home | Partnership')

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
                                    <h5>&nbsp;Form Edit Partnership</h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST" action="{{ route('partnership.update', $data->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Link</label>
                                            <div class="controls">
                                                <input type="text" name="link" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Link"
                                                    data-placement="bottom" value="{{ $data->link }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Logo Partnership</label>
                                            <div class="controls">
                                                <input type="file" name="logo" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom" />
                                                <img width="150" src="{{ asset($data->logo) }}" alt="">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-large btn-block btn-warning">
                                            UPDATE & PUBLISH
                                        </button>
                                    </form>
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
