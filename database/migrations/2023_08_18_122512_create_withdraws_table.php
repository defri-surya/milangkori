<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengelolawisata_id')->constrained('pengelolawisatas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode');
            $table->date('tgl_request');
            $table->date('tgl_konfirm')->nullable();
            $table->string('no_rek');
            $table->integer('nominal');
            $table->enum('status', ['Proses', 'Selesai']);
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
        Schema::dropIfExists('withdraws');
    }
}
