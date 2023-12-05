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
                                    <h5>&nbsp;Form Tambah Event Job Fair</h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('dataeventjobfair.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Banner Event <br> <b
                                                    style="color:red; font-size:12px">*</b><b style="font-size:12px"><i>Max
                                                        Size 2mb</i></b></label>
                                            <div class="controls">
                                                <input type="file" name="image" id="text1"
                                                    class="span6 input-tooltip @error('image') is-invalid @enderror"
                                                    data-original-title="" data-placement="bottom" required />
                                                @error('image')
                                                    <div class="alert alert-danger">Maaf, Ukuran gambar tidak boleh lebih dari
                                                        2mb!
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Event Job Fair</label>
                                            <div class="controls">
                                                <input type="date" name="date_end_event" id="text1"
                                                    class="span6 input-tooltip" data-original-title=""
                                                    data-placement="bottom" required />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-large btn-block btn-warning">
                                            SAVE & PUBLISH
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
