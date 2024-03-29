<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'posts';
	protected $guarded = ['id'];

	public function categoria(){
	    return $this->belongsTo('App\Categoria');
	}
}
