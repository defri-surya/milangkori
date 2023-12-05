@extends('layouts.backend.master')

@section('title', 'Home | Pengelola Wisata')

@section('content')
    <div id="content">
        <div class="container-fluid outer">
            <div class="row-fluid">
                <div class="span12 inner">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box">
                                <header>
                                    <h5>{{ GoogleTranslate::trans('Profil Pemandu Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                    <div class="toolbar">
                                        @if ($data == null)
                                            <a href="{{ route('settingprofilepengelola') }}" rel="tooltip"
                                                data-placement="bottom" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                                {{ GoogleTranslate::trans('Edit Profil', session()->get('language') ?? 'id') }}
                                            </a>
                                        @else
                                            <a href="{{ route('editprofilepengelola', $data->id) }}" rel="tooltip"
                                                data-placement="bottom" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                                {{ GoogleTranslate::trans('Edit Profil', session()->get('language') ?? 'id') }}
                                            </a>
                                        @endif
                                    </div>
                                </header>
                                <div class="body">
                                    {{-- <h5 style="margin-left:3px">Kode Registrasi</h5>
                                    <p style="margin-left: 3px"><b>{{ $user->kode_registrasi }}</b></p> --}}
                                    <h5 style="margin-top: 25px">
                                        {{ GoogleTranslate::trans('Nama Pemandu Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                    @if ($data->nama_pengelola_wisata == null)
                                        <p style="margin-left: 3px">
                                            <i>{{ GoogleTranslate::trans('Data tidak tersedia', session()->get('language') ?? 'id') }}</i>
                                        </p>
                                    @else
                                        <p style="margin-left: 3px">{{ $data->nama_pengelola_wisata }}</p>
                                    @endif
                                    <h5 style="margin-top: 25px; margin-left:3px">
                                        {{ GoogleTranslate::trans('Nomor Telepon', session()->get('language') ?? 'id') }}
                                    </h5>
                                    @if ($data->kontak == null)
                                        <p style="margin-left: 3px">
                                            <i>{{ GoogleTranslate::trans('Data tidak tersedia', session()->get('language') ?? 'id') }}</i>
                                        </p>
                                    @else
                                        <p style="margin-left: 3px">{{ $data->kontak }}</p>
                                    @endif
                                    <h5 style="margin-top: 25px; margin-left:3px">
                                        {{ GoogleTranslate::trans('Alamat Pemandu Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                    @if ($data->alamat == null)
                                        <p style="margin-left: 3px">
                                            <i>{{ GoogleTranslate::trans('Data tidak tersedia', session()->get('language') ?? 'id') }}</i>
                                        </p>
                                    @else
                                        <p style="margin-left: 3px">{{ $data->alamat }}</p>
                                    @endif
                                    <h5 style="margin-top: 25px; margin-left:3px">
                                        {{ GoogleTranslate::trans('Tentang Pemandu Wisata', session()->get('language') ?? 'id') }}
                                    </h5>
                                    @if ($data->about == null)
                                        <p style="margin-left: 3px">
                                            <i>{{ GoogleTranslate::trans('Data tidak tersedia', session()->get('language') ?? 'id') }}</i>
                                        </p>
                                    @else
                                        <p style="margin-left: 3px">{!! GoogleTranslate::trans($data->about, session()->get('language') ?? 'id') !!}</p>
                                    @endif
                                    <br>
                                    <header>
                                        <h5>&nbsp;{{ GoogleTranslate::trans('Informasi Pembayaran', session()->get('language') ?? 'id') }}
                                        </h5>
                                    </header>
                                    <h5 style="margin-top: 25px; margin-left:3px">
                                        {{ GoogleTranslate::trans('Nomor Rekening', session()->get('language') ?? 'id') }}
                                    </h5>
                                    @if ($data->no_rek == null)
                                        <p style="margin-left: 3px">
                                            <i>{{ GoogleTranslate::trans('Data tidak tersedia', session()->get('language') ?? 'id') }}</i>
                                        </p>
                                    @else
                                        <p style="margin-left: 3px">{{ $data->no_rek }}</p>
                                    @endif
                                    <h5 style="margin-top: 25px; margin-left:3px">
                                        {{ GoogleTranslate::trans('Nama Bank', session()->get('language') ?? 'id') }} </h5>
                                    @if ($data->bank == null)
                                        <p style="margin-left: 3px">
                                            <i>{{ GoogleTranslate::trans('Data tidak tersedia', session()->get('language') ?? 'id') }}</i>
                                        </p>
                                    @else
                                        <p style="margin-left: 3px">{{ $data->bank }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
