@extends('layouts.front')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
@endsection

@section('content')
<section class="solucion1 bg_azul_gradiente">
    <h1>{{ $metadata->campos[0]->contenido }}<br>{{ $metadata->campos[1]->contenido }}</h1>
    <a href="{{route('home')}}#contacto" class="pidecita">@lang('textos.empiezaya')</a>
</section>
<section class="solucion2 cuerpo">
    <article>
        <div class="imagen"><img src="imagenes/Acreditta_IconosSoluciones-01.png"></div>
        <div class="info">
            <h2>{{ $metadata->campos[2]->contenido }}</h2>
            <p>{{ $metadata->campos[3]->contenido }}</p>
        </div>
    </article>
    <article>
        <div class="imagen"><img src="imagenes/Acreditta_IconosSoluciones-02.png"></div>
        <div class="info">
            <h2>{{ $metadata->campos[4]->contenido }}</h2>
            <p>{{ $metadata->campos[5]->contenido }}</p>
        </div>
    </article>
    <article>
        <div class="imagen"><img src="imagenes/Acreditta_IconosSoluciones-03.png"></div>
        <div class="info">
            <h2>{{ $metadata->campos[6]->contenido }}</h2>
            <p>{{ $metadata->campos[7]->contenido }}</p>
        </div>
    </article>
    <article>
        <div class="imagen"><img src="imagenes/Acreditta_IconosSoluciones-04.png"></div>
        <div class="info">
            <h2>{{ $metadata->campos[8]->contenido }}</h2>
            <p>{{ $metadata->campos[9]->contenido }}</p>
        </div>
    </article>
    <article>
        <div class="imagen"><img src="imagenes/Acreditta_IconosSoluciones-05.png"></div>
        <div class="info">
            <h2>{{ $metadata->campos[10]->contenido }}</h2>
            <p>{{ $metadata->campos[11]->contenido }}</p>
        </div>
    </article>
    <article>
        <div class="imagen"><img src="imagenes/Acreditta_IconosSoluciones-06.png"></div>
        <div class="info">
            <h2>{{ $metadata->campos[12]->contenido }}</h2>
            <p>{{ $metadata->campos[13]->contenido }}</p>
        </div>
    </article>
</section>
<section class="solucion3_1">
    <div class="cuerpo">
        <h2>{{ $metadata->campos[14]->contenido }}</h2>
        <p>{{ $metadata->campos[15]->contenido }}</p>
    </div>
</section>
<section class="solucion3">
    <div class="slick">
    @for($l=16; $l<=27; $l+=2)
        <div class="contenedor">
            <div class="items">
                <h2>{{ $metadata->campos[$l]->contenido }}</h2>
                <div class="info"><p>{{ $metadata->campos[$l + 1]->contenido }}</p></div>
            </div>
        </div>
    @endfor
    </div>
</section>
<section class="solucion4">
    <div class="cuerpo">
        <h2>{{ $metadata->campos[28]->contenido }}</h2>
        <p>{{ $metadata->campos[29]->contenido }}</p>
    </div>
</section>
<section class="solucion5">
    <img src="imagenes/soluciones_logos.jpg">
    <h2>{{ $metadata->campos[30]->contenido }}</h2>
    <p>{!! nl2br($metadata->campos[31]->contenido) !!}</p>
</section>
<section class="solucion6">
    <h2>{{ $metadata->campos[32]->contenido }}</h2>
    <a href="{{route('home')}}#contacto" class="pidecita">@lang('textos.soluciones1')</a>
</section>
@endsection

@section('js')


<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/nb3n0n5l';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
</section>

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.slick').slick({
            autoplay:true,
            autoplaySpeed:5000,
            arrows: false,
            dots: true
        });
    });
</script>


@endsection
