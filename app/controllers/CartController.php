<?php

class CartController extends BaseController {

    public function get_cart()
    {
        echo Cart::content();        
    }  

    public function get_add($id)
    {
        $producto = Producto::find($id);
        Cart::add($id, $producto->nombre , 1, $producto->precio, array('image' => $producto->imagen['imagen'] ));
        return Redirect::to('/producto/' . $id);
    } 

    public function get_removeitem($rowid)
    {
        if(Cart::get($rowid))
            Cart::remove($rowid);

        return Redirect::to('/carrito');
    }  

    public function post_minus($rowid)
    {
        if($cart = Cart::get($rowid)){
            $qty = $cart->qty-1;
                if($qty==0){
                    Cart::remove($rowid);
                } else{
                    Cart::update($rowid, array("qty" => $qty));
                }
        }            

        return Redirect::to('/carrito');
    } 

    public function post_plus($rowid)
    {
        if($cart = Cart::get($rowid)){
            $qty = $cart->qty+1;
            Cart::update($rowid, array("qty" => $qty));                
        }            

        return Redirect::to('/carrito');
    } 


    public function post_procesar()
    {
        $inputs = Input::all();
        $inputs['slug'] =  str_random(32);

        $factura = new Factura();
        $factura->nombre = $inputs['nombre'];
        $factura->telefono = $inputs['telefono'];
        $factura->correo = $inputs['correo'];
        $factura->direccion = $inputs['direccion'];
        $factura->slug = $inputs['slug'];
        $factura->save();

        $inputs['id'] = $factura->id;

        foreach ($carts = Cart::content() as $key => $cart) {
            $item = new Item();
            $item->producto_id = $cart->id;
            $item->cantidad = $cart->qty;
            $item->precio = $cart->price;
            $item->factura_id = $factura->id;

            $item->keep = $cart->name ." | ". $cart->qty ." | ". $cart->price ." | ". $cart->options['image'];  
            $item->save();
        }  
        Cart::destroy();     

        $data = [];
        $data['datos'] = $inputs;
        $data['cart'] = $carts;

        Mail::send('emails.factura', $data , function($m) use ($inputs)
        {
            $m->from('ventas@eluniversodelsonido.com', 'ElUniversoDelSonido.com');
            $m->to($inputs['correo'])->cc('ventas@eluniversodelsonido.com')->subject('Orden de compra.');
        });
        return Redirect::to('/procesado');
    } 

    public function get_factura($slug){
        $factura = Factura::where('slug', '=', $slug)->firstOrFail();
        return View::make('factura', array('factura' => $factura));
    }

    public function get_factura_admin($slug){
        $factura = Factura::where('slug', '=', $slug)->firstOrFail();
        return View::make('factura-admin', array('factura' => $factura));
    }

    public function post_pagar(){
        $inputs = Input::all();

        $pago = new Pago();
        $pago->recibo = $inputs['recibo'];
        $pago->monto = $inputs['monto'];
        $pago->fecha = $inputs['fecha'];

        $adj = Input::file('adjunto');
        $destinationPath = 'uploads/pagos/';
        $filename = str_random(16)."_".$adj->getClientOriginalName();
        $adjunto = Input::file('adjunto')->move($destinationPath, $filename);

        $pago->factura_id = $inputs['id'];
        $pago->adjunto = $adjunto;

        $pago->save();

        $factura = Factura::find($inputs['id']);

        $data['factura'] = $factura->toArray();
        $data['items'] = $factura->items->toArray();
        $data['pago'] = $factura->pago->toArray();

        Mail::send('emails.pago', $data , function($m) use ($factura)
        {
            $m->from('ventas@eluniversodelsonido.com', 'ElUniversoDelSonido.com');
            $m->to($factura['correo'])->cc('ventas@eluniversodelsonido.com')->subject('Confirmación de Pago.');
        });

        return Redirect::back();
    }

}