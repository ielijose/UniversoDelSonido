<?php

class Imagen extends Eloquent {

	protected $table = 'imagenes';
	public $timestamp = true;


	public static function boot()
    {
        parent::boot();

        static::deleting(function($imagen)
        {   
            $img = public_path($imagen->imagen) ; 
            File::delete( $img ); 
        });

    }

}