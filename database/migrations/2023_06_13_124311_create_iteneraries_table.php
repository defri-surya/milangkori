<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItenerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iteneraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id')->constrained('paket_wisata')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pengelola_id')->constrained('pengelolawisatas')->onUpdate('cascade')->onDelete('cascade');
            $table->text('waktu');
            $table->text('kegiatan');
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
        Schema::dropIfExists('itenenaries');
    }
}
