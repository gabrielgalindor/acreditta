<a name="contacto" id="contacto"></a>
<section class="inicio7">
    <h1>Queremos conocerte más</h1>
    <div class="cuerpo">
        <form role="form" action="{{ route('contacto_frm') }}" method="POST" id="contacto_frm">
            {{ csrf_field() }}
            <ul>
                <li><input type="text" name="nombre" placeholder="Nombre" required="required" maxlength="60"></li>
                <li><input type="text" name="apellido" placeholder="Apellido" required="required" maxlength="60"></li>
                <li><input type="text" name="organizacion" placeholder="Organización" maxlength="200"></li>
                <li><input type="text" name="cargo" placeholder="Cargo" maxlength="200"></li>
                <li><input type="email" name="email" placeholder="E-mail" required="required" maxlength="255"></li>
                <li><input type="text" name="ciudad" placeholder="Ciudad / País" maxlength="200"></li>
                <li><textarea name="cuerpo" placeholder="¿Cómo podemos ayudarte?" rows="6" required="required"></textarea></li>
            </ul>
            <div class="otros_links">
                <div><a href="{{ route('faq') }}" class="linksubrayado">PREGUNTAS FRECUENTES</a></div>
                <div><a href="uploads/TOS-Terminos de Uso Servicio Acreditta.pdf" target="_blank" class="linksubrayado">TÉRMINOS Y CONDICIONES</a></div>
            </div>
            <div class="separadorv"></div>
            <div class="enviado"></div>
            <p><center><button class="pidecita">CONTÁCTANOS</button></center></p>
            <div class="g-recaptcha"
                  data-sitekey="6LerH1gUAAAAAJSS10Hwhyp2bXjlSvzCKzhTyL-h"
                  data-callback="onSubmit"
                  data-size="invisible">
            </div>
        </form>
    </div>
</section>

@section('js_frm')
<script type="text/javascript">
    $('#contacto_frm').submit(function(e) {
        e.preventDefault();
        grecaptcha.execute();
    })
    function onSubmit(token){
        $.ajax({
            type : 'POST',
            url : $('#contacto_frm').attr('action'),
            data : $('#contacto_frm').serialize(),
            dataType : 'json',
            beforeSend : function(){
                $("body").append('<div id="cargando"></div>');
            },
            success : function(data) {
                if(data.estatus=='exito'){
                    document.getElementById("contacto_frm").reset();
                    $('.enviado').html('Tu mensaje ha sido enviado exitosamente, pronto serás contactado por nuestro equipo');
                }else{
                    $('.enviado').html(data.mensaje[0]);
                    grecaptcha.reset();
                }
                $('.enviado').fadeIn(600);
                $('#cargando').remove();
                setTimeout(function(){$('.enviado').fadeOut(500);}, 9000);
            }
        })
    };
                    
</script>
@endsection
