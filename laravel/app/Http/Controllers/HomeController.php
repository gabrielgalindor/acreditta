<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Pagina;
use Log;

class HomeController extends Controller
{

    public function index()
    {
        $metadata = Pagina::idioma(app()->getLocale())->find(2);
        return view('inicio', ['metadata' => $metadata]);
    }

    public function prueba()
    {
        $metadata = Pagina::idioma(app()->getLocale())->find(2);
        $fechas = Fecha::orderby('fecha')->get();
        return view('prueba', ['metadata' => $metadata, 'fechas' => $fechas]);
    }

    public function soluciones()
    {
        $metadata = Pagina::idioma(app()->getLocale())->find(3);
        return view('soluciones', ['metadata' => $metadata]);
    }

    public function nosotros()
    {
        $metadata = Pagina::idioma(app()->getLocale())->find(6);
        return view('nosotros', ['metadata' => $metadata]);
    }

    public function demo()
    {
        $metadata = Pagina::idioma(app()->getLocale())->find(8);
        return view('demo', ['metadata' => $metadata]);
    }

    public function contacto_frm(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:60',
            'apellido' => 'required|string|max:60',
            'email' => 'required|string|email|max:255',
            'cuerpo' => 'required|string',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                //return back()->withErrors($validator)->withInput();
                return ['estatus' => 'fallo', 'mensaje' => $validator->errors()->all()];
            }
        	$data=$request->toArray();
            if($_SERVER['HTTP_HOST'] != 'localhost'){
            	Mail::send('emails.contacto', $data, function($message) use ($data) {
                    //$message->to($data['email'], $data['nombre'])->subject('Contacto');
                    //$message->to('info@acreditta.com', $data['nombre'])->subject('Contacto');
                    $message -> from ('ggalindo@acreditta.com');
                    $message->to('ggalindo@acreditta.com', $data['nombre'])->subject('Contacto');
                });
            }
        	return ['estatus' => 'exito'];
        } catch (Exception $e) {
            \Log::info('Error creating item: ' . $e);
            return \Response::json(['created' => false], 500);
        }
    }

    public function solicitarDemo(Request $request) {
        $rules = [
            'nombre' => 'required|string|max:60',
            'apellido' => 'required|string|max:60',
            'email' => 'required|string|email|max:255',
            'telefono' => 'required',
            'organizacion' => 'required',
            'fecha_live_demo' => 'required'
        ];

        try {
            $validator = \Validator::make($request->all(), $rules);

            if (!$validator->fails()) {
                //Zoom API credentials from https://developer.zoom.us/me/
                $key = '4hnZjtzSQ56lHd2AgRxLDw';
                $secret = 'wZQmDTMXeB57tENKjsqrBFTmeCoiFVtDk6iX';
                $token = array(
                    "iss" => $key,
                    // The benefit of JWT is expiry tokens, we'll set this one to expire in 1 minute
                    "exp" => time() + 3600
                );

                // Obteniendo el AUTH TOKEN para hacer llamados al API de ZOOM
                //$jwt = \Firebase\JWT\JWT::encode($token, $secret);
                $jwt = JWT::encode($token, $secret);

                // Creando objeto con DATOS para enviar a ZOOM
                $registrant = array(
                    "email" => $request->email,
                    "first_name" => $request->nombre,
                    "last_name" => $request->apellido,
                    "city" => $request->ciudad,
                    "country" => $request->pais,
                    "phone" => $request->telefono,
                    "org" => $request->organizacion,
                    "job_title" => $request->cargo,
                    "purchasing_time_frame" => $request->cuando
                );

                // Inicializando llamados al API de Zoom
                $curl = curl_init();

                $userId = "_OAZIRDuRLG5nQVR8H2eHg";
                $webinarId = "609642267";

                $fechaLiveDemo = explode('_', $request->fecha_live_demo);

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.zoom.us/v2/webinars/".$webinarId."/registrants?occurrence_ids=".$fechaLiveDemo[0]."&access_token=".$jwt,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($registrant),
                    CURLOPT_HTTPHEADER => array(
                    "content-type: application/json"
                    ),
                    CURLOPT_SSL_VERIFYPEER => false
                ));

                //Enviando información capturada en el formulario DEMO a ZOOM
                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                Log::info("ZOOM-LOG");
                Log::info(json_encode($err));
                Log::info(json_encode($request->all()));

                $data = $request->all();

                if (!$err) {
                    //Enviando correo electrónico con la información capturada en el formulario DEMO
                    Mail::send('emails.demo', $data, function($message) use ($data) {
                        $message->to('info@acreditta.com', $data['nombre'])->subject('Ha recibido un nueva solicitud de DEMO por la página web');
                        //$message->to('lauraortizmartinez@gmail.com', $a['nombre'])->subject('Ha recibido un nueva solicitud de DEMO por la página web');
                    });

                    //dd(json_decode($response));
                    return redirect()->route('gracias');
                }
                else {
                    //dd("cURL Error #:" . $err);
                    return back()->withErrors($err)->withInput();
                }
            }
            else {
                return back()->withErrors($validator)->withInput();
            }
        } catch (Exception $e) {
            \Log::info('Error creating item: ' . $e);
        }
    }

    public function gracias() {
        $metadata = Pagina::idioma(app()->getLocale())->find(7);
        return view('gracias', ['metadata' => $metadata]);
    }

    public function getDemoDatesFromZoom() {
        //Zoom API credentials from https://developer.zoom.us/me/
        $key = '4hnZjtzSQ56lHd2AgRxLDw';
        $secret = 'wZQmDTMXeB57tENKjsqrBFTmeCoiFVtDk6iX';
        $token = array(
            "iss" => $key,
            // The benefit of JWT is expiry tokens, we'll set this one to expire in 1 minute
            "exp" => time() + 3600
        );

        // Obteniendo el AUTH TOKEN para hacer llamados al API de ZOOM
        //$jwt = \Firebase\JWT\JWT::encode($token, $secret);
        $jwt = JWT::encode($token, $secret);

        $webinarId = "609642267";

        // Inicializando llamados al API de Zoom
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.zoom.us/v2/webinars/".$webinarId."?access_token=".$jwt,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => false
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        }
        else {
            $webinar = json_decode($response);
            $occurrences = $webinar->occurrences;
            return $occurrences;
        }
    }
}
