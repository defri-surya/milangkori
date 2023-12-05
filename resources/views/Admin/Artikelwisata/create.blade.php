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
                                    <h5>&nbsp; Data Artikel Wisata</h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('dataartikelwisata.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Judul Artikel Wisata</label>
                                            <div class="controls">
                                                <input type="text" name="judul" id="text1"
                                                    class="span6 input-tooltip @error('judul') is-invalid @enderror"
                                                    {{-- data-original-title="Masukkan Link" --}} placeholder="Masukkan data judul wisata"
                                                    data-placement="bottom" />
                                                @error('judul')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label"> Foto Artikel Wisata<i><span
                                                        style="color: red">
                                                        <br /> *</span><span style="color: red">Max: 500 Kb</span></i>
                                            </label>
                                            <div class="controls">
                                                <input type="file" name="foto" id="text1"
                                                    class="span6 input-tooltip @error('foto') is-invalid @enderror"
                                                    data-original-title="Masukkan Foto Profile" data-placement="bottom"
                                                    required />
                                            </div>
                                            @error('foto')
                                                <div class="invalid-feedback">
                                                    <span style="color:red">
                                                        Ukuran File tidak boleh lebih dari 500 Kb
                                                    </span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">Deskripsi</label>
                                            <div class="controls">
                                                <textarea id="about" name="deskripsi" class="span6 ckeditor" required> </textarea>
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
