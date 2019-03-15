<?php

namespace App\Http\Controllers\administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Fecha;

class FechaController extends Controller
{
    public function index()
    {
        $fechas=Fecha::paginate(25);
        return view('administracion.fechas.index')->with('fechas',$fechas);
    }

    public function create()
    {
        return view('administracion.fechas.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'fecha' => 'required',
        ];

        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
            $fecha=Fecha::create($request->toArray());
            return redirect()->route('admin.fechas.edit', codifica($fecha->id))->with("notificacion","Se ha guardado correctamente su información");

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
        $fecha=Fecha::find($id);
        $_SESSION['faq_id']=$id;
        return view('administracion.fechas.edit')->with('fecha',$fecha);
    }

    public function update(Request $request, $id)
    {

       $rules = [
            'fecha' => 'required',
            ];

        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
            $id=decodifica($id);

            Fecha::find($id)->update($request->toArray());
            return redirect()->route('admin.fechas.edit', codifica($id))->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function destroy($id)
    {
        $id=decodifica($id);
        try{
            Fecha::find($id)->delete();
            return redirect()->route('admin.fechas.index');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with("notificacion_error","Se ha producido un error, es probable que exista contenido relacionado a este registro que impide que se elimine");
        }
    }
}
