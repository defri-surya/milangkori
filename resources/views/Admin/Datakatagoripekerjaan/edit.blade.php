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
                                    <h5>&nbsp;Form Edit Data Katagori Pekerjaan</h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST" action="{{ route('datakatagoripekerjaan.update', $data->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Bidang Pekerjaan</label>
                                            <div class="controls">
                                                <input type="text" name="bidang_pekerjaan" id="text1" class="span6 input-tooltip @error('bidang_pekerjaan') is-invalid @enderror"
                                                    data-original-title="Masukkan Bidang Pekerjaan"
                                                    data-placement="bottom" value="{{ $data->bidang_pekerjaan }}" />
                                                    @error('bidang_pekerjaan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
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
