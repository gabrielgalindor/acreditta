<?php

namespace App\Http\Controllers\administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias=Categoria::paginate(25);
        return view('administracion.categorias.index')->with('categorias',$categorias);
    }

    public function create()
    {
        return view('administracion.categorias.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'categoria_es' => 'required',
            'categoria_en' => 'required',
        ];

        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
            $categoria=Categoria::create(array_merge($request->all(),['slug_es' => str_slug($request->categoria_es,"-"), 'slug_en' => str_slug($request->categoria_en,"-")]));
            return redirect()->route('admin.categorias.edit', codifica($categoria->id))->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $id=decodifica($id);
        $categoria=Categoria::find($id);
        $_SESSION['faq_id']=$id;
        return view('administracion.categorias.edit')->with('categoria',$categoria);
    }

    public function update(Request $request, $id)
    {

       $rules = [
            'categoria_es' => 'required',
            'categoria_en' => 'required',
            ];

        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
            $id=decodifica($id);

            Categoria::find($id)->update(array_merge($request->all(),['slug_es' => str_slug($request->categoria_es,"-"), 'slug_en' => str_slug($request->categoria_en,"-")]));
            return redirect()->route('admin.categorias.edit', codifica($id))->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function destroy($id)
    {
        $id=decodifica($id);
        try{
            Categoria::find($id)->delete();
            return redirect()->route('admin.categorias.index');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with("notificacion_error","Se ha producido un error, es probable que exista contenido relacionado a este registro que impide que se elimine");
        }
    }
}
