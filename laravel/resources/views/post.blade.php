@php
    $metadata->titulo = $post->titulo . ' | Acreditta';
    $metadata->descripcion = $post->resumen;
    $metadata->tags = $post->tags;
@endphp

@extends('layouts.front')

@section('css')
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->titulo }}" />
<meta property="og:description" content="{{ $post->resumen }}" />
@if($post->foto<>'')
    <meta property="og:image" content="{{asset('/') }}uploads/blog/{{ $post->foto }}" />
@endif
<meta property="og:site_name" content="Acreditta" />
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5a8454da4b5cb20013b1845d&product=sticky-share-buttons' async='async'></script>
<style>
    .user-signature * {
        font-size: 70% !important;
    }
</style>
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
        <article>
            @if($post->foto <> '')
                <img src="uploads/blog/{{ $post->foto }}" alt="{{ $post->titulo }}">
            @endif
            @if($usuario)
                <div style="display: flex; margin: 20px 0px;">
                    <div>
                        <img style="vertical-align: middle; width: 60px; height: 60px; border-radius: 50%; margin-bottom: 0px;" @if($usuario->avatar <> '') src="uploads/avatars/{{ $usuario->avatar }}" @else src="uploads/avatars/default-avatar.png" @endif alt="{{ $usuario->nombre }}" class="avatar">
                    </div>
                    <div style="margin-left: 20px;">
                        <a href="{{route('blog') . '?txtbuscar=' . $post->fuente }}"><b style="font-size: 15px;">{{ $usuario->nombre }}</b></a><br/>
                        <span class="user-signature">{!! $usuario->firma !!}</span>
                    </div>
                </div>
            @endif
            <div class="fecha">{{ meses(date('n', strtotime($post->fecha))) . ' ' . date('d, Y', strtotime($post->fecha)) }}</div>
            <h1>{{ $post->titulo }}</h1>
            <p>{!! $post->cuerpo !!}</p>
            @if($post->fuente<>'')
            <!--<p><a href="{{route('blog') . '?txtbuscar=' . $post->fuente }}" class="fuente">{{ $post->fuente }}</a></p>-->
            @endif
            <p>
                <!-- Begin MailChimp Signup Form -->
                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                <style type="text/css">
                    #mc_embed_signup {
                        background: #fff;
                        clear: left;
                        font: 14px Helvetica,Arial,sans-serif;
                    }
                /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                  We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                </style>
                <div id="mc_embed_signup">
                    <form action="https://acreditta.us17.list-manage.com/subscribe/post?u=bbd366b84d1806899f976ade8&amp;id=8bcc7ea8b1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <h2>@lang('textos.lightbox_mailing_list1')</h2>
                            <p>@lang('textos.lightbox_mailing_list2')</p>
                            <div class="mc-field-group">
                                <label for="mce-EMAIL">E-mail <span class="asterisk">*</span></label>
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bbd366b84d1806899f976ade8_8bcc7ea8b1" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                        </div>
                    </form>
                </div>
                <!--End mc_embed_signup-->
            </p>
        </article>
    </div>
    <div class="separadorv"></div>

    <script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/nb3n0n5l';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
    
</section>
@endsection

@section('js')
@endsection