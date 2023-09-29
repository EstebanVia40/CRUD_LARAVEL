<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados',function(Blueprint $table){
            $table->increments('ide');
            $table->string('nombre',20);
            $table->string('edad',20);
            $table->string('apellido',20);
            $table->string('telefono',10);
            $table->string('email',20);
            $table->string('inf',50);         
            //llave foranea
            $table->integer('id_dep')->unsigned();
            $table->foreign('id_dep')->references('id')->on('departamentos');
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
        Schema::drop('empleados');
    }
}
