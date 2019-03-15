<?php

namespace App\Http\Controllers\administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blog;
use App\Categoria;
use App\User;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::orderby('fecha','desc')->paginate(25);
        return view('administracion.blog.index')->with('blogs', $blogs);
    }

    public function create() {
        $categorias = Categoria::get();
        $usuarios = User::get();

        return view('administracion.blog.create', [
            'categorias' => $categorias,
            'usuarios' => $usuarios
        ]);
    }

    public function store(Request $request) {
        $rules = [
            'titulo' => 'required|unique:posts',
            'fecha' => 'required',
        ];

        try {
            $validator = \Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $foto = "";

            if($request->archivo) {
                $archivo = json_decode($request->archivo);
                $Base64Img = $archivo->output->image;

                list($extensio, $Base64Img) = explode(';', $Base64Img);
                list(, $Base64Img) = explode(',', $Base64Img);

                $extensio = $extensio == 'data:image/png' ? '.png' : '.jpg';
                $foto = (string)(date("YmdHis")) . (string)(rand(1,9)) . $extensio;
                $image = base64_decode($Base64Img);
                file_put_contents('uploads/blog/' . $foto, $image);
            }

            $blog = Blog::create([
                'titulo' => $request->titulo,
                'categoria_id' => $request->categoria_id,
                'idioma' => $request->idioma,
                'slug' => str_slug($request->titulo,"-"),
                'fecha' => $request->fecha,
                'resumen' => $request->resumen,
                'cuerpo' => $request->cuerpo,
                'tags' => $request->tags,
                'fuente' => $request->fuente,
                //'enlace' => $request->enlace,
                'foto' => $foto,
            ]);

            return redirect()->route('admin.blog.edit', codifica($blog->id))->with("notificacion", "Se ha guardado correctamente su informaciÃ³n");

        }
        catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $id = decodifica($id);
        $blog = Blog::find($id);
        $_SESSION['blog_id'] = $id;
        $categorias = Categoria::get();
        $usuarios = User::get();

        return view('administracion.blog.edit', [
            'blog' => $blog,
            'categorias' => $categorias,
            'usuarios' => $usuarios
        ]);
    }

    public function update(Request $request, $id) {
        $id = decodifica($id);
        $rules = [
            'titulo' => 'required|unique:posts,titulo,' . $id,
            'fecha' => 'required',
        ];

        try {
            $validator = \Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $data = [
                'titulo' => $request->titulo,
                'categoria_id' => $request->categoria_id,
                'idioma' => $request->idioma,
                'slug' => str_slug($request->titulo,"-"),
                'fecha' => $request->fecha,
                'resumen' => $request->resumen,
                'tags' => $request->tags,
                'cuerpo' => $request->cuerpo,
                'fuente' => $request->fuente,
                //'enlace' => $request->enlace,
            ];

            if($request->archivo) {
                $archivo = json_decode($request->archivo);
                $Base64Img = $archivo->output->image;
                list($extensio, $Base64Img) = explode(';', $Base64Img);
                list(, $Base64Img) = explode(',', $Base64Img);
                $extensio = $extensio == 'data:image/png' ? '.png' : '.jpg';
                $foto = (string)(date("YmdHis")) . (string)(rand(1,9)) . $extensio;
                $image = base64_decode($Base64Img);
                file_put_contents('uploads/blog/' . $foto, $image);

                $data['foto'] = $foto;
            }

            Blog::find($id)->update($data);
            return redirect()->route('admin.blog.edit', codifica($id))->with("notificacion", "Se ha guardado correctamente su informaciÃ³n");

        }
        catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function destroy($id) {
        $id = decodifica($id);
        try {
            Blog::find($id)->delete();
            return redirect()->route('admin.blog.index');
        }
        catch (\Illuminate\Database\QueryException $e) {
            return back()->with("notificacion_error","Se ha producido un error, es probable que exista contenido relacionado a este registro que impide que se elimine");
        }
    }
}