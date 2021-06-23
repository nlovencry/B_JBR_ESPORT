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
            $table->bigInteger('id_team')->unsigned();
            $table->string('email', 100);
            $table->string('nama_player', 100);
            $table->string('jenis_kelamin', 5);
            $table->string('usia', 5);
            $table->string('nohp_player', 13);
            $table->text('alamat');
            $table->string('foto', 100);
            $table->string('winrate', 100);
            $table->string('izin_ortu', 5);
            $table->string('bersedia_offline', 5);
            $table->string('nohp_ortu', 13);
            $table->string('password', 50);
            $table->string('is_active', 5);
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
