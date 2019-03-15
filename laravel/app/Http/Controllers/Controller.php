<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
	public function __construct(){
		$this->middleware(function ($request, $next) {
			try {
		        if(session('lang')==null){
		        	$idioma="es";
		        	if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
		            	$idioma=(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
		            if($idioma<>"en" and $idioma<>"es") $idioma="es";
//$idioma="es";
		            session(['lang' => $idioma]);
		        }
		        app()->setLocale(session('lang'));
	        } catch (Exception $e) {
		        app()->setLocale('es');
	        }
	        return $next($request);
	    });
	}

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
