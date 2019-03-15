<?php

namespace App\Http\Controllers\administracion;

@session_start();
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Campo;

class CampoController extends Controller
{
    public function index()
    {
        $campos=Campo::where('pagina_id',$_SESSION['pagina_id'])->paginate(25);
        return view('administracion.campos.index')->with('campos',$campos);
    }

    public function create()
    {
        return view('administracion.campos.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'titulo' => 'required',
        ];

        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }

            $campo=Campo::create([
                'pagina_id' => $_SESSION["pagina_id"],
                'titulo' => $request->titulo,
                'tipo' => $request->tipo,
                'contenido' => $request->contenido,
                'contenido_en' => $request->contenido,
            ]);
            return redirect()->route('admin.campos.edit', codifica($campo->id))->with("notificacion","Se ha guardado correctamente su información");

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
        $campo=Campo::find($id);
        $_SESSION['campo_id']=$id;
        return view('administracion.campos.edit')->with('campo',$campo);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'titulo' => 'required',
            ];

        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
            $id=decodifica($id);

            $data=[
                'titulo' => $request->titulo,
                'tipo' => $request->tipo,
                'contenido' => $request->contenido,
            ];


            Campo::find($id)->update($data);
            return redirect()->route('admin.campos.edit', codifica($id))->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }
    public function destroy($id)
    {
        $id=decodifica($id);
        try{
            Campo::find($id)->delete();
            return redirect()->route('admin.campos.index');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with("notificacion_error","Se ha producido un error, es probable que exista contenido relacionado a este registro que impide que se elimine");
        }
    }
/*
    public function rederactto_camposgaleria($id){
        $id=decodifica($id);
        $_SESSION['campo_id']=$id;
        return redirect()->route('camposgalerias.index');
    }

    public function campos_campos()
    {
        $campos=Campo::orderby('nombre')->get();
        return view('administracion.campos.campos')->with('campos',$campos);
    }
    public function update_campos(Request $request)
    {
        CampoCampo::where('campos_id',$_SESSION['campo_id'])->delete();
        foreach ($request->campos as $idcampo) {
            CampoCampo::create([
                'campos_id' => $_SESSION['campo_id'],
                'campos_id' => $idcampo,
            ]);
        }
        return redirect()->route('admin.campos.edit', codifica($_SESSION['campo_id']));
    }
*/
}
