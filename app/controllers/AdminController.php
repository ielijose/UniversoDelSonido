<?php

class AdminController extends BaseController {
    
    public function perfil()
    {   

        $usuario = Usuario::find(  Auth::user()->id  );

        return View::make('admin.perfil', array('usuario' => $usuario)); 
    }

    public function post_perfil()
    {   
        $usuario = Usuario::find(  Auth::user()->id  );
        $usuario->nombre = Input::get('nombre');
        $usuario->username = Input::get('username');
        $usuario->save();

        return Redirect::to('/panel/gamas');  
    }

    public function post_password()
    {
        $inputs = Input::all();

        if($inputs['pass1'] == $inputs['pass2']){

            $usuario = Usuario::find(  Auth::user()->id  );
            $usuario->password = Hash::make(Input::get('pass1'));
            $usuario->save();

        }

        return Redirect::to('/panel/categorias');
    }
    
    public function dashboard()
    {   
        return Redirect::to('/panel/gamas');  
    }   

    public function categorias()
    {   
        $categorias = Categoria::all();
        return View::make('admin.categorias', array('categorias' => $categorias));  
    }  

    public function get_categoria($id)
    {   
        $categoria = Categoria::find($id);
        if($categoria){
            return View::make('admin.categoria', array('categoria' => $categoria));  
        }else{
            return Redirect::to('/panel/gamas');
        }
    } 

    public function post_categoria(){    
        $inputs = Input::all();

        $categoria = new Categoria;
        $categoria->nombre = Input::get('nombre');
        $categoria->save();

        return Redirect::to('/panel/gamas');             
    }

    public function get_nuevoproducto($id)
    {   
        $categoria = Categoria::find($id);
        if($categoria){
            return View::make('admin.productos.nuevo', array('categoria' => $categoria));
        }else{
            return Redirect::to('/panel/gamas');
        }          
    }

    public function post_nuevoproducto()
    {               
        $inputs = Input::all();
        $producto = new Producto();

        $producto->nombre = $inputs['nombre'];
        $producto->precio = $inputs['precio'];
        $producto->descripcion = $inputs['descripcion'];
        $producto->categoria_id = $inputs['categoria_id'];
        $producto->save();

        $detalles = explode(",", $inputs['detalles']);

        if(count($detalles)){
            foreach ($detalles as $key => $detalle) {
                $d = new Detalle();
                $d->detalle = $detalle;
                $d->producto_id = $producto->id;
                $d->save();
            }
        }

        $imagenes = Session::get('imgs');
        if(count($imagenes)){
            $destinationPath = '/uploads/productos/';
            foreach ($imagenes as $key => $imagen) {
                $i = new Imagen();
                $i->imagen = $destinationPath . $imagen;
                $i->producto_id = $producto->id;
                $i->save();
            }
            Session::forget('imgs');
        }
        return Redirect::to('/panel/gama/' . $producto->categoria_id );
    }    

    public function borrar_categoria($id)
    {   
        Categoria::destroy($id);
    } 
    
    public function editar_categoria($id)
    {   
        $categoria = Categoria::find($id);
        if($categoria){
            return View::make('admin.editar-categoria', array('categoria' => $categoria));  
        }else{
            return Redirect::to('/panel/gamas');
        }
    }

    public function post_editar_categoria(){
        $inputs = Input::all();
        $id = Input::get('id');

        $categoria = Categoria::find($id);
        $categoria->nombre = Input::get('nombre');
        $categoria->color = Input::get('color');

        $file = Input::file('portada'); 
        if($file){
            $destinationPath = 'uploads/portadas/';
            $filename = $file->getClientOriginalName();
            $portada = Input::file('portada')->move($destinationPath, $filename);
            $categoria->portada = $portada;
        }

        $categoria->save();   
        return Redirect::to('/panel/gamas');     
    }
}