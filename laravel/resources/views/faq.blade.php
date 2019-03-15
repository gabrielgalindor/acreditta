@extends('layouts.front')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
@endsection

@section('content')


<section class="blog1">
    <div class="blog1_fondo bg_azul_gradiente"></div>
    <h1>{{ $metadata->campos[0]->contenido }}</h1>
</section>
<section class="blog2 cuerpo">
    @include('partials._asideblog')
    <div class="blog3">
        @include('partials._buscador')
        @foreach($faqs as $faq)
            <article>
                <h2>{{ $faq->pregunta }}</h2>
                <p>{!! $faq->respuesta !!}</p>
            </article>
        @endforeach
    </div>
    <div class="separadorv"></div>
</section>


@endsection

@section('js')

<script>
  window.intercomSettings = {
    app_id: "nb3n0n5l"
  };
</script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/nb3n0n5l';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
@endsection


