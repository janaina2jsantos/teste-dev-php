<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_marca')->unsigned()->nullable(); // fk 
            $table->string('modelo');
            $table->string('ano');

            $table->timestamps();

            $table->foreign('id_marca')->references('id')->on('marcas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('carros');
        Schema::enableForeignKeyConstraints();
    }
}
