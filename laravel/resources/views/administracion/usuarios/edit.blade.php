@extends('layouts.admin')

@section('css')
<link href="css/slim.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="row">
     <div class="col-lg-6">
        <h1 class="page-header">Usuarios</h1>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('administracion_home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route("usuarios.index") }}"><i class="fa fa-fw fa-user"></i> Usuarios</a></li>
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
        <p class="text-right"><a href="{{ route('usuarios.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a></p>
    </div>
</div>
<form role="form" action="{{ route('usuarios.update', codifica($usuario->id)) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" maxlength="60" required autofocus>
                @if ($errors->has('nombre'))
                    <p class="help-block">{{ $errors->first('nombre') }}</p>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $usuario->email) }}" maxlength="200" required readonly>
                @if ($errors->has('email'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label>Avatar</label>
                <div class="slim">
                    <input name="avatar" type="file" accept="image/jpeg, image/png, image/gif" />
                    @if($usuario->avatar <> '')<img src="uploads/avatars/{{ $usuario->avatar }}" style="max-width: 100%">@endif
                </div>
            </div>
        </div>
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Firma del Blog</label>
                <textarea name="firma" rows="5" class="form-control">{{ old('firma', $usuario->firma) }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Guardar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a>
            <a href="{{ route('usuarios_eliminar', codifica($usuario->id) ) }}" class="btn btn-danger"><i class="fa fa-fw fa-ban"></i> Eliminar</a>
        </div>
    </div>
</form>
@endsection

@section('javascript')
<script src="js/slim.jquery.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").slideUp(500);
        }, 10000);
    });

     $('.slim').slim({
        label: 'Arrastra tu imagen Ã³ haz click aquÃ­',
        ratio: '1:1',
        size: {
            width: 240,
            height: 240
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

    if ( typeof CKEDITOR == 'undefined' ) {

    }
    else {
      var editor;
      editor = CKEDITOR.replace('firma');
    }
</script>
@endsection