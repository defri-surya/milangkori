@extends('layouts.backend.master')

@section('title', 'Home | Pencari Kerja')

@section('style')
    <style>
        .radio {
            margin-left: 13px;
        }
    </style>
@endsection

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
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Edit Profil', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('updatecustomer', $datacv->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="control-group">
                                            <label for="autosize" class="control-label">
                                                {{ GoogleTranslate::trans('Unggah Foto', session()->get('language') ?? 'id') }}
                                                <i><span style="color: red">
                                                        <br /> *</span><span style="color: red">
                                                        {{ GoogleTranslate::trans('Max: 300kb', session()->get('language') ?? 'id') }}</span></i>
                                            </label>
                                            <div class="controls">
                                                <input type="file" name="foto" id="text1"
                                                    class="span6 input-tooltip @error('foto') is-invalid @enderror"
                                                    data-original-title="Masukkan Foto Profile" data-placement="bottom" />
                                                <img width="150" src="{{ asset($datacv->foto) }}" alt="">
                                            </div>
                                            @error('foto')
                                                <div class="alert alert-danger">
                                                    {{ GoogleTranslate::trans('Upload foto Anda, Ukuran gambar tidak boleh lebih dari 300kb!', session()->get('language') ?? 'id') }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Nama Lengkap', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <input type="text" name="nama_lengkap" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Nama Lengkap"
                                                    data-placement="bottom" value="{{ $datacv->nama_lengkap }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Email', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <input type="text" name="email" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Tempat Lahir"
                                                    data-placement="bottom" value="{{ auth()->user()->email }}" readonly />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Nomor Telepon', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <input type="number" name="no_hp" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Nomor Telepon"
                                                    data-placement="bottom" value="{{ $datacv->no_hp }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Alamat', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <textarea id="autosize" name="alamat" class="span6 ckeditor">{{ $datacv->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-large btn-block btn-warning">
                                            {{ GoogleTranslate::trans('Simpan & Terbitkan', session()->get('language') ?? 'id') }}
                                        </button>
                                    </form>
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
@endsection

@push('script')
    <script src="{{ asset('assets') }}/backend/assets/js/multiple-form.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more1").click(function() {
                var html = $(".copy1").html();
                $(".after-add-more1").after(html);
            });
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".remove1", function() {
                $(this).parents(".text-dark1").remove();
            });
        });

        $(document).ready(function() {
            $(".add-more2").click(function() {
                var html = $(".copy2").html();
                $(".after-add-more2").after(html);
            });
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".remove2", function() {
                $(this).parents(".text-dark2").remove();
            });
        });

        $(document).ready(function() {
            $(".add-more3").click(function() {
                var html = $(".copy3").html();
                $(".after-add-more3").after(html);
            });
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".remove3", function() {
                $(this).parents(".text-dark3").remove();
            });
        });

        $(document).ready(function() {
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".remove-data", function() {
                $(this).parents(".text-dark-remove").remove();
            });
        });

        $(document).ready(function() {
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".remove-data1", function() {
                $(this).parents(".text-dark-remove1").remove();
            });
        });

        $(document).ready(function() {
            // saat tombol remove dklik control group akan dihapus
            $("body").on("click", ".remove-data2", function() {
                $(this).parents(".text-dark-remove2").remove();
            });
        });
    </script>
@endpush
