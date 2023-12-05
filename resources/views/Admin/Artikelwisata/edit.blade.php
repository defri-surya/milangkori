@extends('layouts.backend.master')

@section('title', 'Home | Kategori Paket Wisata')

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
                                    <h5>&nbsp;Form Edit Data Artikel Wisata</h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('dataartikelwisata.update', $data->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Judul Artikel Wisata</label>
                                            <div class="controls">
                                                <input type="text" name="judul" id="text1"
                                                    class="span6 input-tooltip @error('judul') is-invalid @enderror"
                                                    data-original-title="Masukkan Bidang Pekerjaan" data-placement="bottom"
                                                    value="{{ $data->judul }}" />
                                                @error('judul')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Foto Paket Wisata <br> <b
                                                    style="color:red; font-size:12px">*</b><b style="font-size:12px"><i>Max
                                                        Size 500kb</i></b></label>
                                            <div class="controls">
                                                <input type="file" name="foto" id="text1"
                                                    class="span6 input-tooltip @error('foto') is-invalid @enderror"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom"
                                                     />
                                                <img width="150" src="{{ asset($data->foto) }}" alt="">
                                                @error('foto')
                                                    <div class="alert alert-danger">Maaf, Ukuran gambar tidak boleh lebih dari
                                                        500kb!
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Deskripsi</label>
                                            <div class="controls">
                                                <textarea id="autosize" name="deskripsi" class="span6 ckeditor">{{ $data->deskripsi }}</textarea>
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
