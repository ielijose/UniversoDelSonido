<?php

class CategoriaTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categorias')->delete();

        Categoria::create(
        	array(
                'id' => 1,
        		'portada' => '/uploads/portadas/portada-1.jpg',
        		'nombre' => 'Accesorios',
        		'color' => '#000'
        	)
        );

        Categoria::create(
        	array(
                'id' => 2,
        		'portada' => '/uploads/portadas/portada-1.jpg',
        		'nombre' => 'Repuestos',
        		'color' => '#000'
        	)
        );

        Categoria::create(
        	array(
                'id' => 3,
        		'portada' => '/uploads/portadas/portada-1.jpg',
        		'nombre' => 'Lentes',
        		'color' => '#000'
        	)
        );

        Categoria::create(
        	array(
                'id' => 4,
        		'portada' => '/uploads/portadas/portada-1.jpg',
        		'nombre' => 'Carteras',
        		'color' => '#f00'
        	)
        );

    }

}