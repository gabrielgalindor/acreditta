<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Categoria;
use App\Faq;
use App\Pagina;
use App\User;

class BlogController extends Controller
{
    public function index(Request $request, $slug = '') {
        if ($request->slug <> '') {
            $categoria_id = Categoria::where('slug_'.app()->getLocale(), $slug)
                                     ->first(['id'])->id;
        }
        else {
            $slug = Categoria::first(['slug_'.app()->getLocale().' as slug'])->slug;
            return redirect()->route('blog_cat', [ 'slug' => $slug ]);
        }

        $metadata = Pagina::idioma(app()->getLocale())->find(4);
        $txtbuscar = '';

        if (isset($request->txtbuscar)) {
            $txtbuscar = limpiafiltro($request->txtbuscar);
        }

        $categorias = Categoria::idioma()->get();

        if ($txtbuscar === '') {
            $posts = Blog::where('idioma', app()->getLocale())
                         ->where('categoria_id', $categoria_id)
                         ->orderby('fecha', 'desc')
                         ->orderby('id', 'desc')
                         ->paginate(10);
        }
        else {
            $terms = explode(' ', $txtbuscar);
            $posts = Blog::where('idioma', app()->getLocale())
                         ->where('categoria_id', $categoria_id)
                         ->orderby('fecha', 'desc')
                         ->orderby('id', 'desc')
                         ->where(function($query) use ($terms) {
                            foreach($terms as $term) {
                                if ($term <> '') $query->where('titulo', 'LIKE', '%'.$term.'%');
                            }
                        })
                        ->orwhere(function($query) use ($terms) {
                            foreach($terms as $term) {
                                if ($term <> '') $query->where('resumen', 'LIKE', '%'.$term.'%');
                            }
                        })
                        ->orwhere(function($query) use ($terms) {
                            foreach ($terms as $term) {
                                if ($term <> '') $query->where('fuente', 'LIKE', '%'.$term.'%');
                            }
                        })
                        ->paginate(10);
        }

        return view('blog', [
            'metadata' => $metadata,
            'posts' => $posts,
            'aprende_seccion' => 'blog',
            'txtbuscar' => $txtbuscar,
            'categorias' => $categorias,
            'categoria_id' => $categoria_id
        ]);
    }

    public function show($slug) {
        $metadata = Pagina::idioma(app()->getLocale())->find(4);
        $categorias = Categoria::idioma()->get();
        $post = Blog::where('slug', $slug)->first();
        $usuario = User::find($post->fuente);

        return view('post', [
            'metadata' => $metadata,
            'post'=> $post,
            'aprende_seccion' => 'blog',
            'txtbuscar' => '',
            'categorias' => $categorias,
            'categoria_id' => $post->categoria_id,
            'usuario' => $usuario
        ]);
    }

    public function faq(Request $request) {
        $metadata = Pagina::idioma(app()->getLocale())->find(5);
        $categorias = Categoria::idioma()->get();
        $txtbuscar = '';

        if (isset($request->txtbuscar)) {
            $txtbuscar = limpiafiltro($request->txtbuscar);
        }

        if ($txtbuscar === '') {
            $faqs = Faq::idioma(app()->getLocale())->get();
        }
        else {
            $terms = explode(' ', $txtbuscar);
            $faqs = Faq::idioma(app()->getLocale())
                     ->where('id', '<>', 0)
                     ->where(function($query) use ($terms) {
                        foreach ($terms as $term) {
                            if ($term <> '') $query->where('pregunta', 'LIKE', '%'.$term.'%');
                        }
                     })
                     ->orwhere(function($query) use ($terms) {
                        foreach ($terms as $term) {
                            if ($term <> '') $query->where('respuesta', 'LIKE', '%'.$term.'%');
                        }
                     })
                     ->get();
        }

        return view('faq', [
            'metadata' => $metadata,
            'faqs' => $faqs,
            'aprende_seccion' => 'faq',
            'txtbuscar' => $txtbuscar,
            'categorias' => $categorias
        ]);
    }
}