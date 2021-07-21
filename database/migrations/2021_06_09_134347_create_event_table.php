<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->bigIncrements('id_event')->unique();
            $table->bigInteger('id_game')->unsigned();
            $table->string('nama_event', 50);
            $table->date('tgl_mulai_pendaftaran');
            $table->date('tgl_akhir_pendaftaran');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->string('slot',11);
            $table->integer('price');
            $table->text('keterangan');
            $table->string('gambar', 100);
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
        Schema::dropIfExists('event');
    }
}
