<?php

class UploadController extends BaseController {

    public function post_upload()
    {    
        $file = Input::file('file');
        $destinationPath = 'uploads/productos/';
        $filename = str_random(16)."_".$file->getClientOriginalName();
        $portada = Input::file('file')->move($destinationPath, $filename);

        Session::push('imgs', $filename);        
    }

    public function session()
    {
        var_dump(Session::get('imgs'));
    }
   
}