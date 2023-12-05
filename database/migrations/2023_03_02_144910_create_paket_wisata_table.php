<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_paket_wisata_id')->constrained('kategori_paket_wisata')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pengelola_wisata_id')->constrained('pengelolawisatas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_paket_wisata');
            $table->text('foto1')->nullable();
            $table->text('foto2')->nullable();
            $table->text('foto3')->nullable();
            $table->text('foto4')->nullable();
            $table->integer('harga');
            $table->integer('min_person');
            $table->integer('max_person');
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->integer('before_booking');
            $table->string('pilihan');
            $table->string('jenis_paket_wisata');
            $table->string('harga_satuan_paket');
            $table->enum('status_pengelolawisata', ['Belum Verifikasi', 'Verifikasi']);
            $table->text('lokasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('tumb_yt')->nullable();
            $table->string('slug');
            $table->integer('rating');
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
        Schema::dropIfExists('paket_wisata');
    }
}
