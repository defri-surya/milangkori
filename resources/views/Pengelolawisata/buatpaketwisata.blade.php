@extends('layouts.backend.master')

@section('title', 'Home | Buat Paket Wisata')

@section('style')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .radio-container {
            display: inline-block;
        }

        .radio-container input[type="radio"] {
            display: inline-block;
            vertical-align: middle;
        }

        .radio-container label {
            display: inline-block;
            margin-right: 10px;
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
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Buat Paket Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST" action="{{ route('savebuatpaket') }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @if ($pengelolawisata != null)
                                            <input type="hidden" name="pengelola_wisata_id"
                                                value="{{ $pengelolawisata->id }}">
                                        @endif
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="status_pengelolawisata"
                                            value="{{ $pengelolawisata->status }}">
                                        <div class="control-group">
                                            <label for="text1"
                                                class="control-label">{{ GoogleTranslate::trans('Nama Paket Wisata', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="text" name="nama_paket_wisata" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Nama Paket Wisata" data-placement="bottom"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label
                                                class="control-label">{{ GoogleTranslate::trans('Kategori Paket Wisata', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <select class="chzn-select span6 select2" tabindex="2"
                                                    data-placeholder="Pilih Katagori" name="kategori_paket_wisata_id"
                                                    id="id" required>
                                                    <option value="">
                                                        {{ GoogleTranslate::trans('Pilih Kategori', session()->get('language') ?? 'id') }}
                                                    </option>
                                                    @foreach ($kategoripaketwisata as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_paket }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label
                                                class="control-label">{{ GoogleTranslate::trans('Lokasi Wisata', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <select data-placeholder="Pilih Lokasi" name="lokasi"
                                                    class="chzn-select span6 select2" tabindex="2" required>
                                                    <option value="">
                                                        {{ GoogleTranslate::trans('Pilih Lokasi', session()->get('language') ?? 'id') }}
                                                    </option>
                                                    @foreach ($kota as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Foto 1', session()->get('language') ?? 'id') }}
                                                <br> <b style="color:red; font-size:12px">*</b><b
                                                    style="font-size:12px"><i>{{ GoogleTranslate::trans('Max Size 300kb', session()->get('language') ?? 'id') }}</i></b></label>
                                            <div class="controls">
                                                <input type="file" name="foto1" id="text1"
                                                    class="span6 input-tooltip @error('foto1') is-invalid @enderror"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom" />
                                                @error('foto1')
                                                    <div class="alert alert-danger">
                                                        {{ GoogleTranslate::trans(
                                                            'Maaf, Ukuran gambar tidak boleh lebih dari 300kb!',
                                                            session()->get('language') ?? 'id',
                                                        ) }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Foto 2', session()->get('language') ?? 'id') }}
                                                <br> <b style="color:red; font-size:12px">*</b><b
                                                    style="font-size:12px"><i>{{ GoogleTranslate::trans('Max Size 300kb', session()->get('language') ?? 'id') }}</i></b></label>
                                            <div class="controls">
                                                <input type="file" name="foto2" id="text1"
                                                    class="span6 input-tooltip @error('foto2') is-invalid @enderror"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom" />
                                                @error('foto2')
                                                    <div class="alert alert-danger">
                                                        {{ GoogleTranslate::trans(
                                                            'Maaf, Ukuran gambar tidak boleh lebih dari 300kb!',
                                                            session()->get('language') ?? 'id',
                                                        ) }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Foto 3', session()->get('language') ?? 'id') }}
                                                <br> <b style="color:red; font-size:12px">*</b><b
                                                    style="font-size:12px"><i>{{ GoogleTranslate::trans('Max Size 300kb', session()->get('language') ?? 'id') }}</i></b></label>
                                            <div class="controls">
                                                <input type="file" name="foto3" id="text1"
                                                    class="span6 input-tooltip @error('foto3') is-invalid @enderror"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom" />
                                                @error('foto3')
                                                    <div class="alert alert-danger">
                                                        {{ GoogleTranslate::trans(
                                                            'Maaf, Ukuran gambar tidak boleh lebih dari 300kb!',
                                                            session()->get('language') ?? 'id',
                                                        ) }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Foto 4', session()->get('language') ?? 'id') }}
                                                <br> <b style="color:red; font-size:12px">*</b><b
                                                    style="font-size:12px"><i>{{ GoogleTranslate::trans('Max Size 300kb', session()->get('language') ?? 'id') }}</i></b></label>
                                            <div class="controls">
                                                <input type="file" name="foto4" id="text1"
                                                    class="span6 input-tooltip @error('foto4') is-invalid @enderror"
                                                    data-original-title="Masukkan Judul Lowongan"
                                                    data-placement="bottom" />
                                                @error('foto4')
                                                    <div class="alert alert-danger">
                                                        {{ GoogleTranslate::trans(
                                                            'Maaf, Ukuran gambar tidak boleh lebih dari 300kb!',
                                                            session()->get('language') ?? 'id',
                                                        ) }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label
                                                class="control-label">{{ GoogleTranslate::trans('Jenis Paket Wisata', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls checkbox-group">
                                                <label>
                                                    <input class="form-check-input" type="radio"
                                                        name="jenis_paket_wisata" id="inlineRadio1" value="Menginap"
                                                        required>
                                                    {{ GoogleTranslate::trans('Menginap', session()->get('language') ?? 'id') }}
                                                </label>
                                                <label>
                                                    <input class="form-check-input" type="radio"
                                                        name="jenis_paket_wisata" id="inlineRadio2" value="DayTrip"
                                                        required>
                                                    {{ GoogleTranslate::trans('Day Trip', session()->get('language') ?? 'id') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label
                                                class="control-label">{{ GoogleTranslate::trans('Harga Satuan Paket', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls checkbox-group">
                                                <label>
                                                    <input class="uniform checkboxes" name="harga_satuan_paket"
                                                        id="radioGroup" value="Group" type="radio" value="Group"
                                                        required>
                                                    {{ GoogleTranslate::trans('Grup', session()->get('language') ?? 'id') }}
                                                </label>
                                                <label>
                                                    <input class="uniform checkboxes" name="harga_satuan_paket"
                                                        id="radioPersonal" value="Personal" type="radio"
                                                        value="Personal" required>
                                                    {{ GoogleTranslate::trans('Personal', session()->get('language') ?? 'id') }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="jumlah1"
                                                class="control-label">{{ GoogleTranslate::trans('Max Peserta', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="number" name="max_person" id="jumlah1"
                                                    class="span6 input-tooltip" data-original-title="Jumlah Orang"
                                                    data-placement="bottom" min="0" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="jumlah1"
                                                class="control-label">{{ GoogleTranslate::trans('Min Peserta', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="number" name="min_person" id="jumlah1"
                                                    class="span6 input-tooltip" data-original-title="Jumlah Orang"
                                                    data-placement="bottom" min="0" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="text1"
                                                class="control-label">{{ GoogleTranslate::trans('Harga Paket', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="number" name="harga" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Harga"
                                                    data-placement="bottom" required />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label
                                                class="control-label">{{ GoogleTranslate::trans('Tanggal', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls checkbox-group">
                                                <div class="radio-container">
                                                    <input type="radio" id="option1" name="pilihan"
                                                        value="by_request" required>
                                                    <label
                                                        for="option1">{{ GoogleTranslate::trans('By Request', session()->get('language') ?? 'id') }}</label>

                                                    <input type="radio" id="option2" name="pilihan"
                                                        value="set_tanggal" required>
                                                    <label
                                                        for="option2">{{ GoogleTranslate::trans('Tentukan Tanggal', session()->get('language') ?? 'id') }}</label>
                                                </div>
                                            </div>

                                            <div class="controls controls-row" id="tglForm1"
                                                style="display: none; margin-top:10px">
                                                <input type="hidden" name="before_booking" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom"
                                                    value="3" />
                                            </div>

                                            <div class="controls controls-row" id="tglForm"
                                                style="display: none; margin-top:10px">
                                                <input type="date" name="tgl_mulai" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Judul Lowongan"
                                                    data-placement="bottom" />
                                                <label class="control-label"
                                                    style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                <input type="date" name="tgl_akhir" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Judul Lowongan"
                                                    data-placement="bottom" />
                                                <input type="hidden" name="before_booking" id="text1"
                                                    class="span3 input-tooltip"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom"
                                                    value="0" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label
                                                class="control-label">{{ GoogleTranslate::trans('Itenerary', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls controls-row">
                                                <input type="time" name="waktu[]" id="text1"
                                                    class="span3 input-tooltip" data-original-title="Jam"
                                                    data-placement="bottom" required />
                                                <label class="control-label"
                                                    style="margin-right: 8px; width:15px"><b>&#8211;</b></label>
                                                <textarea type="text" name="kegiatan[]" id="text1" class="span6 input-tooltip"
                                                    data-original-title="Masukkan kegiatan" data-placement="bottom" placeholder="kegiatan" rows="2" required></textarea>
                                                <button type="button"
                                                    class="btn waves-effect waves-light btn-primary btn-outline-primary btn-small"
                                                    style="border-radius: 10px; margin-left: 8px; height: 48px"
                                                    id="dynamic-ar"><i class="fas fa-plus-circle"></i></button>
                                            </div>
                                        </div>

                                        <!-- Dynamic Form -->
                                        <div class="control-group" id="dynamicAddRemove">
                                        </div>
                                        <!-- End Dynamic Form -->

                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Deskripsi', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <textarea id="about" name="deskripsi" class="span6 ckeditor" required> </textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="text1"
                                                class="control-label">{{ GoogleTranslate::trans('Link Youtube (Opsional)', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="text" name="tumb_yt" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Link Youtube (Opsional)"
                                                    data-placement="bottom" />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-large btn-block btn-warning">
                                            {{ GoogleTranslate::trans('Simpan & Publish', session()->get('language') ?? 'id') }}
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

@push('script')
    <script src="{{ asset('assets') }}/backend/assets/js/select2.min.js"></script>
    <script>
        $('.select2').select2();
    </script>

    <script type="text/javascript">
        $("#dynamic-ar").click(function() {
            const nextIndex = $("#dynamicAddRemove").find("input[name='waktu[]']").length;
            $("#dynamicAddRemove").append(
                '<div class="controls controls-row" style="margin-bottom: 20px"><input type="time" name="waktu[]" id="text1" class="span3 input-tooltip" data-original-title="Jam" data-placement="bottom" required /><label class="control-label" style="margin-right: 8px; width:15px"><b>&#8211;</b></label><textarea type="text" name="kegiatan[]" id="text1" class="span6 input-tooltip" data-original-title="Masukkan kegiatan" data-placement="bottom" placeholder="kegiatan" rows="2" required></textarea><div class="card-block icon-btn"><button type="button" class="btn waves-effect waves-light btn-danger btn-outline-danger btn-small remove-input-field" style="border-radius: 10px; margin-left: 8px; height: 48px"><i class="fas fa-trash"></i></button></div></div>'
            );
        });

        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('.controls-row').remove();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var checkboxes = $('.checkboxes');
            checkboxes.change(function() {
                if ($('.checkboxes:checked').length > 0) {
                    checkboxes.removeAttr('required');
                } else {
                    checkboxes.attr('required', 'required');
                }
            });
        });
    </script>

    <script>
        var radioOptions = document.getElementsByName("pilihan");
        var tglForm = document.getElementById("tglForm");

        for (var i = 0; i < radioOptions.length; i++) {
            radioOptions[i].addEventListener("change", function() {
                if (this.value === "set_tanggal") {
                    tglForm.style.display = "block";
                } else {
                    tglForm.style.display = "none";
                }
            });
        }
    </script>

    <script>
        var radioOptions1 = document.getElementsByName("pilihan");
        var tglForm1 = document.getElementById("tglForm1");

        for (var i = 0; i < radioOptions1.length; i++) {
            radioOptions1[i].addEventListener("change", function() {
                if (this.value === "by_request") {
                    tglForm1.style.display = "block";
                } else {
                    tglForm1.style.display = "none";
                }
            });
        }
    </script>
@endpush
