<?php

use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facturas', function($table)
	    {
	        $table->increments('id');
	        $table->string('nombre');
	        $table->string('telefono');
	        $table->string('correo');
	        $table->string('direccion');
	        $table->string('slug');
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
		Schema::drop('facturas');
	}

}