<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
        return view('administracion.home');
    }
    public function cargafotos()
    {
    	return view('administracion.cargafotos');
    }
    public function cargafotos_nueva(Request $request)
    {
	    $foto = "";
	    if($request->archivo){
	        $archivo=json_decode($request->archivo);
	        $Base64Img=$archivo->output->image;
	        list($extensio, $Base64Img) = explode(';', $Base64Img);
	        list(, $Base64Img) = explode(',', $Base64Img);
	        $extensio=$extensio=='data:image/png' ? '.png' : '.jpg';
	        $foto = (string)(date("YmdHis")) . (string)(rand(1,9)) . $extensio;
	        $image = base64_decode($Base64Img);
	        file_put_contents('uploads/blog/' . $foto, $image);
	    }
        return redirect()->route('cargafotos');
    }

}
