<?php

namespace App\Http\Controllers;

class LanguageLocalizationController extends Controller
{
    public function index($lang){
    	session(['lang' => $lang]);
        return redirect()->route('home');
    }
}