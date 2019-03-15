@extends('layouts.front2')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
@endsection

@section('content')

    <section class="inicio1 bg_azul_gradiente">
        <div class="contenedor">
                <img src="imagenes/tuercas.svg" class="tuerca1">
                <img src="imagenes/tuercas.svg" class="tuerca2">
                <img src="imagenes/tuercas.svg" class="tuerca3">                
        </div>
        <div class="cuerpo">
            <p>
                {{ $metadata->campos[0]->contenido }}<br>
                <b>{{ $metadata->campos[1]->contenido }}</b><br>
                <a href="" class="pidecita b_lightbox1">@lang('textos.home_boton1')</a>
            </p>
            <div class="muestra"></div>
            <img src="imagenes/CREDECICIALES_DIGITALES-05{{ trans('textos.id_im') }}.png" class="img1">
            <img src="imagenes/CREDECICIALES_DIGITALES-04{{ trans('textos.id_im') }}.png" class="img2">
            <img src="imagenes/CREDECICIALES_DIGITALES-03{{ trans('textos.id_im') }}.png" class="img3">
        </div>
    </section>
    <section class="inicio2">
        <b>{{ $metadata->campos[2]->contenido }}</b><br>
        {{ $metadata->campos[3]->contenido }}<br>
        <table align="center">
            <tr>
                <td>
                    <img src="imagenes/rosca_azul1.gif">
                    <h2>@lang('textos.inicio1')</h2>
                </td>
                <td>
                    <img src="imagenes/rosca_azul2.gif">
                    <h2>@lang('textos.inicio2')</h2>
                </td>
            </tr>
        </table>
        <img src="imagenes/CREDECICIALES_DIGITALES-01{{ trans('textos.id_im') }}.png" class="img4">
    </section>
    <section class="inicio3">
        <div class="contenido">
            <h2>{{ $metadata->campos[4]->contenido }}</h2>
            <div class="slick">
                @if($metadata->campos[5]->contenido!='')<div><p>{{ $metadata->campos[5]->contenido }}</p></div>@endif
                @if($metadata->campos[6]->contenido!='')<div><p>{{ $metadata->campos[6]->contenido }}</p></div>@endif
                @if($metadata->campos[7]->contenido!='')<div><p>{{ $metadata->campos[7]->contenido }}</p></div>@endif
            </div>
            <div class="enlace"><a href="{{ $metadata->campos[8]->contenido }}" class="linksubrayado">VER MÁS</a></div>
        </div>
    </section>
    <section class="inicio4">
        <p>{!! $metadata->campos[9]->contenido !!}</p>
    </section>
    <section class="inicio5">
        <div class="cuerpo">
            <h2>{{ $metadata->campos[10]->contenido }}</h2>
            <div class="tabla">
                <div class="celda">
                    <center><img src="imagenes/acreditta_ventajas-01.png"></center>
                    <h3>{{ $metadata->campos[11]->contenido }}</h3>
                    <p>{{ $metadata->campos[12]->contenido }}</p>
                </div>
                <div class="celda">
                    <center><img src="imagenes/acreditta_ventajas-03.png"></center>
                    <h3>{{ $metadata->campos[13]->contenido }}</h3>
                    <p>{{ $metadata->campos[14]->contenido }}</p>
                </div>
                <div class="celda">
                    <center><img src="imagenes/acreditta_ventajas-02.png"></center>
                    <h3>{{ $metadata->campos[15]->contenido }}</h3>
                    <p>{{ $metadata->campos[16]->contenido }}</p>
                </div>
                <div class="celda">
                    <center><img src="imagenes/acreditta_ventajas-04.png"></center>
                    <h3>{{ $metadata->campos[17]->contenido }}</h3>
                    <p>{{ $metadata->campos[18]->contenido }}</p>
                </div>
                <div class="celda">
                    <center><img src="imagenes/acreditta_ventajas-05.png"></center>
                    <h3>{{ $metadata->campos[19]->contenido }}</h3>
                    <p>{{ $metadata->campos[20]->contenido }}</p>
                </div>
                <div class="celda">
                    <center><img src="imagenes/acreditta_ventajas-06.png"></center>
                    <h3>{{ $metadata->campos[21]->contenido }}</h3>
                    <p>{{ $metadata->campos[22]->contenido }}</p>
                </div>
                <div class="celda">
                    <center><img src="imagenes/acreditta_ventajas-07.png"></center>
                    <div class="contenido">
                        <h3>{{ $metadata->campos[23]->contenido }}</h3>
                        <p>{{ $metadata->campos[24]->contenido }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="inicio6">
        <h2>{{ $metadata->campos[25]->contenido }}<br>{{ $metadata->campos[26]->contenido }}</h2>
        <p>{{ $metadata->campos[27]->contenido }}</p>
        <img src="imagenes/LIFECYCLE-01{{ trans('textos.id_im') }}.png"><br>
        <a href="" class="pidecita b_lightbox1">@lang('textos.home_boton1')</a>
    </section>

    @include('partials._contacto')
@endsection

@section('js_scroll')
<!--
    if(scrollTop<770){
        $('.tuerca1').css('top',409 - (scrollTop/2));
        $('.tuerca2').css('top',658 - (scrollTop/1.5));
        $('.tuerca3').css('top',555 - (scrollTop/3));
    }
-->
@endsection

@section('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.img1').delay(500).fadeIn(1000);
        $('.img2').delay(700).fadeIn(1000);
        $('.img3').delay(900).fadeIn(1000);

        $('.slick').slick({
            arrows: false,
            dots: true
        });

        $('.b_lightbox1').click(function(e) {
            e.preventDefault();
            $('body').addClass('body_sin_scroll');
            $(".modal_content").html('');
            $(".modal-wrapper").addClass('modal-wrapper_g');
            $(".modal_content").html($('#lightbox2').html());
            $("#fondo_lightbox").fadeIn(500);
        });
    });
</script>



@endsection
