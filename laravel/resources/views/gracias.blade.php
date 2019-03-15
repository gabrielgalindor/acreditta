@extends('layouts.front')

@section('css')
<script>
  fbq('track', 'CompleteRegistration');
</script>
@endsection



@section('content')
<section class="gracias1 bg_azul_gradiente">
    <div class="cuerpo">
        <img src="imagenes/tuercas.svg" class="tuerca1">
        <img src="imagenes/tuercas.svg" class="tuerca2">
        <img src="imagenes/tuercas.svg" class="tuerca3">                

        <h1>{{ $metadata->campos[0]->contenido }}</h1>
        <p>{{ $metadata->campos[1]->contenido }}</p>
        <ul>
            <li><a href="https://www.linkedin.com/company/22321083/" target="_blank"><img src="imagenes/redes_linkedin.svg"></a></li>
            <li><a href="https://www.facebook.com/acreditta/" target="_blank"><img src="imagenes/redes_facebook.svg"></a></li>
            <li><a href="https://twitter.com/Acreditta" target="_blank"><img src="imagenes/redes_twitter.svg"></a></li>
        </ul>
    </div>
</section>
<section class="gracias2">
    <div><p>{{ $metadata->campos[2]->contenido }}</p></div>
</section>
<section class="gracias3"">
    <div class="cuerpo">
        <ul>
            <li>
                <img src="imagenes/gracias1.png">
                <h2>{{ $metadata->campos[3]->contenido }}</h2>
                <p>{{ $metadata->campos[4]->contenido }}</p>
                <a href="{{ $metadata->campos[5]->contenido }}">VER</a>
            </li>
            <li>
                <img src="imagenes/gracias2.png">
                <h2>{{ $metadata->campos[6]->contenido }}</h2>
                <p>{{ $metadata->campos[7]->contenido }}</p>
                <a href="{{ $metadata->campos[8]->contenido }}">VER</a>
            </li>
            <li>
                <img src="imagenes/gracias3.png">
                <h2>{{ $metadata->campos[9]->contenido }}</h2>
                <p>{{ $metadata->campos[10]->contenido }}</p>
                <a href="{{ $metadata->campos[11]->contenido }}">VER</a>
            </li>
        </ul>
        <div class="separador"></div>
    </div>
</section>

@endsection

