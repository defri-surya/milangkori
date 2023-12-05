@extends('layouts.backend.master')

@section('title', 'Home | Setting Profile')

@section('style')
    <style>
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .add-more1 {
                float: inline;
                margin-top: 10px;
            }

            .remove1 {
                float: inline;
                margin-top: 10px;
            }

            .add-more2 {
                float: inline;
                margin-top: 10px;
            }

            .remove2 {
                float: inline;
                margin-top: 10px;
            }

            .add-more3 {
                float: inline;
                margin-top: 10px;
            }

            .remove3 {
                float: inline;
                margin-top: 10px;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            .add-more1 {
                float: inline;
            }

            .remove1 {
                float: inline;
            }

            .add-more2 {
                float: inline;
            }

            .remove2 {
                float: inline;
            }

            .add-more3 {
                float: inline;
            }

            .remove3 {
                float: inline;
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .add-more1 {
                float: inline;
            }

            .remove1 {
                float: inline;
            }

            .add-more2 {
                float: inline;
            }

            .remove2 {
                float: inline;
            }

            .add-more3 {
                float: inline;
            }

            .remove3 {
                float: inline;
            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .add-more1 {
                float: inline;
            }

            .remove1 {
                float: inline;
            }

            .add-more2 {
                float: inline;
            }

            .remove2 {
                float: inline;
            }

            .add-more3 {
                float: inline;
            }

            .remove3 {
                float: inline;
            }
        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .add-more1 {
                float: inline;
            }

            .remove1 {
                float: inline;
            }

            .add-more12 {
                float: inline;
            }

            .remove2 {
                float: inline;
            }

            .add-more3 {
                float: inline;
            }

            .remove3 {
                float: inline;
            }
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
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Setting Profile', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST" action="{{ route('savecustomer') }}"
                                        enctype="multipart/form-data">
                                        @csrf
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
                                            </div>
                                            @error('foto')
                                                <div class="invalid-feedback">
                                                    <span style="color:red">
                                                        {{ GoogleTranslate::trans('Ukuran File tidak boleh lebih dari 300Kb', session()->get('language') ?? 'id') }}
                                                    </span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Nama Lengkap', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <input type="text" name="nama_lengkap" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Nama Lengkap"
                                                    data-placement="bottom" required />
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
                                                    data-placement="bottom" required />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Alamat', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <textarea id="autosize" name="alamat" class="span6 ckeditor" required></textarea>
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
        </script>
    @endpush
