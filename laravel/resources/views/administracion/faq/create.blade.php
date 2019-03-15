@extends('layouts.admin')

@section('css')
    <link href="css/slim.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="row">
     <div class="col-lg-6">
        <h1 class="page-header">Faq</h1>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('administracion_home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route("admin.faq.index") }}"><i class="fa fa-fw fa-pencil"></i> Faq</a></li>
            <li>Crear</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <p class="text-right"><a href="{{ route('admin.faq.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-list"></i> Ver lista</a></p>
    </div>
</div>

<form role="form" action="{{ route('admin.faq.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group{{ $errors->has('pregunta') ? ' has-error' : '' }}">
                <label>Pregunta español</label>
                <input type="text" class="form-control" name="pregunta" value="{{ old('pregunta') }}" maxlength="200" required autofocus>
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
                <textarea name="respuesta" rows="5" class="form-control" required>{{ old('respuesta') }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group{{ $errors->has('pregunta_en') ? ' has-error' : '' }}">
                <label>Pregunta inglés</label>
                <input type="text" class="form-control" name="pregunta_en" value="{{ old('pregunta_en') }}" maxlength="200">
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
                <textarea name="respuesta_en" rows="5" class="form-control">{{ old('respuesta_en') }}</textarea>
            </div>
        </div>
    </div>
    <div class="row"><div class="col-lg-6"><button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Guardar</button>  <a href="{{ route('admin.faq.index') }}" class="btn btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a></div>
</form>

@endsection

@section('javascript')
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
