@extends('layouts.admin')

@section('content')

<div class="row">
     <div class="col-lg-6">
        <h1 class="page-header">Faq</h1>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('administracion_home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route("admin.faq.index") }}"><i class="fa fa-fw fa-pencil"></i> Faq</a></li>
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
        <p class="text-right"><a href="{{ route('admin.faq.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a></p>
    </div>
</div>
<form role="form" action="{{ route('admin.faq.update', codifica($faq->id)) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group{{ $errors->has('pregunta') ? ' has-error' : '' }}">
                <label>Pregunta español</label>
                <input type="text" class="form-control" name="pregunta" value="{{ old('pregunta', $faq->pregunta) }}" maxlength="200" required autofocus>
                @if ($errors->has('pregunta'))
                    <p class="help-block">{{ $errors->first('pregunta') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Respuesta español</label>
                <textarea name="respuesta" rows="5" class="form-control" required>{{ old('respuesta', $faq->respuesta) }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group{{ $errors->has('pregunta') ? ' has-error' : '' }}">
                <label>Pregunta inglés</label>
                <input type="text" class="form-control" name="pregunta_en" value="{{ old('pregunta_en', $faq->pregunta_en) }}" maxlength="200" required autofocus>
                @if ($errors->has('pregunta_en'))
                    <p class="help-block">{{ $errors->first('pregunta_en') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Respuesta inglés</label>
                <textarea name="respuesta_en" rows="5" class="form-control" required>{{ old('respuesta_en', $faq->respuesta_en) }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Guardar</button>  
            <a href="{{ route('admin.faq.index') }}" class="btn btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a> 
            <a href="{{ route('admin.faq.create') }}" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Nuevo</a> 
            <a href="{{ route('faq_eliminar', codifica($faq->id) ) }}" class="btn btn-danger"><i class="fa fa-fw fa-ban"></i> Eliminar</a>
        </div>
    </div>
</form>


@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    setTimeout(function(){
        $(".alert").slideUp(500);
    },10000)
})
</script>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  if ( typeof CKEDITOR == 'undefined' ){}
    else{
      var editor, editor_en;
      editor = CKEDITOR.replace('respuesta');
      editor_en = CKEDITOR.replace('respuesta_en');
    }
</script>
@endsection
