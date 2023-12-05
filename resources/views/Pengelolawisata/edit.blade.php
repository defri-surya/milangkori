@extends('layouts.backend.master')

@section('title', 'Home | Edit Profile')

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
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Edit Profil Pemandu Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('updateprofilepengelola', $data->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Foto', session()->get('language') ?? 'id') }}
                                                <br> <b style="color:red; font-size:12px">*</b><b
                                                    style="font-size:12px"><i>{{ GoogleTranslate::trans('Max Size 300kb', session()->get('language') ?? 'id') }}</i></b></label>
                                            <div class="controls">
                                                <input type="file" name="logo" id="text1"
                                                    class="span6 input-tooltip @error('logo') is-invalid @enderror"
                                                    data-original-title="Masukkan Judul Lowongan" data-placement="bottom" />
                                                <img width="150" src="{{ asset($data->logo) }}" alt="">
                                                @error('logo')
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
                                                class="control-label">{{ GoogleTranslate::trans('Nama Pemandu Wisata', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <input type="text" name="nama_pengelola_wisata" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Nama Pengelola" data-placement="bottom"
                                                    value="{{ $data->nama_pengelola_wisata }}" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Alamat', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <textarea id="autosize" name="alamat" class="span6">{{ $data->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Nomor Telepon', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <textarea id="autosize" name="kontak" class="span6">{{ $data->kontak }}</textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Tentang Pemandu Wisata', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <textarea id="about" name="about" class="span6 ckeditor">{{ $data->about }}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <header>
                                            <h5>&nbsp;{{ GoogleTranslate::trans('Informasi Pembayaran', session()->get('language') ?? 'id') }}
                                            </h5>
                                        </header>
                                        <br>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Nomor Rekening', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <input type="number" name="no_rek" id="text1"
                                                    class="span6 input-tooltip"
                                                    data-original-title="Masukkan Nomor Rekening" data-placement="bottom"
                                                    value="{{ $data->no_rek }}" required />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="autosize"
                                                class="control-label">{{ GoogleTranslate::trans('Nama Bank', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls">
                                                <select class="chzn-select span6 select2" tabindex="2"
                                                    data-placeholder="Pilih Bank" name="bank" id="id" required>
                                                    <option value="">Pilih Bank</option>
                                                    <option {{ $data->bank == 'BCA' ? 'selected' : '' }} value="BCA">BCA
                                                    </option>
                                                    <option {{ $data->bank == 'Mandiri' ? 'selected' : '' }}
                                                        value="Mandiri">Mandiri</option>
                                                    <option {{ $data->bank == 'BRI' ? 'selected' : '' }} value="BRI">BRI
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-large btn-block btn-warning">
                                            {{ GoogleTranslate::trans('Save & Publish', session()->get('language') ?? 'id') }}
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
