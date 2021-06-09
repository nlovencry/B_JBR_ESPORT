<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player', function (Blueprint $table) {
            $table->bigIncrements('id_player')->unique();
            $table->bigInteger('id_game')->unsigned();
            $table->string('nama_player', 100);
            $table->integer('jenis_kelamin')->unsigned()->default(1);
            $table->text('alamat');
            $table->string('foto', 100);
            $table->string('status', 20);

            $table->foreign('id_game')->references('id_game')->on('game')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('player');
    }
}
