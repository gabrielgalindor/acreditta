@extends('layouts.admin')

@section('content')

<div class="row">
     <div class="col-lg-6">
        <h1 class="page-header">Campos</h1>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('administracion_home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route('admin.campos.index') }}"><i class="fa fa-fw fa-pencil"></i> Campos</a></li>
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
        <p class="text-right"><a href="{{ route('admin.campos.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a></p>
    </div>
</div>
<form role="form" action="{{ route('admin.campos.update', codifica($campo->id)) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                <label>Título</label>
                <input type="text" class="form-control" name="titulo" value="{{ old('titulo', $campo->titulo) }}" maxlength="20" required autofocus>
                @if ($errors->has('titulo'))
                    <p class="help-block">{{ $errors->first('titulo') }}</p>
                @endif
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label>Tipo</label>
                <select name="tipo" class="form-control">
                    <option value="texto"@if(old('tipo', $campo->tipo)=='texto') selected @endif>texto</option>
                    <option value="parrafo"@if(old('tipo', $campo->tipo)=='parrafo') selected @endif>parrafo</option>
                    <option value="foto"@if(old('tipo', $campo->tipo)=='foto') selected @endif>foto</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Contenido</label>
                <input type="text" class="form-control" name="contenido" value="{{ old('contenido', $campo->contenido) }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Guardar</button>  
            <a href="{{ route('admin.campos.index') }}" class="btn btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a> 
            <a href="{{ route('admin.pagina.edit',[codifica($_SESSION["pagina_id"])]) }}" class="btn btn-primary"><i class="fa fa-fw fa-file-text-o"></i> Volver a la página</a> 
            <a href="{{ route('admin.campos.create') }}" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Nuevo</a> 
            <a href="{{ route('campos_eliminar', codifica($campo->id) ) }}" class="btn btn-danger"><i class="fa fa-fw fa-ban"></i> Eliminar</a>
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
@endsection
