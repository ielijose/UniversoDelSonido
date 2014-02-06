<?php

use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalles', function($table)
	    {
	        $table->increments('id');
	        $table->string('detalle');
	        $table->integer('producto_id')->unsigned();
	        $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
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
		Schema::drop('detalles');
	}

}