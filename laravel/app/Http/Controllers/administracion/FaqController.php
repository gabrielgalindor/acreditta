<?php

namespace App\Http\Controllers\administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Faq;

class FaqController extends Controller
{
    public function index()
    {
       $faqs=Faq::paginate(25);
        return view('administracion.faq.index')->with('faqs',$faqs);
    }

    public function create()
    {
        return view('administracion.faq.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'pregunta' => 'required',
            'respuesta' => 'required',
        ];

        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }

            $faq=Faq::create($request->all());
            return redirect()->route('admin.faq.edit', codifica($faq->id))->with("notificacion","Se ha guardado correctamente su información");

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
        $faq=Faq::find($id);
        $_SESSION['faq_id']=$id;
        return view('administracion.faq.edit')->with('faq',$faq);
    }

    public function update(Request $request, $id)
    {

       $rules = [
            'pregunta' => 'required',
            'respuesta' => 'required',
            ];

        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
            $id=decodifica($id);

            Faq::find($id)->update($request->all());
            return redirect()->route('admin.faq.edit', codifica($id))->with("notificacion","Se ha guardado correctamente su información");

        } catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function destroy($id)
    {
        $id=decodifica($id);
        try{
            Faq::find($id)->delete();
            return redirect()->route('admin.faq.index');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with("notificacion_error","Se ha producido un error, es probable que exista contenido relacionado a este registro que impide que se elimine");
        }
    }
}
