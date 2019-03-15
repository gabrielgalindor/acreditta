@extends('layouts.admin')

@section('content')

<div class="row">
     <div class="col-lg-6">
        <h1 class="page-header">Categorías</h1>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('administracion_home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route("admin.categorias.index") }}"><i class="fa fa-fw fa-pencil"></i> Categorías</a></li>
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
        <p class="text-right"><a href="{{ route('admin.categorias.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a></p>
    </div>
</div>
<form role="form" action="{{ route('admin.categorias.update', codifica($categoria->id)) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group{{ $errors->has('categoria_es') ? ' has-error' : '' }}">
                <label>Categoria español</label>
                <input type="text" class="form-control" name="categoria_es" value="{{ old('categoria_es', $categoria->categoria_es) }}" maxlength="45" required autofocus>
                @if ($errors->has('categoria_es'))
                    <p class="help-block">{{ $errors->first('categoria_es') }}</p>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group{{ $errors->has('categoria_en') ? ' has-error' : '' }}">
                <label>Categoria inglés</label>
                <input type="text" class="form-control" name="categoria_en" value="{{ old('categoria_en', $categoria->categoria_en) }}" maxlength="45" required>
                @if ($errors->has('categoria_en'))
                    <p class="help-block">{{ $errors->first('categoria_en') }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Guardar</button>  
            <a href="{{ route('admin.categorias.index') }}" class="btn btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a> 
            <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Nuevo</a> 
            <a href="{{ route('faq_eliminar', codifica($categoria->id) ) }}" class="btn btn-danger"><i class="fa fa-fw fa-ban"></i> Eliminar</a>
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
      var editor;
      editor = CKEDITOR.replace('respuesta');
    }
</script>
@endsection
