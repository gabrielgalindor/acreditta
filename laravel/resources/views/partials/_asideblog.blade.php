<aside>
    @foreach($categorias as $categoria)
        @if($categoria->posts->Count()>0)
            <div>
                <a href="{{ route('blog_cat',['slug' => $categoria->slug]) }}" @if($aprende_seccion === 'blog') @if($categoria_id === $categoria->id) class="active" @endif @endif>{{$categoria->categoria}}</a>
            </div>
        @endif
    @endforeach
    <div>
        <a class="ver_video">VIDEO</a>
    </div>
    <div>
        <a href="{{ route('faq') }}" @if($aprende_seccion === 'faq') class="active" @endif>@lang('textos.contacto_text1')</a>
    </div>
</aside>
<!-- VIDEO MODAL -->
<div id="lightbox1" class="lightbox">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/EGQ3e1XCISs?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <table width="100%"><tr>
        <td align="center"><a href="javascript:carga_cita();" class="boton_rojo">@lang('textos.home_boton1')</a></td>
        <td align="center"><a class="boton_blanco">@lang('textos.lightbox_mailing_list1')</a></td>
    </tr></table>
</div>
<!-- END VIDEO MODAL -->
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('.ver_video').click(function(e) {
            e.preventDefault();
            $('body').addClass('body_sin_scroll');
            $(".modal_content").html('');
            $(".modal_content").html($('#lightbox1').html());
            $("#fondo_lightbox").fadeIn(500);
        });

        carga_cita=function() {
            $(".modal_content").html('');
            $(".modal-wrapper").addClass('modal-wrapper_g');
            $(".modal_content").html($('#lightbox2').html());
        }
    });
</script>
@endsection