<?php

class ImagenController extends BaseController {  

    public function borrar_imagen($id)
    {   
        Imagen::destroy($id);
    }
   
}