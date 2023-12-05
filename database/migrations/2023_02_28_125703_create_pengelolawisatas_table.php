<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengelolawisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengelolawisatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_pengelola_wisata')->nullable();
            $table->string('logo')->nullable();
            $table->string('kontak')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('bank')->nullable();
            $table->enum('status', ['Belum Verifikasi', 'Verifikasi']);
            $table->text('about')->nullable();
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('pengelolawisatas');
    }
}
