<a name="contacto" id="contacto"></a>
 <script src="https://www.google.com/recaptcha/api.js" async defer>
     

 </script>

<section class="inicio7">
    <h1>@lang('textos.contacto_tit')</h1>
    <div class="cuerpo">
        <form action="https://www.acreditta.com/prueba32.php" method="POST"  id="contacto_frm">
            <input type=hidden name="oid" value="00D6A000002kXht">
            <input type=hidden name="retURL" value="https://www.acreditta.com/gracias">
            <input type=hidden name="lead_source" id="lead_source" value="Web">
            
            <input type=hidden name="Type__c"  value="Inbound">
            <p id="mf1"> Por favor diligencie cada campo y el Captcha </p>
            <div class="g-recaptcha" data-sitekey="6LfJpY8UAAAAAKdFMTuv242-zeBQv9R_jpsCAduI" data-callback="enableBtn" name="recaptcha"></div>
            
            <input type=hidden name="_token" value="{{ csrf_token() }}">
            
            <ul>
                
                <li><input  id="first_name" maxlength="40" name="first_name" size="20" type="text" required="required" placeholder="@lang('textos.contacto_t1')" /></li>
                <li><input  id="last_name" maxlength="80" name="last_name" size="20" type="text" required="required" placeholder="@lang('textos.contacto_t2')" /></li>
                <li><input  id="company" maxlength="40" name="company" size="20" type="text" required="required" placeholder="@lang('textos.contacto_t3')" /></li>
                <li><input  id="title" maxlength="40" name="title" size="20" type="text" required="required" placeholder="@lang('textos.contacto_t4')" /></li>
                <li><input  id="email" maxlength="80" name="email" size="20" type="text" required="required"  placeholder="@lang('textos.contacto_t5')" required="required" /></li>
                <li><input  id="phone" maxlength="40" name="phone" size="20" type="text" required="required"  placeholder="@lang('textos.contacto_t5_1')" /></li>
                <li><textarea  id="00N6A00000NnnFO" name="00N6A00000NnnFO" rows="3" type="text" wrap="soft" rows="6" required="required" placeholder="@lang('textos.contacto_t6')"></textarea></li>

            </ul>
            <div class="otros_links">
                <div><a href="{{ route('faq') }}" class="linksubrayado">@lang('textos.contacto_text1')</a></div>
                <div><a href="uploads/TOS-Terminos de Uso Servicio Acreditta.pdf" target="_blank" class="linksubrayado">@lang('textos.contacto_text2')</a></div>
            </div>
            <div class="separadorv"></div>
            <p><center><input type="submit" id="btnsub" name="submit" class="pidecita" value="@lang('textos.contacto_boton')" disabled style="opacity: 0.5;"></center></p>
<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
<!--  these lines if you wish to test in debug mode.                          -->
<!-- <input type="hidden" name="debug" value=1><input type="hidden" name="debugEmail" value="anitalaya@acreditta.com"> -->
<!--  ----------------------------------------------------------------------  -->
        </form>

    </div>

    <script>
        
        document.getElementById("btnsub").disabled = true;

         function enableBtn(){
                document.getElementById("mf1").style.opacity = "0.2";
                document.getElementById("btnsub").style.opacity = "1";
                document.getElementById("btnsub").disabled = false;
          }

    </script>
</section>
