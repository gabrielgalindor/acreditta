<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Redirect;


class MailController extends Controller
{
    
    public function store (Request $request)
    {
    	//'emails.contacto'
    	Mail::send('emails.contacto',$request->all(),function($msj){
    		$msj->subject('Correo de contacto');
    		$msj->to('gabrielgalindorodriguez@gmail.com');
    	});

    }
}
