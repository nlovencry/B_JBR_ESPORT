<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach', function (Blueprint $table) {
            $table->bigIncrements('id_coach')->unique();
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('id_game')->unsigned();
            $table->string('foto', 100);
            $table->string('winrate', 100);
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
        Schema::dropIfExists('coach');
    }
}
