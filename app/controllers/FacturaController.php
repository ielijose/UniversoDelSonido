<?php

class FacturaController extends BaseController {  

    public function listado()
    {   
        $facturas = Factura::all();
        return View::make('admin.facturas.listado', array('facturas' => $facturas));
    }  

    public function post_editar_producto()
    {   
        $inputs = Input::all();
        $producto = Producto::find($inputs['id']);

        $producto->nombre = $inputs['nombre'];
        $producto->precio = $inputs['precio'];
        $producto->descripcion = $inputs['descripcion'];
        $producto->save();

        foreach ($producto->detalles as $key => $detalle) {
            $d = Detalle::destroy($detalle->id);
        }

        $detalles = explode(",", $inputs['detalles']);

        foreach ($detalles as $key => $detalle) {
            $d = new Detalle();
            $d->detalle = $detalle;
            $d->producto_id = $producto->id;
            $d->save();
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
        return Redirect::to('/panel/categoria/' . $producto->categoria_id );
    }     
}