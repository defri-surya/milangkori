@extends('layouts.backend.master')

@section('title', 'Create Withdraw | Pengelola Wisata')

@section('style')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                    <h5>&nbsp;{{ GoogleTranslate::trans('Withdraw', session()->get('language') ?? 'id') }}
                                    </h5>
                                </header>
                                <div id="div-1" class="accordion-body collapse in body">
                                    <form class="form-horizontal" method="POST" action="{{ route('storewithdraw') }}">
                                        {{ csrf_field() }}
                                        @if ($pengelola != null)
                                            @php
                                                $saldo = App\Transaksi::where('status_pembayaran', 'Terbayar')
                                                    ->where('pengelola_wisata_id', $pengelola->id)
                                                    ->sum('harga');
                                                $wdSelesai = App\withdraw::where('status', 'Selesai')
                                                    ->where('pengelolawisata_id', $pengelola->id)
                                                    ->sum('nominal');
                                                
                                                $saldoAkhirSelesai = $saldo - $wdSelesai;
                                            @endphp
                                            <div class="control-group">
                                                <label for="jumlah1"
                                                    class="control-label">{{ GoogleTranslate::trans('Saldo', session()->get('language') ?? 'id') }}</label>
                                                <div class="controls with-tooltip">
                                                    <input type="text" id="jumlah1" class="span6 input-tooltip"
                                                        value="Rp. {{ number_format($saldoAkhirSelesai) }}" disabled />
                                                </div>
                                            </div>
                                        @else
                                            @php
                                                $saldo1 = App\Transaksi::where('status_pembayaran', 'Terbayar')
                                                    ->where('pengelola_wisata_id', auth()->user()->id)
                                                    ->sum('harga');
                                                $wdSelesai1 = App\withdraw::where('status', 'Selesai')
                                                    ->where('pengelolawisata_id', auth()->user()->id)
                                                    ->sum('nominal');
                                                
                                                $saldoAkhirSelesai1 = $saldo - $wdSelesai;
                                            @endphp
                                            <div class="control-group">
                                                <label for="jumlah1"
                                                    class="control-label">{{ GoogleTranslate::trans('Saldo', session()->get('language') ?? 'id') }}</label>
                                                <div class="controls with-tooltip">
                                                    <input type="text" id="jumlah1" class="span6 input-tooltip"
                                                        value="Rp. {{ number_format($saldoAkhirSelesai1) }}" disabled />
                                                </div>
                                            </div>
                                        @endif
                                        <input type="hidden" name="pengelolawisata_id" value="{{ $pengelola->id }}">

                                        <div class="control-group">
                                            <label for="text1"
                                                class="control-label">{{ GoogleTranslate::trans('Nominal Penarikan', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="hidden" name="nominal" id="result">
                                                <input type="text" id="rupiah" class="span6 input-tooltip"
                                                    data-original-title="Masukkan Harga" data-placement="bottom" required />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="jumlah1"
                                                class="control-label">{{ GoogleTranslate::trans('Rekening Tujuan', session()->get('language') ?? 'id') }}</label>
                                            <div class="controls with-tooltip">
                                                <input type="text" name="no_rek" id="jumlah1"
                                                    class="span6 input-tooltip" value="{{ $pengelola->no_rek }}"
                                                    readonly />
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-large btn-block btn-warning"
                                            onclick="hitung_zakat_profesi_perbulan()">
                                            {{ GoogleTranslate::trans('Ajukan', session()->get('language') ?? 'id') }}
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
    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value);
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }

        function hitung_zakat_profesi_perbulan() {
            const formatRupiah = (money) => {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(money);
            }

            var convertRupiah = document.getElementById('rupiah').value;

            // ubah inputan menjadi Integer agar bisa dihitung
            var convertRupiah_int = Number(convertRupiah.replace(/[^0-9\-]+/g, ""));

            $('#result').val(convertRupiah_int);
        }
    </script>
@endpush
