<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingpaketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookingpaket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('paket_wisata_id');
            $table->foreignId('pengelolawisata_id');
            $table->foreignId('user_pengelola')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_paket_wisata');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('jenis_paket_wisata');
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->integer('qty');
            $table->integer('jml_org');
            $table->date('tgl_booking')->nullable();
            $table->integer('harga');
            $table->enum('status_pengelolawisata', ['Belum Verifikasi', 'Verifikasi']);
            $table->enum('status', ['Keranjang', 'Checkout']);
            $table->text('location')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('rating');
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
        Schema::dropIfExists('bookingpaket');
    }
}
