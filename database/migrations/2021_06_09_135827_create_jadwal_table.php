<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal')->unique();
            $table->bigInteger('id_game')->unsigned();
            $table->bigInteger('id_coach')->unsigned();
            $table->bigInteger('id_team')->unsigned();
            $table->string('nama_jadwal');
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_akhir')->nullable();
            $table->text('keterangan');
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
        Schema::dropIfExists('jadwal');
    }
}
