@extends('layouts.admin')

@section('css')
    <link href="css/slim.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="row">
     <div class="col-lg-6">
        <h1 class="page-header">Categorías</h1>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('administracion_home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route("admin.categorias.index") }}"><i class="fa fa-fw fa-pencil"></i> Categorías</a></li>
            <li>Crear</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <p class="text-right"><a href="{{ route('admin.categorias.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-list"></i> Ver lista</a></p>
    </div>
</div>

<form role="form" action="{{ route('admin.categorias.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group{{ $errors->has('categoria_es') ? ' has-error' : '' }}">
                <label>Categoria español</label>
                <input type="text" class="form-control" name="categoria_es" value="{{ old('categoria_es') }}" maxlength="45" required autofocus>
                @if ($errors->has('categoria_es'))
                    <p class="help-block">{{ $errors->first('categoria_es') }}</p>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group{{ $errors->has('categoria_en') ? ' has-error' : '' }}">
                <label>Categoria inglés</label>
                <input type="text" class="form-control" name="categoria_en" value="{{ old('categoria_en') }}" maxlength="45" required>
                @if ($errors->has('categoria_en'))
                    <p class="help-block">{{ $errors->first('categoria_en') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row"><div class="col-lg-6"><button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Guardar</button>  <a href="{{ route('admin.categorias.index') }}" class="btn btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a></div>
</form>

@endsection

@section('javascript')
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  if ( typeof CKEDITOR == 'undefined' ){}
    else{
      var editor;
      editor = CKEDITOR.replace('respuesta');
    }
</script>
@endsection
