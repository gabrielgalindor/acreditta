<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Campo;
use App\Fecha;

class FooterComposer{
	public function compose(View $view){
		$contacto=Campo::find(29);
		$boton_ingresa=Campo::find(81);
		$popup_activo=Campo::find(94);
        $fechas=Fecha::orderby('fecha')->get();

		$view->with('contacto', $contacto->contenido)->with('boton_ingresa', $boton_ingresa->contenido)->with('popup_activo', $popup_activo->contenido)->with('fechas', $fechas);
	}
}

