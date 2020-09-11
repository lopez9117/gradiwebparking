<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa');
            $table->string('tipodevehiculo');
            $table->string('marca');
            $table->string('userid');
            $table->rememberToken();
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
         Schema::drop('vehicles');
    }
}


