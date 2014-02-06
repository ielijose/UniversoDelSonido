<?php

class Categoria extends Eloquent {

	protected $table = 'categorias';
	public $timestamp = true;

	public function productos()
    {
        return $this->hasMany('Producto');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($categoria)
        {   
            $img = public_path($categoria->portada) ; 
            File::delete( $img ); 
        });
    }

}