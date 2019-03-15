<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Pagina;
use App\Campo;

@session_start();

class PaginaController extends Controller
{
    public function index() {
        $paginas = Pagina::paginate(25);
        return view('administracion.pagina.index')->with('paginas', $paginas);
    }

    public function edit($id) {
        $id = decodifica($id);
        $pagina = Pagina::find($id);
        $_SESSION['pagina_id'] = $id;
        return view('administracion.pagina.edit')->with('pagina', $pagina);
    }

    public function update(Request $request, $id) {
       $rules = [
            'titulo' => 'required',
            'descripcion' => 'required',
            'tags' => 'required',
        ];

        try {
            $validator = \Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $id = decodifica($id);

            $data = [
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'tags' => $request->tags,
                'titulo_en' => $request->titulo_en,
                'descripcion_en' => $request->descripcion_en,
                'tags_en' => $request->tags_en,
            ];

            Pagina::find($id)->update($data);

            foreach (Campo::where('pagina_id', $id)->get() as $campo) {
                if ($campo->tipo === 'file_multiple') {
                    $contenidoArr = [];

                    if($request[$campo->id]) {

                        $files = $request[$campo->id];

                        foreach($files as $index => $file) {
                            if ($file) {
                                $fileJson = json_decode($file);
                                $fileExtension = '';

                                switch($fileJson->output->type) {
                                    case 'image/png':
                                    $fileExtension = '.png';
                                    break;
                                    case 'image/jpg':
                                    case 'image/jpeg':
                                    $fileExtension = '.jpg';
                                    break;
                                    default:
                                    $fileExtension = '';
                                }

                                $fileName = md5(Carbon::now()->timestamp.'_'.$fileJson->output->name).$fileExtension;
                                $fileBase64 = $fileJson->output->image;
                                $fileBase64 = explode(',', $fileBase64);
                                $fileBase64 = base64_decode($fileBase64[1]);
                                //Storage::put('uploads/logos/'.$fileName, $fileBase64);
                                file_put_contents('uploads/logos/' . $fileName, $fileBase64);
                                $contenidoArr[] = $fileName.','.$request[$campo->id.'_link'][$index];
                            }
                        }

                        $campo->update(['contenido' => implode('|', $contenidoArr), 'contenido_en' => implode('|', $contenidoArr)]);
                     }
                }
                else {
                    $campo->update(['contenido' => $request[$campo->id], 'contenido_en' => $request[$campo->id . '_en']]);
                }
            }

            return redirect()->route('admin.pagina.edit', codifica($id))->with("notificacion", "Se ha guardado correctamente su información");

        }
        catch (Exception $e) {
            \Log::info('Error creating item: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function destroy($id) {
        $id = decodifica($id);

        try {
            Pagina::find($id)->delete();
            return redirect()->route('admin.pagina.index');
        }
        catch (\Illuminate\Database\QueryException $e) {
            return back()->with("notificacion_error","Se ha producido un error, es probable que exista contenido relacionado a este registro que impide que se elimine");
        }
    }
}