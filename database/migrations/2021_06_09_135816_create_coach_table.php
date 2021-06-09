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
            $table->bigInteger('id_team')->unsigned();
            $table->string('nama_coach', 100);
            $table->integer('jenis_kelamin')->unsigned()->default(1);
            $table->text('alamat');
            $table->string('foto', 100);
            $table->string('status', 20);

            $table->foreign('id_team')->references('id_team')->on('team')->onUpdate('CASCADE')->onDelete('CASCADE');

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
