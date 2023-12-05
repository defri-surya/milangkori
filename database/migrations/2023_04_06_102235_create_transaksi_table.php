<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('paket_wisata_id');
            $table->foreignId('pengelola_wisata_id');
            $table->foreignId('user_pengelola')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nomor_urut');
            $table->date('tgl_transaksi');
            $table->date('tgl_booking');
            $table->string('qty');
            $table->integer('harga');
            $table->string('total_orang');
            $table->string('metode_bayar')->nullable();
            $table->enum('status_pembayaran', ['Menunggu Pembayaran', 'Terbayar', 'Gagal']);
            $table->enum('status_lanjutan', ['Proses', 'Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
