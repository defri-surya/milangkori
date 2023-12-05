@extends('layouts.backend.master')

@section('title', 'Home | Customer')

@section('content')
    <div id="content">
        <!-- .outer -->
        <div class="container-fluid outer">
            <div class="row-fluid">
                <!-- .inner -->
                <div class="span12 inner">
                    <div class="row-fluid">
                        <div class="span12">
                            <h5 style="font-size: large">&nbsp;
                                {{ GoogleTranslate::trans('Profil Anda', session()->get('language') ?? 'id') }}</h5>
                            <div class="box">
                                <header>
                                    <div class="toolbar">
                                        @if ($datacv == null)
                                            <a href="{{ route('settingcustomer') }}" rel="tooltip" data-placement="bottom"
                                                class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                                {{ GoogleTranslate::trans('Edit Profil', session()->get('language') ?? 'id') }}
                                            </a>
                                        @else
                                            <a href="{{ route('editcustomer', $datacv->id) }}" rel="tooltip"
                                                data-placement="bottom" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                                {{ GoogleTranslate::trans('Edit Profil', session()->get('language') ?? 'id') }}
                                            </a>
                                        @endif
                                    </div>
                                </header>
                                <div class="body">
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Nama Lengkap', session()->get('language') ?? 'id') }}
                                    </h5>
                                    @if ($datacv == null)
                                        <p>
                                            <i>{{ $user->name }} </i>
                                            <!--<i>Data kosong!</i>-->
                                        </p>
                                    @else
                                        <p>
                                            {{ $datacv->nama_lengkap }}
                                        </p>
                                    @endif
                                    <h5 style="font-size: large; margin-top: 25px">
                                        {{ GoogleTranslate::trans('Kontak', session()->get('language') ?? 'id') }}</h5>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <p style="margin-top: 0">
                                                <b>{{ GoogleTranslate::trans('Email', session()->get('language') ?? 'id') }}</b>
                                            </p>
                                            <p style="margin-top: 0">
                                                <b>{{ GoogleTranslate::trans('Nomor Telepon', session()->get('language') ?? 'id') }}</b>
                                            </p>
                                            <p style="margin-top: 0">
                                                <b>{{ GoogleTranslate::trans('Alamat', session()->get('language') ?? 'id') }}
                                                </b>
                                            </p>
                                        </div>
                                        <div class="span10">
                                            @if ($datacv == null)
                                                <p>
                                                    <i>{{ $user->email }} </i>
                                                    <!--<i>Data kosong!</i>-->
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{{ $datacv->email }}</p>
                                            @endif
                                            @if ($datacv == null)
                                                <p>
                                                    <i>{{ $user->no_hp }} </i>
                                                    <!--<i>Data kosong!</i>-->
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{{ $datacv->no_hp }}</p>
                                            @endif
                                            @if ($datacv == null)
                                                <p>
                                                    <i>{{ GoogleTranslate::trans('Data Kosong!', session()->get('language') ?? 'id') }}</i>
                                                </p>
                                            @else
                                                <p style="margin-top: 0">{!! $datacv->alamat !!}</p>
                                            @endif
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
    </div>
@endsection
