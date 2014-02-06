<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function($table)
	    {
	        $table->increments('id');
	        $table->string('nombre');
	        $table->string('precio');
	        $table->text('descripcion');
	        $table->integer('categoria_id')->unsigned()->nullable();
	        $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
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
		Schema::drop('productos');
	}

}