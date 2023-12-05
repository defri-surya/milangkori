@extends('layouts.backend.master')

@section('title', 'Home | Paket Wisata')

@section('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        .radio {
            margin-left: 13px;
        }

        /* // CSS untuk lokasi Vertical ,Tanggal, By Request dan Tentukan Tanggal  */
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
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Edit Paket Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('updatepaketwisata', $data->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="pengelola_wisata_id" value="{{ $pengelolawisata->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                        <div class="control-group">
                                            <label for="text1"
                                                class="control-label">{{ GoogleTranslate::trans('Nama Paket Wisata', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="text" name="nama_paket_wisata" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Nama Paket"
                                                    data-placement="bottom"
                                                    value="{{ GoogleTranslate::trans($data->nama_paket_wisata, session()->get('language') ?? 'id') }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label
                                                class="control-label">{{ GoogleTranslate::trans('Kategori Paket Wisata', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <select class="chzn-select span6 select2" tabindex="2"
                                                    data-placeholder="Pilih Katagori" name="kategori_paket_wisata_id"
                                                    id="kategori_paket_wisata_id">
                                                    <option selected disabled>
                                                        {{ GoogleTranslate::trans('Pilih Kategori', session()->get('language') ?? 'id') }}
                                                    </option>
                                                    @foreach ($kategoripaketwisata as $item)
                                                        <option
                                                            {{ $data->kategori_paket_wisata_id == $item->id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">
                                                            {{ $item->nama_paket }}
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
                                                    class="chzn-select span6 select2" tabindex="2">
                                                    <option selected disabled>
                                                        {{ GoogleTranslate::trans('Pilih Lokasi', session()->get('language') ?? 'id') }}
                                                    </option>
                                                    @foreach ($kota as $item)
                                                        <option {{ $data->lokasi == $item->id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">{{ $item->name }}</option>
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
                                                <img width="150" src="{{ asset($data->foto1) }}" alt="">
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
                                                <img width="150" src="{{ asset($data->foto2) }}" alt="">
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
                                                <img width="150" src="{{ asset($data->foto3) }}" alt="">
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
                                                <img width="150" src="{{ asset($data->foto4) }}" alt="">
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
                                                        {{ $data->jenis_paket_wisata == 'Menginap' ? 'checked' : '' }}
                                                        name="jenis_paket_wisata" id="inlineRadio1" value="Menginap">
                                                    {{ GoogleTranslate::trans('Menginap', session()->get('language') ?? 'id') }}
                                                </label>
                                                <label>
                                                    <input class="form-check-input" type="radio"
                                                        {{ $data->jenis_paket_wisata == 'DayTrip' ? 'checked' : '' }}
                                                        name="jenis_paket_wisata" id="inlineRadio2" value="DayTrip">
                                                    {{ GoogleTranslate::trans('Day Trip', session()->get('language') ?? 'id') }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label
                                                class="control-label">{{ GoogleTranslate::trans('Harga Satuan Paket', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls checkbox-group">
                                                <label>
                                                    <input class="uniform checkboxes"
                                                        {{ $data->harga_satuan_paket == 'Group' ? 'checked' : '' }}
                                                        name="harga_satuan_paket" id="exampleRadios3" value="Group"
                                                        type="radio">
                                                    {{ GoogleTranslate::trans('Grup', session()->get('language') ?? 'id') }}
                                                </label>
                                                <label>
                                                    <input class="uniform checkboxes"
                                                        {{ $data->harga_satuan_paket == 'Personal' ? 'checked' : '' }}
                                                        name="harga_satuan_paket" id="exampleRadios4" value="Personal"
                                                        type="radio">
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
                                                    data-placement="bottom" min="0"
                                                    value="{{ $data->max_person }}" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="jumlah1"
                                                class="control-label">{{ GoogleTranslate::trans('Min Peserta', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="number" name="min_person" id="jumlah1"
                                                    class="span6 input-tooltip" data-original-title="Jumlah Orang"
                                                    data-placement="bottom" min="0"
                                                    value="{{ $data->min_person }}" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="text1"
                                                class="control-label">{{ GoogleTranslate::trans('Harga Paket', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="number" name="harga" id="text1"
                                                    class="span6 input-tooltip" data-original-title="Masukkan Harga"
                                                    data-placement="bottom" value="{{ $data->harga }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label
                                                class="control-label">{{ GoogleTranslate::trans('Tanggal', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls checkbox-group">
                                                <div class="radio-container">
                                                    <input type="radio"
                                                        {{ $data->pilihan == 'by_request' ? 'checked' : '' }}
                                                        id="option1" name="pilihan" value="by_request" required>
                                                    <label
                                                        for="option1">{{ GoogleTranslate::trans('By Request', session()->get('language') ?? 'id') }}</label>

                                                    <input type="radio"
                                                        {{ $data->pilihan == 'set_tanggal' ? 'checked' : '' }}
                                                        id="option2" name="pilihan" value="set_tanggal" required>
                                                    <label
                                                        for="option2">{{ GoogleTranslate::trans('Tentukan Tanggal', session()->get('language') ?? 'id') }}</label>
                                                </div>
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
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Deskripsi', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <textarea id="autosize" name="deskripsi" class="span6 ckeditor">{{ $data->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="text1"
                                                class="control-label">{{ GoogleTranslate::trans('Link Youtube (Opsional)', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="text" name="tumb_yt" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Link Youtube (Opsional)" data-placement="bottom"
                                                    value="{{ $data->tumb_yt }}" />
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>{{ GoogleTranslate::trans('Itenerary', session()->get('language') ?? 'id') }}
                                        </h4>
                                        <div class="controls controls-row">
                                            @foreach ($arrayWaktu as $key => $value)
                                                <div class="text-dark-remove1">
                                                    <div class="control-group">
                                                        <div class="controls-row" style="margin-bottom: 10px">
                                                            <input type="time" name="waktu[]" id="text1"
                                                                class="span3 input-tooltip"
                                                                data-original-title="Masukkan Nama Sekolah"
                                                                data-placement="bottom" placeholder="waktu"
                                                                value="{{ $value }}" />

                                                            <label class="control-label"
                                                                style="margin-right: 8px; width:15px"><b>&#8211;</b></label>

                                                            <textarea type="text" name="kegiatan[]" id="text1" class="span6 input-tooltip"
                                                                data-original-title="Masukkan Jurusan" data-placement="bottom" placeholder="kegiatan" rows="3"
                                                                value="{{ $arrayKegiatan[$key] }}"> {{ $arrayKegiatan[$key] }}</textarea>
                                                            &nbsp;&nbsp;
                                                            <a class="btn btn-danger remove-data1"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-dark2 after-add-more2">
                                        </div>
                                        <a class="btn btn-success add-more2"><i class="fas fa-plus"></i>
                                            {{ GoogleTranslate::trans('Tambah Perjalanan', session()->get('language') ?? 'id') }}</a>
                                        <div class="control-group">
                                        </div>
                                        &nbsp;&nbsp;
                                        <button type="submit" class="btn btn-large btn-block btn-warning">
                                            {{ GoogleTranslate::trans('Save & Publish', session()->get('language') ?? 'id') }}
                                        </button>
                                    </form>
                                    <div class="copy2 invisible" hidden>
                                        <div class="text-dark2">
                                            <div class="control-group">
                                                <div class="controls controls-row">
                                                    <input type="time" name="waktu[]" id="text1"
                                                        class="span3 input-tooltip" data-original-title="Masukkan waktu"
                                                        data-placement="bottom" placeholder="waktu" />

                                                    <label class="control-label"
                                                        style="margin-right: 8px; width:15px"><b>&#8211;</b></label>

                                                    <textarea type="text" name="kegiatan[]" id="text1" class="span6 input-tooltip"
                                                        data-original-title="Masukkan kegiatan" data-placement="bottom" placeholder="kegiatan" rows="3"> </textarea>

                                                    &nbsp;&nbsp;
                                                    <a class="btn btn-danger remove2"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
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
        <!-- /.outer -->
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets') }}/backend/assets/js/select2.min.js"></script>
    <script>
        $('.select2').select2();
    </script>

    <script src="{{ asset('assets') }}/backend/assets/js/multiple-form.js"></script>

    <script type="text/javascript">
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
@endpush
