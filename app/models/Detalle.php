<?php

class Detalle extends Eloquent {

	protected $table = 'detalles';
	public $timestamp = true;


	public function isValid()
	{
		return Validator::make(
			$this->toArray(),
			array('detalle'  => 'required')
			)->passes();
	}

	public static function boot()
	{
		parent::boot();

		Detalle::creating(function($detalle)
		{
			if ( ! $detalle->isValid()) return false;
		});

		Detalle::updating(function($post)
		{
			if ( ! $detalle->isValid()) return false;
		});
	}
}