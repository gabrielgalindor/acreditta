<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';
	protected $guarded = ['id'];

	public function scopeIdioma($query, $idioma){
		if($idioma=='es'){
			$query->select(['id','pregunta','respuesta']);
		}
		if($idioma=='en'){
			$query->select(['id','pregunta_en as pregunta','respuesta_en as respuesta']);
		}
	}
}
