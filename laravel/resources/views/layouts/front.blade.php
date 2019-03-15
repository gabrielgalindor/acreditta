<!doctype html>
<html lang="{{ app()->getLocale() }}">
<html>
    <head>
        <title>{{ $metadata->titulo, config('app.name') }}</title>
        <meta name="description" content="{{ $metadata->descripcion, config('app.name') }}">
        <meta name="keywords" content="{{ $metadata->tags, config('app.name') }}">
        <meta charset="utf-8">
        <base href="{{asset('/') }}" />

        <!--[if lt IE 9]>
        <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
        <![endif]-->
        <meta name="viewport" content="width=640" >

    @yield('css')
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

        <link href="css/estilos.css?v=25" rel="stylesheet" type="text/css" />

        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link href="{{asset('/') }}apple-touch-icon.png" rel="apple-touch-icon" />
        <link href="{{asset('/') }}apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
        <link href="{{asset('/') }}apple-touch-icon-167x167.png" rel="apple-touch-icon" sizes="167x167" />
        <link href="{{asset('/') }}apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
        <link href="{{asset('/') }}icon-hires.png" rel="icon" sizes="192x192" />
        <link href="{{asset('/') }}icon-normal.png" rel="icon" sizes="128x128" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-113618393-1', 'auto');
            ga('send', 'pageview');
        </script>
        <!-- Global site tag (gtag.js) - AdWords: 794012728 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-794012728"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-794012728');
        </script>
        <style>
        #signos{
            display: none;
        }
          
            #mc-embedded-subscribe{
                    margin-left: auto;
    margin-right: auto;
    position: relative;
    display: block;
            }

            #webi1{
                max-width: 470px;
                margin-left: auto;
    margin-right: auto;
    position: relative;
    display: block;
            }


        </style>
    </head>

    <body>
        <section class="cabecera">
            <div class="idiomas">
                <div class="cuerpo">
                @if(app()->getLocale()=='es')
                    <a href="{{ route('localization',['lang'=>'en']) }}">English</a>
                @else
                    <a href="{{ route('localization',['lang'=>'es']) }}">Español</a>
                @endif
                </div>
            </div>
            <div class="cuerpo">
                <a href="{{route('home')}}" class="logo"></a>
                <nav class="noenmobile">
                    <ul>
                        <li><a href="{{route('soluciones')}}">@lang('textos.menu1')</a></li>
                        <li><a href="{{route('blog')}}">@lang('textos.menu2')</a></li>
                        <li><a href="{{route('nosotros')}}">@lang('textos.menu3')</a></li>
                        <li><a href="{{route('home')}}#contacto">@lang('textos.menu4')</a></li>
                        <li><a target="_blank" href="{!! nl2br($boton_ingresa) !!}">@lang('textos.menu5')</a></li>
                    </ul>
                </nav>
                <div class="noenpc memumoblile"></div>
                <div class="menuhamburguesa noenpc"></div>
            </div>
        </section>
        <div class="noenpc menum fondoazul"></div>
        <!--<div id="cookies-alert" style="height: 98px; width: 640px; background-color: #F0F0F0; position: fixed; bottom: 0; right: 50%; z-index: 999999999; margin-right: -320px; border: 1px solid #ddd;">
            <a class="cerrar_lightbox" href="javascript:closeCookiesAlert();"></a>
            <div style="width: 80%; float: left;">
                <p style="margin: 20px;">
                    Este sitio web utiliza cookies para optimizar el tráfico, mejorar y personalizar su experiencia de navegación.
                    Al continuar navegando, acepta el uso de estas cookies. Obtenga más información <a href="uploads/TOS-Terminos de Uso Servicio Acreditta.pdf" target="_blank">AQUI</a>.
                </p>
            </div>
            <div style="width: 20%; float: right;">
                <button onClick="javascript:acceptCookiesAlert();" style="background: #E11F1C; border-radius: 10px; color: #fff; font-size: 1.29rem; font-weight: 700; border: none; cursor: pointer; padding: 10px 15px; margin-top: 25px;">ACEPTAR</button>
            </div>
        </div>-->
        @yield('content')
        <footer>
            <div class="cuerpo">
                <div class="bloques noenmobile">
                    <h2>@lang('textos.menu1')</h2>
                    <a href="{{route('home')}}#contacto">@lang('textos.footer1')</a>
                    <a href="{{route('soluciones')}}">@lang('textos.footer2')</a>
                </div>
                <div class="bloques noenmobile">
                    <h2>@lang('textos.menu2')</h2>
                    <a href="{{route('blog')}}">@lang('textos.footer3')</a>
                    <a href="{{route('faq')}}">@lang('textos.footer4')</a>
                </div>
                <div class="bloques noenmobile">
                    <h2>@lang('textos.menu4')</h2>
                    <p>{!! nl2br($contacto) !!}</p>
                </div>
                <div class="bloques noenmobile">
                    <h2><a href="uploads/TOS-Terminos de Uso Servicio Acreditta.pdf" target="_blank">@lang('textos.footer5')</a></h2>
                </div>
                <div class="bloques">
                    <img src="imagenes/logo_diapo.svg">
                    <ul>
                        <li><a href="https://www.linkedin.com/company/22321083/" target="_blank"><img src="imagenes/redes_linkedin.svg"></a></li>
                        <li><a href="https://www.facebook.com/acreditta/" target="_blank"><img src="imagenes/redes_facebook.svg"></a></li>
                        <li><a href="https://twitter.com/Acreditta" target="_blank"><img src="imagenes/redes_twitter.svg"></a></li>
                    </ul>

                </div>
            </div>
            <div class="separadorv"></div>
        </footer>

        
        <!-- light box ----------------------------------- -->
        <div id="fondo_lightbox" class="lightbox">
            <div id="int_lightbox">
                <div class="modal-wrapper">
                    <div class="logo_gris"></div>
                    <div class="modal_content"></div>
                    <a class="cerrar_lightbox" href="javascript:cerrar_lightbox();"></a>
                </div>
            </div>
        </div>

        <!-- modal lightbox_mailing_list -->
        <div id="lightbox_mailing_list" class="lightbox">
            <section class="f_demo">

           
            @if($popup_activo=="Newsletter")
                <h1> Suscríbete a nuestro Webinar </h1>
                
               <!-- <p style="text-align: center;">@lang('textos.lightbox_mailing_list2')</p> -->
              
                <div class="cuerpo">
                    
                   <img id="webi1" src="https://www.acreditta.com/webinar-trayectos.jpg">
           
                   <input type="submit" value="Suscribir" name="subscribe" id="mc-embedded-subscribe" class="pidecita" onclick="fuyruin()"> 
                </div>
            @endif
       


    
    <!--
        whitepaper
        380e0153b9
    -->
            </section>
        </div>
        <!-- end -->
        <!-- modal -->
        <div id="lightbox2" class="lightbox">
            <section class="f_demo">
                <h1>@lang('textos.pide_demo')</h1>
                <div class="cuerpo">
                    <form role="form" action="{{ route('gracias') }}" method="POST" id="demo_frm" name="demo_frm">
                        {{ csrf_field() }}
                        <ul>
                            <li title="Te enviaremos un link con el video grabado de la sesión"><label class="container">Live Demo<input value="Live Demo" type="checkbox" name="live_demo" value="1"><span class="checkmark"></span></label><p class="textico">Te enviaremos un link con el video grabado de la sesión</p></li>
                            <li title="Nuestros expertos responderán todas tus preguntas"><label class="container">Micro Demo<input value="Micro Demo" type="checkbox" name="micro_demo" value="1"><span class="checkmark"></span></label><p class="textico">Nuestros expertos responderán todas tus preguntas</p></li>
                            <li><input type="text" name="nombre" placeholder="@lang('textos.contacto_t1') *" required="required" maxlength="60"></li>
                            <li><input type="text" name="apellido" placeholder="@lang('textos.contacto_t2') *" required="required" maxlength="60"></li>
                            <li><input type="email" name="email" placeholder="E-mail *" required="required" maxlength="255"></li>
                            <li><input type="text" name="organizacion" placeholder="@lang('textos.contacto_t3')" maxlength="200"></li>
                            <li><input type="text" name="pais" placeholder="@lang('textos.contacto_t7')" maxlength="200"></li>
                            <li><input type="text" name="ciudad" placeholder="@lang('textos.contacto_t8')" maxlength="200"></li>
                            <li><input type="text" name="cargo" placeholder="@lang('textos.contacto_t4')" maxlength="200"></li>
                            <li><select name="fecha_live_demo" required="required">
                                <option selected disabled>@lang('textos.contacto_t9')</option>
                            @foreach($fechas as $fecha)
                                <option>{{ date('d/m/Y h:i a', strtotime($fecha->fecha)) }}</option>
                            @endforeach
                            </select></li>
                            <li class="a_completo"><select name="cuando" required="required">
                                <option selected disabled>@lang('textos.contacto_t10')</option>
                                <option>@lang('textos.contacto_t11')</option>
                                <option>@lang('textos.contacto_t12')</option>
                                <option>@lang('textos.contacto_t13')</option>
                            </select></li>
                            <li class="a_completo"><select name="como" required="required">
                                <option selected disabled>@lang('textos.contacto_t14')</option>
                                <option>@lang('textos.contacto_t15')</option>
                                <option>@lang('textos.contacto_t16')</option>
                                <option>@lang('textos.contacto_t17')</option>
                                <option>@lang('textos.contacto_t18')</option>
                                <option>@lang('textos.contacto_t19')</option>
                                <option>@lang('textos.contacto_t20')</option>
                                <option>@lang('textos.contacto_t21')</option>
                            </select></li>
                        </ul>
                        <div class="separador"></div>
                        <p><center><button class="pidecita">@lang('textos.contacto_t22')</button></center></p>
                    </form>
                </div>
            </section>
        </div>
        <!-- end -->

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2085362635073969');
    fbq('track', 'PageView');
    </script>
    <noscript>
    <img height="1" width="1"
    src="https://www.facebook.com/tr?id=2085362635073969&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Twitter universal website tag code -->
    <script>
    !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
    },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
    a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
    // Insert Twitter Pixel ID and Standard Event data below
    twq('init','nzbul');
    twq('track','PageView');
    </script>
    <!-- End Twitter universal website tag code -->

    <script type="text/javascript">
    _linkedin_data_partner_id = "296242";
    </script><script type="text/javascript">
    (function(){var s = document.getElementsByTagName("script")[0];
    var b = document.createElement("script");
    b.type = "text/javascript";b.async = true;
    b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
    s.parentNode.insertBefore(b, s);})();
    </script>
    <noscript>
    <img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=296242&fmt=gif" />
    </noscript>


<div id="largo-largo-largo">
    

</div>


    <script>

  var offset = new Date().getTimezoneOffset();
console.log(offset);

 var fecha = new Date();
 console.log(fecha);

 var horareal = fecha.getHours();
var horaoffset = Math.round(offset/60);

horareal = horareal + horaoffset;

setTimeout(huyt,5500);

function huyt(){
    document.getElementsByTagName("intercom-launcher-frame").style.display="none";
}

</script>


</body>
</html>
<script src="js/jquery-1.7.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.menum').html($('nav').html());
        function ajustar() {
            var scrollTop = $(window).scrollTop();
            if(scrollTop > 10) {
                $('.cabecera').addClass('fondoazul');
            }
            else {
                $('.cabecera').removeClass('fondoazul');
            }
            @yield('js_scroll')
        }

        $(window).scroll(function() { ajustar(); });

        $('.memumoblile').click(function() {
            $('html,body').animate({scrollTop:0},1000);
            $('.menum').slideToggle(300);
        });

        cerrar_lightbox = function() {
            $('body').removeClass('body_sin_scroll');
            $("#fondo_lightbox").fadeOut(300);
            $(".modal-wrapper").removeClass('modal-wrapper_g');
            $(".modal_content").html('');
        }

        @if($popup_activo<>"Ninguno")
        <?php if ( ! session_id() ) @session_start(); ?>
            @if(!isset($_SESSION['vio_popup']))
                setTimeout(function() {
                    $('body').addClass('body_sin_scroll');
                    $(".modal_content").html($('#lightbox_mailing_list').html());
                    $("#fondo_lightbox").fadeIn(500);
                }, 5000)
                <?php $_SESSION['vio_popup']='si'; ?>
            @endif
        @endif

        //Chequeando COOKIES ALERT
        const cookiesAlert = localStorage.getItem('acreditta-cookies-alert');
        if (cookiesAlert !== undefined && cookiesAlert) {

        }
        else {
            showCookiesAlert();
        }
    });

    function showCookiesAlert() {
        $('body').append('<div id="cookies-alert" style="height: 98px; width: 640px; background-color: #F0F0F0; position: fixed; bottom: 0; right: 50%; z-index: 999999999; margin-right: -320px; border: 1px solid #ddd;">\
                            <a class="cerrar_lightbox" href="javascript:closeCookiesAlert();"></a>\
                            <div style="width: 80%; float: left;">\
                                <p style="margin: 20px;">\
                                    @lang("textos.cookies_alert")\
                                    <a href="uploads/TOS-Terminos de Uso Servicio Acreditta.pdf" target="_blank">@lang("textos.cookies_alert_info")</a>.\
                                </p>\
                            </div>\
                            <div style="width: 20%; float: right;">\
                                <button onClick="javascript:acceptCookiesAlert();" style="background: #E11F1C; border-radius: 10px; color: #fff; font-size: 1.29rem; font-weight: 700; border: none; cursor: pointer; padding: 10px 15px; margin-top: 25px;">@lang("textos.cookies_alert_accept")</button>\
                            </div>\
                        </div>');
    }

   function acceptCookiesAlert() {
        localStorage.setItem('acreditta-cookies-alert', true);
        $("#cookies-alert").remove();
    }

    function closeCookiesAlert() {
        $("#cookies-alert").remove();
    }
</script>





<script type="text/javascript">
    
    myVar = setTimeout(transt, 40);
        var conty=0;
        var contx=1;
        var bandy = true;
        var bandx = false;
        
        function transt (){
            
              var uw = ((Math.PI)*(conty))/180;
            
        
            contx = contx + 1;
            
            switch(contx)
                {
                    case 1:
                        conty = 10;
                        break;
                    case 2:
                        conty = 30;
                        break;
                    case 3:
                        conty = 50;
                        break;
                    case 4:
                        conty = 70;
                        break;
                    case 5:
                        conty = 90;
                        break;
                    case 6:
                        conty = 120;
                        break;
                    case 7:
                        conty = 150;
                        break;
                    case 8:
                        conty = 180;
                        break;
                    case 9:
                        conty = 210;
                        break;
                    case 10:
                        conty = 240;
                        break;
                    case 11:
                        conty = 270;
                        break;
                    case 12:
                        conty = 300;
                        break;
                    case 13:
                        conty = 330;
                        break;
                    case 14:
                        conty = 360;
                        break;
                    case 15:
                        conty = 330;
                        break;
                    case 16:
                        conty = 300;
                        break;
                    case 17:
                        conty = 270;
                        break;
                    case 18:
                        conty = 240;
                        break;
                    case 19:
                        conty = 210;
                        break;
                    case 20:
                        conty = 180;
                        break;
                    case 21:
                        conty = 150;
                        break;
                    case 22:
                        conty = 120;
                        break;
                    case 23:
                        conty = 90;
                        break;
                    case 24:
                        conty = 60;
                        break;
                    case 25:
                        conty = 30;
                        break;
                    case 26:
                        conty = 0;
                        contx = 1;
                        break;
                }
            
            uw = uw*0.5;
            document.getElementById("int_lightbox").style.transform="translate(0%,"+uw+"%)";
            
            myVar = setTimeout(transt, 40);
        }
        
    
        function fuyruin() {

            window.open("https://zoom.us/webinar/register/9715513718258/WN_wWyqi_bAQd6iGXo5njRyqA", "_self");
        }
</script>




@yield('js')
@yield('js_frm')
