@extends('layouts.front')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
@endsection

@section('content')
<section class="nototros1 bg_azul_gradiente">
    <div class="contenedor">
            <img src="imagenes/tuercas.svg" class="tuerca1">
            <img src="imagenes/tuercas.svg" class="tuerca2">
            <img src="imagenes/tuercas.svg" class="tuerca3">                
    </div>
    <div class="cuerpo">
        <p>{{ $metadata->campos[0]->contenido }}</p>
        <div class="muestra" style="background: url(imagenes/muestra2{{ trans('textos.id_im') }}.png);"></div>
        <img src="imagenes/CREDECICIALES_DIGITALES-01{{ trans('textos.id_im') }}.png" class="img1 noenmobile">
    </div>
</section>

<section class="nototros2">
    <h2>{{ $metadata->campos[1]->contenido }}</h2>
    <p>{!! nl2br($metadata->campos[2]->contenido) !!}</p>
    <h3>{{ $metadata->campos[3]->contenido }}</h3>
</section>

<section class="solucion3 nosotros3">
    <div class="slick">
    @for($l=5; $l<=12; $l+=2)
        <div class="contenedor">
            <div class="items">
                <h2>{{ $metadata->campos[$l]->contenido }}</h2>
                <div class="info"><p>{!! $metadata->campos[$l + 1]->contenido !!}</p></div>
            </div>
        </div>
    @endfor
    </div>
    <h1>{{ $metadata->campos[4]->contenido }}</h1>
</section>

    @include('partials._contacto')

@endsection

@section('js_scroll')
    if(scrollTop<770){
        $('.tuerca1').css('top',254 - (scrollTop/2));
        $('.tuerca2').css('top',503 - (scrollTop/1.5));
        $('.tuerca3').css('top',400 - (scrollTop/3));
    }
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
</script>
@endsection
