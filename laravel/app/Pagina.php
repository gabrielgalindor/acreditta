<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $table = 'paginas';
    protected $guarded = ['id'];

    public function campos() {
        if (session('lang') ==='es') {
            return $this->hasMany('App\Campo')->select('contenido', 'tipo');
        }
        else {
            return $this->hasMany('App\Campo')->select('contenido_en as contenido', 'tipo');
        }
    }

    public function campos_adm() {
        return $this->hasMany('App\Campo');
    }

    public function scopeIdioma($query, $idioma) {
        if ($idioma ==='es') {
            $query->select(['id','titulo','descripcion','tags']);
        }

        if ($idioma ==='en') {
            $query->select(['id','titulo_en as titulo','descripcion_en as descripcion','tags_en as tags']);
        }
    }
}