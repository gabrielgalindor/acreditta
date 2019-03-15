@extends('layouts.front')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>

     <style>
        .demo-1 {
            position: relative;
        }

        .demo-1 .contenedor {position: absolute; width: 100%; height: 100%; overflow: hidden;}
        .demo-1 .flotado {position: relative;}
        .demo-1 .tuerca1 {width: 179px; height: 178px; position: absolute; left: -89px; top: 254px;}
        .demo-1 .tuerca2 {width: 227px; height: 226px; position: absolute; right: 5%; top: 503px;}
        .demo-1 .tuerca3 {width: 125px; height: 124px; position: absolute; right: -63px; top: 400px;}
        .demo-1 .cuerpo {position: relative;}

        .demo-1-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .demo-1-container div {
            display: flex;
            margin: 60px 0;
        }

        @media only screen and (max-width: 970px) {
            .demo-1-container div:nth-child(4) {
                display: none;
            }
        }

        @media only screen and (max-width: 960px) {
            .demo-2 .cuerpo {
                width: 90% !important;
            }

            .section-form form {
                width: 90% !important;
            }
        }

        .demo-1 p {
            margin: 0 auto;
            padding-top: 180px;
            text-align: center;
            color: #FFFFFF;
            font-size: 2.286rem;
            font-weight: 300;
            width: 700px;
            max-width: 95%;
        }

        .demo-1 b {
            font-size: 2.1429rem;
            color: #fff;
        }

        .demo-1 .muestra {position: absolute; top: 347px; width: 565px; height: 269px; left: 50%; transform: translate(-50%, 0);}
        .demo-1 .img1 {position: absolute; top: 480px; left:660px; display: none; width: 182px;}

        /*STYLES SECTION 2*/
        .demo-2 {
            background: #EDF0F2;
            text-align: center;
            padding: 70px 0px;
        }

        .demo-2 .cuerpo {
            width: 960px;
        }

        .demo-2 b {
            font-size: 2.1429rem;
        }

        .demo-2 p {
            margin: 20px auto 40px;
            font-size: 1.5rem;
        }

        .demo-2 ul {
            padding: 0;
            list-style: inside;
        }

        .demo-2 li {
            margin: 0 auto;
            font-size: 1.5rem;
        }

        /*STYLES SECTION FORM*/
        .section-form {
            padding: 70px 0px;
            text-align: center;
        }

        .section-form h1 {
            font-weight: 300;
            font-size: 2.5714rem;
            color: #E2231A;
        }

        .section-form form {
            margin: 0 auto 0 auto;
            width: 960px;
            max-width: 100%;
        }

        .form-solicitar-demo-row {
            display: flex;
        }

        .form-solicitar-demo-input {
            flex: 2;
            border: 1px solid #C7C6C6;
            padding: 10px;
            margin: 10px;
            font-size: 1.29rem;
            width: 100%
        }

        .form-solicitar-demo-input {
            border: 1px solid #C7C6C6;
            padding: 10px;
            margin: 10px;
            font-size: 1.29rem;
        }

        .input-flex-1 {
            flex: 1;
        }

        .input-flex-2 {
            flex: 2;
        }

        .demo-video {
            position: absolute;
            top: 347px;
            width: 565px;
            height: 330px;
            left: 50%;
            transform: translate(-50%, 0);
        }


    </style>
@endsection

@section('content')
    <section class="demo-1 bg_azul_gradiente">
        <div class="contenedor">
                <img src="imagenes/tuercas.svg" class="tuerca1">
                <img src="imagenes/tuercas.svg" class="tuerca2">
                <img src="imagenes/tuercas.svg" class="tuerca3">
        </div>
        <div class="cuerpo">
            <p>
                {{ $metadata->campos[0]->contenido }}
                <br/>
                <b>{{ $metadata->campos[1]->contenido }}</b>
            </p>
            <div class="demo-1-container">
                <div >
                    <img src="imagenes/acreditta-demo-1.png" height="180">
                </div>
                <div>
                    <img src="imagenes/acreditta-demo-puntos.png" height="180">
                </div>
                <div>
                    <img src="imagenes/acreditta-demo-2.png" height="180">
                </div>
                <div>
                    <img src="imagenes/acreditta-demo-puntos.png" height="180">
                </div>
                <div>
                    <img src="imagenes/acreditta-demo-3.png" height="180">
                </div>
            </div>
        </div>
    </section>
    <section class="section-form">
        <h1>@lang('textos.pide_demo')</h1>
        <form role="form" action="{{ route('solicitar-demo') }}" method="POST" id="form-solicitar-demo" name="form-solicitar-demo">
            {{ csrf_field() }}
            <div class="form-solicitar-demo-row">
                <input type="text" id="nombre" name="nombre" class="form-solicitar-demo-input input-flex-2" placeholder="@lang('textos.contacto_t1') *" required="required" maxlength="60">
                <input type="text" id="apellido" name="apellido" class="form-solicitar-demo-input input-flex-2" placeholder="@lang('textos.contacto_t2') *" required="required" maxlength="60">
            </div>
            <div class="form-solicitar-demo-row">
                <input type="email" id="email" name="email" class="form-solicitar-demo-input input-flex-2" placeholder="E-mail *" required="required" maxlength="255">
                <input type="number" id="telefono" name="telefono" class="form-solicitar-demo-input input-flex-2" placeholder="@lang('textos.contacto_t23') *" required="required" maxlength="200">
            </div>
            <div class="form-solicitar-demo-row">
                <input type="text" id="pais" name="pais" class="form-solicitar-demo-input input-flex-2" placeholder="@lang('textos.contacto_t7')" maxlength="200">
                <input type="text" id="ciudad" name="ciudad" class="form-solicitar-demo-input input-flex-2" placeholder="@lang('textos.contacto_t8')" maxlength="200">
            </div>
            <div class="form-solicitar-demo-row">
                <input type="text" id="organizacion" name="organizacion" class="form-solicitar-demo-input input-flex-2" placeholder="@lang('textos.contacto_t3') *" required="required" maxlength="200">
                <input type="text" id="cargo" name="cargo" class="form-solicitar-demo-input input-flex-2" placeholder="@lang('textos.contacto_t4')" maxlength="200">
            </div>
            <div class="form-solicitar-demo-row">
                <select id="fecha_live_demo" name="fecha_live_demo" required="required" class="form-solicitar-demo-input input-flex-2" placeholder="@lang('textos.contacto_t9') *">
                </select>
                <select id="como" name="como" class="form-solicitar-demo-input input-flex-2" placeholder="@lang('textos.contacto_t14')">
                    <option selected disabled>@lang('textos.contacto_t14')</option>
                    <option>@lang('textos.contacto_t15')</option>
                    <option>@lang('textos.contacto_t16')</option>
                    <option>@lang('textos.contacto_t17')</option>
                    <option>@lang('textos.contacto_t18')</option>
                    <option>@lang('textos.contacto_t19')</option>
                    <option>@lang('textos.contacto_t20')</option>
                    <option>@lang('textos.contacto_t21')</option>
                </select>
            </div>
            <div class="form-solicitar-demo-row">
                <select id="cuando" name="cuando" class="form-solicitar-demo-input" placeholder="@lang('textos.contacto_t10')">
                    <option selected disabled>@lang('textos.contacto_t10')</option>
                    <option value="4-6 months">@lang('textos.contacto_t11')</option>
                    <option value="More than 6 months">@lang('textos.contacto_t12')</option>
                    <option value="No timeframe">@lang('textos.contacto_t13')</option>
                </select>
            </div>
            <center><button id="enviarButton" class="pidecita">@lang('textos.contacto_t22')</button></center>
        </form>
    </section>
    <section class="demo-2">
        <div class="cuerpo">
            <h2><b>{{ $metadata->campos[2]->contenido }}</b></h2>
            <ul>
                <li>{{ $metadata->campos[3]->contenido }}</li>
                <li>{{ $metadata->campos[4]->contenido }}</li>
                <li>{{ $metadata->campos[5]->contenido }}</li>
            </ul>
        </div>
    </section>
@endsection

@section('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.img1').delay(500).fadeIn(1000);
        $('.slick').slick({
            arrows: false,
            dots: true
        });
    });

    $("form").submit(function () {
        $("#enviarButton").attr("disabled", true);
        return true;
    });

    // Consultando las DEMO DATES diponibles en ZOOM
    $.ajax({
        type : 'GET',
        url : "api/getDemoDatesFromZoom",
        dataType : 'json',
        success : function(data) {
            $('#fecha_live_demo').append('<option value="" selected disabled>@lang("textos.contacto_t9") *</option>');
            data.map((obj) => {
                if (obj.status !== 'deleted') {
                    var demoDate = new Date(obj.start_time);
                    $('#fecha_live_demo').append('<option value="'+obj.occurrence_id+'_'+demoDate.toLocaleDateString() + ' ' + demoDate.toLocaleTimeString()+'">'+demoDate.toLocaleDateString() + ' ' + demoDate.toLocaleTimeString() +'</option>');
                }
            });
        }
    });
</script>
@endsection
