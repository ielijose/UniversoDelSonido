<?php

class Producto extends Eloquent {

	protected $table = 'productos';
	public $timestamp = true;

	public function imagenes()
    {
        return $this->hasMany('Imagen');
    }

    public function imagen()
    {
        return $this->hasOne('Imagen');
    }

    public function detalles()
    {
        return $this->hasMany('Detalle');
    }

    public function comentarios()
    {
        return $this->hasMany('Comentario');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($producto)
        {   
            foreach ($producto->imagenes as $key => $value) {
                $img = public_path($value['imagen']) ; 
                File::delete( $img );
            }
            
        });

    }

}