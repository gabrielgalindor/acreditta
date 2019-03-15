<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
	protected $guarded = ['id'];

	public function posts(){
	    return $this->hasMany('App\Blog','categoria_id');
	}

	public function scopeIdioma($query){
		//$query->select(['id','categoria_' . session('lang') . ' as categoria','slug_' . session('lang') . ' as slug']);
		$query->select(['id','categoria_' . app()->getLocale() . ' as categoria','slug_' . app()->getLocale() . ' as slug']);
	}
}
