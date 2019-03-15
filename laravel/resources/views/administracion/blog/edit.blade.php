@extends('layouts.admin')

@section('css')
<link href="css/slim.min.css" rel="stylesheet">
<style>
    #mistags div {
        margin: 5px 5px 0 0;
        padding: 2px;
        float: left;
        cursor:pointer;
    }

    #mistags div span {
        width: 15px;
        height: 15px;
        line-height: 13px;
        background: #FDD;
        color: #AAA;
        text-align: center;
        margin-right: 5px;
        display: inline-block;
        border: 1px solid #CCC;
    }

    #tagsdisponibles div {
        float: left;
        color: #0094D2;
        margin-right: 10px;
        cursor:pointer;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">Blog</h1>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('administracion_home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route("admin.blog.index") }}"><i class="fa fa-fw fa-pencil"></i> Blog</a></li>
            <li>Editar</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-10">
        @if($notificacion=Session::get('notificacion'))
        <div class="alert alert-success">{{ $notificacion }}</div>
        @endif
        @if($notificacion_error=Session::get('notificacion_error'))
        <div class="alert alert-danger">{{ $notificacion_error }}</div>
        @endif
    </div>
    <div class="col-lg-2">
        <p class="text-right">
            <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-list"></i>Volver a la lista</a>
        </p>
    </div>
</div>
<form role="form" action="{{ route('admin.blog.update', codifica($blog->id)) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                <label>TÃ­tulo</label>
                <input type="text" class="form-control" name="titulo" value="{{ old('titulo', $blog->titulo) }}" maxlength="100" required autofocus>
                @if ($errors->has('titulo'))
                <p class="help-block">{{ $errors->first('titulo') }}</p>
                @endif
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                <label>Fecha</label>
                <input type="date" class="form-control" name="fecha" value="{{ old('fecha', date('Y-m-d',strtotime($blog->fecha))) }}" required>
                @if ($errors->has('fecha'))
                <p class="help-block">{{ $errors->first('fecha') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>CategorÃ­a</label>
                <select name="categoria_id" class="form-control">
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if($categoria->id==old('categoria_id', $blog->categoria_id)) selected @endif>{{ $categoria->categoria_es }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Idioma</label>
                <select name="idioma" class="form-control">
                    <option value="es" @if(old('idioma', $blog->idioma)=='es') selected @endif>EspaÃ±ol</option>
                    <option value="en" @if(old('idioma', $blog->idioma)=='en') selected @endif>InglÃ©s</option>
                </select>
            </div>
            <div class="form-group">
                <label>Resumen</label>
                <textarea name="resumen" rows="5" class="form-control">{{ old('resumen', $blog->resumen) }}</textarea>
            </div>
            <div class="form-group">
                <label>Fuente / Autor</label>
                <select name="fuente" class="form-control">
                    <option value=""></option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" @if(old('fuente', $blog->fuente) == $usuario->id) selected @endif>{{ $usuario->nombre }} - {{ $usuario->email }}</option>
                    @endforeach
                </select>
            </div>
            <!--<div class="form-group">
                <label>Fuente / Autor</label>
                <input type="text" class="form-control" name="fuente" value="{{ old('fuente', $blog->fuente) }}"
                    maxlength="100">
            </div>-->
            <!--
            <div class="form-group">
                <label>Enlace</label>
                <input type="text" class="form-control" name="enlace" value="{{ old('enlace', $blog->enlace) }}" maxlength="200">
            </div>
        -->
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Cuerpo</label>
                <textarea name="cuerpo" rows="5" class="form-control">{{ old('cuerpo', $blog->cuerpo) }}</textarea>
                <p style="padding-top: 10px;">
                    <a href="{{ route('cargafotos') }}" target="_blank" class="btn btn-success">GalerÃ­a de imÃ¡genes</a>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Foto</label>
                <div class="slim">
                    <input name="archivo" type="file" accept="image/jpeg, image/png, image/gif" />
                    @if($blog->foto<>'')<img src="uploads/blog/{{ $blog->foto }}" style="max-width: 100%">@endif
                </div>
                <label><span>MÃ­nimo 720 pÃ­xeles de anho (alto libre) | JPG o PNG</span></label>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Tags (Ãºnicamente letras en minÃºsculas sin caracteres especiales)</label>
                <input type="text" name="tags" id="tags" value="{{ old('tags', $blog->tags) }}" maxlength="250" style="display:none; ">
                <div id="mistags"></div>
                <div style="clear:both;"></div>
                <p><input class="form-control" onkeypress="return onKeyPressSoloMin(event);" maxlength="50" name="ntag"
                        id="ntag" value="" placeholder="Buscar / Agregar tag"></p>
                <p><a href="javascript:agregartag()" class="btn btn-success">Agregar</a></p>
                <section id="tagsdisponibles"></section>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Guardar</button>
            <a href="{{ route('admin.blog.index') }}" class="btn btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i>Nuevo</a>
            <a href="{{ route('blog_eliminar', codifica($blog->id) ) }}" class="btn btn-danger"><i class="fa fa-fw fa-ban"></i>Eliminar</a>
        </div>
    </div>
</form>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function(){
            $(".alert").slideUp(500);
        },10000);
    });
</script>
<script src="js/slim.jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.slim').slim({
        label: 'Arrastra tu imagen Ã³ haz click aquÃ­',
        ratio: 'free',
        minSize: {
            width: 720,
            height: 250
        },
        size: {
            width: 720,
            height: 1024
        },
        download: true,
        labelLoading: 'Cargando imagen...',
        statusImageTooSmall: 'La imagen es muy pequeÃ±a. El tamaÃ±o mÃ­nimo es $0 pÃ­xeles.',
        statusUnknownResponse: 'Ha ocurrido un error inesperado.',
        statusUploadSuccess: 'Imagen guardada',
        statusFileType: 'El formato de imagen no es permitido. Solamente: $0.',
        statusFileSize: 'El tamaÃ±o mÃ¡ximo de imagen es 2MB.',
        buttonConfirmLabel: 'Aceptar',
        buttonConfirmTitle: 'Aceptar',
        buttonCancelLabel: 'Cancelar',
        buttonCancelLabel: "Cancelar",
        buttonCancelTitle: "Cancelar",
        buttonEditTitle: "Editar",
        buttonRemoveTitle: "Eliminar",
        buttonRotateTitle: "Rotar",
        buttonUploadTitle: "Guardar"
        });
    });
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
if ( typeof CKEDITOR == 'undefined' ){}
else{
var editor;
editor = CKEDITOR.replace('cuerpo');
}
//tags
$(document).ready(function(e){
tagsdisponibles=function(){
$("#tagsdisponibles").load("api/tagsdisponibles?tags=" + escape($("#tags").val()) + "&filtro=" + $("#ntag").val());
}
$("#mistags").load("api/muestratags?tags=" + escape($("#tags").val()), function(){
tagsdisponibles();
});

agregartag=function(){
$.get("api/agregartag?tags=" + escape($("#tags").val()) + "&filtro=" + $("#ntag").val(), function(my_var) {
$("#tags").val(my_var);
$("#ntag").val("");
$("#mistags").load("api/muestratags?tags=" + escape($("#tags").val()), function(){
tagsdisponibles();
})
});
}
$(document).on("keyup","#ntag",function(){tagsdisponibles()});
$(document).on("click","#tagsdisponibles div", function(){
$("#ntag").val($(this).html());
agregartag();
})
$(document).on("click","#mistags div", function(){
$.get("api/eliminatag?tags=" + escape($("#tags").val()) + "&tag=" + $(this).data("tag"), function(my_var){
$("#tags").val(my_var);
$("#mistags").load("api/muestratags?tags=" + escape($("#tags").val()), function(){
tagsdisponibles();
})
})
})
});
function onKeyPressSoloMin(e){
var key = window.event ? e.keyCode : e.which;
var keychar = String.fromCharCode(key);
reg = /[a-z Ã¡Ã©Ã­Ã³ÃºÃ±\x08]/;
return reg.test(keychar);
}
</script>
@endsection
