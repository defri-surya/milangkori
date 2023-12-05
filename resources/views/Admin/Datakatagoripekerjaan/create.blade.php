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
                                    <h5>&nbsp;Form Data Katagori Pekerjaan</h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST" action="{{ route('datakatagoripekerjaan.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Katagori Pekerjaan</label>
                                            <div class="controls">
                                                <input type="text" name="bidang_pekerjaan" id="text1" class="span6 input-tooltip @error('bidang_pekerjaan') is-invalid @enderror" {{-- data-original-title="Masukkan Link" --}}
                                                    placeholder="Masukkan data Katagori pekerjaan" data-placement="bottom" />
                                                    @error('bidang_pekerjaan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-large btn-block btn-warning">
                                            SAVE
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
