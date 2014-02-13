<?php

Route::get('/', function(){
	$categorias = DB::table('categorias')->get();
    $productos = Producto::orderBy('id', 'DESC')->paginate(8);

    return View::make('index', array('productos' => $productos, 'categorias' => $categorias));
});

Route::get('/categoria/{id}', function($id)
{
	$productos = Producto::where('categoria_id', '=', $id)->paginate(8);
    $categoria = Categoria::find($id);
	return View::make('categoria', array('productos' => $productos, 'categoria' => $categoria ));	
});

Route::get('/producto/{id}', function($id)
{
	$producto = Producto::find($id);
    $relacionados = Producto::where('categoria_id', '=', $producto->categoria_id)->orderBy(DB::raw('RAND()'))->take(4)->get();
	return View::make('producto', array('producto' => $producto, 'relacionados' => $relacionados));	
});

function getId($n)
{
    return($n['id']);
}

Route::get('/carrito', function()
{
    $cart = Cart::content();
    return View::make('carrito', array('cart' => $cart )); 
});

Route::post('/total', function()
{
    echo Cart::total();
});

Route::post('/comentar', function(){   
    $comentario =  new Comentario();
    $comentario->nombre = Input::get('nombre');
    $comentario->email = Input::get('email');
    $comentario->telefono = "unavaliable";
    $comentario->comentario = Input::get('comentario');
    $comentario->producto_id = $id = Input::get('id');
    $comentario->save();
    return Redirect::to('/producto/'.$id);      
});

Route::post('/contactar', function(){   
    $inputs = Input::all();
    Mail::send('emails.contacto', $inputs, function($message){
        $message->to('joeloquendo@joelblackberryzone.com.ve', 'Admin JoelBlackberryZone!')->subject('Contacto desde JoelBlackberryZone.com.ve!');
    });
    return Redirect::to('/');      
});

View::composer('layouts.master', function($view)
{
    $categorias = Categoria::all();
    $view->with('categorias', $categorias);
});
View::composer('layouts.public', function($view)
{
    $categorias = Categoria::all();
    $view->with('categorias', $categorias);
});

/* ADMIN */
Route::get('/login', ['before' => 'guest', function(){
    return View::make('admin.login');
}]);

Route::post('/login', ['uses' => 'AuthController@doLogin', 'before' => 'guest']);
Route::get('/logout', ['uses' => 'AuthController@doLogout', 'before' => 'auth']);
Route::get('/panel/perfil', ['uses' => 'AdminController@perfil', 'before' => 'auth']);
Route::post('/panel/perfil', ['uses' => 'AdminController@post_perfil', 'before' => 'auth']);
Route::post('/panel/password', ['uses' => 'AdminController@post_password', 'before' => 'auth']);
Route::get('/panel', ['uses' => 'AdminController@dashboard', 'before' => 'auth']);
Route::get('/panel/gamas', ['uses' => 'AdminController@categorias', 'before' => 'auth']);
Route::post('/panel/categoria', ['uses' => 'AdminController@post_categoria', 'before' => 'auth']);
Route::get('/panel/categoria/{id}', ['uses' => 'AdminController@get_categoria', 'before' => 'auth']);
Route::get('/panel/categoria/{id}/nuevo', ['uses' => 'AdminController@get_nuevoproducto', 'before' => 'auth']);
Route::post('/panel/categoria/nuevo', ['uses' => 'AdminController@post_nuevoproducto', 'before' => 'auth']);
Route::post('/upload/file', ['uses' => 'UploadController@post_upload', 'before' => 'auth']);
Route::get('/session', ['uses' => 'UploadController@session', 'before' => 'auth']);
Route::post('/panel/categoria/borrar/{id}', ['uses' => 'AdminController@borrar_categoria', 'before' => 'auth']);
Route::get('/panel/categoria/editar/{id}', ['uses' => 'AdminController@editar_categoria', 'before' => 'auth']);
Route::post('/panel/categoria/editar', ['uses' => 'AdminController@post_editar_categoria', 'before' => 'auth']);

/* CRUD PRODUCTOS */
Route::post('/panel/producto/borrar/{id}', ['uses' => 'ProductoController@borrar_producto', 'before' => 'auth'] );
Route::get('/panel/producto/editar/{id}', ['uses' => 'ProductoController@editar_producto', 'before' => 'auth'] );
Route::post('/panel/producto/editar', ['uses' => 'ProductoController@post_editar_producto', 'before' => 'auth'] );

/* CRUD IMAGEN */
Route::post('/panel/imagen/borrar/{id}', ['uses' => 'ImagenController@borrar_imagen', 'before' => 'auth'] );

/* CART */
Route::get('/cart', ['uses' => 'CartController@get_cart'] );
Route::get('/cart/remove/{rowid}', ['uses' => 'CartController@get_removeitem'] );
Route::get('/cart/{id}/add', ['uses' => 'CartController@get_add'] );
Route::get('/cart/minus/{rowid}', ['uses' => 'CartController@post_minus'] );
Route::get('/cart/plus/{rowid}', ['uses' => 'CartController@post_plus'] );

Route::post('/procesar', ['uses' => 'CartController@post_procesar'] );

Route::get('/factura', function()
{
    return View::make('emails.factura'); 
});

Route::get('/procesado', function()
{
    $categorias = DB::table('categorias')->get();
    return View::make('index', array('categorias' => $categorias, 'msg' => "Orden procesada, revise su email para completar el proceso."));
});

Route::get('/datos-enviados', function()
{
    $categorias = DB::table('categorias')->get();
    return View::make('index', array('categorias' => $categorias, 'msg' => "Datos de pago enviados, te responderemos a la brevedad posible."));
});

Route::get('/factura/{slug}', ['uses' => 'CartController@get_factura'] );

Route::post('/pagar', ['uses' => 'CartController@post_pagar'] );

/* CRUD FACTURAS */
Route::get('/panel/facturas', ['uses' => 'FacturaController@listado', 'before' => 'auth'] );
