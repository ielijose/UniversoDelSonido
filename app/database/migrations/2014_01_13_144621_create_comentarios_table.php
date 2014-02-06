<?php

use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comentarios', function($table)
	    {
	        $table->increments('id');
	        $table->string('nombre');
	        $table->string('email');
	        $table->string('telefono');
	        $table->text('comentario');
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
		Schema::drop('comentarios');
	}

}