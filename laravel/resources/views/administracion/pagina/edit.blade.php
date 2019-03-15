@extends('layouts.admin')

@section('css')
<link href="css/slim.min.css" rel="stylesheet">
<style>
    .col-logo {
        height: 270px;
    }

    .img-logo {
        max-width: 100%;
    }
</style>
@endsection

@section('content')
<div class="row">
     <div class="col-lg-6">
        <h1 class="page-header">Páginas - {{ $pagina->nombre }}</h1>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('administracion_home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route("admin.pagina.index") }}"><i class="fa fa-fw fa-pencil"></i> Páginas</a></li>
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
        <p class="text-right"><a href="{{ route('admin.pagina.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a></p>
    </div>
</div>
<form role="form" action="{{ route('admin.pagina.update', codifica($pagina->id)) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
         <div class="col-lg-12">
            <h3><i class="fa fa-fw fa-file-text"></i> Metadata en español</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                <label>Título</label>
                <input type="text" class="form-control" name="titulo" value="{{ old('titulo', $pagina->titulo) }}" maxlength="60" required autofocus>
                @if ($errors->has('titulo'))
                    <p class="help-block">{{ $errors->first('titulo') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                <label>Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion', $pagina->descripcion) }}" maxlength="250" required>
                @if ($errors->has('descripcion'))
                    <p class="help-block">{{ $errors->first('descripcion') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                <label>Tags</label>
                <input type="text" class="form-control" name="tags" value="{{ old('tags', $pagina->tags) }}" maxlength="100" required>
                @if ($errors->has('tags'))
                    <p class="help-block">{{ $errors->first('tags') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
         <div class="col-lg-12">
            <h3><i class="fa fa-fw fa-file-text"></i> Metadata en inglés</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group{{ $errors->has('titulo_en') ? ' has-error' : '' }}">
                <label>Título</label>
                <input type="text" class="form-control" name="titulo_en" value="{{ old('titulo_en', $pagina->titulo_en) }}" maxlength="60" required>
                @if ($errors->has('titulo_en'))
                    <p class="help-block">{{ $errors->first('titulo_en') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group{{ $errors->has('descripcion_en') ? ' has-error' : '' }}">
                <label>Descripción</label>
                <input type="text" class="form-control" name="descripcion_en" value="{{ old('descripcion_en', $pagina->descripcion_en) }}" maxlength="250" required>
                @if ($errors->has('descripcion_en'))
                    <p class="help-block">{{ $errors->first('descripcion_en') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group{{ $errors->has('tags_en') ? ' has-error' : '' }}">
                <label>Tags</label>
                <input type="text" class="form-control" name="tags_en" value="{{ old('tags_en', $pagina->tags_en) }}" maxlength="100" required>
                @if ($errors->has('tags_en'))
                    <p class="help-block">{{ $errors->first('tags_en') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
         <div class="col-lg-12">
            <h3><i class="fa fa-fw fa-file-text-o"></i> Datos en español</h3>
        </div>
    </div>
    @foreach($pagina->campos_adm as $campo)
        @if($campo->tipo === 'texto' || $campo->tipo === 'parrafo')
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>{{ $campo->titulo }}</label>
                        @if($campo->tipo === 'texto')
                        <input type="text" class="form-control" name="{{ $campo->id }}" value="{{ $campo->contenido }}">
                        @endif
                        @if($campo->tipo ==='parrafo')
                        <textarea class="form-control" name="{{ $campo->id }}" rows="10">{{ $campo->contenido }}</textarea>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <div class="row">
         <div class="col-lg-12">
            <h3><i class="fa fa-fw fa-file-text-o"></i> Datos en inglés</h3>
        </div>
    </div>
    @foreach($pagina->campos_adm as $campo)
        @if($campo->tipo === 'texto' || $campo->tipo === 'parrafo')
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>{{ $campo->titulo }}</label>
                        @if($campo->tipo === 'texto')
                           <input type="text" class="form-control" name="{{ $campo->id }}_en" value="{{ $campo->contenido_en }}">
                        @endif
                        @if($campo->tipo === 'parrafo')
                            <textarea class="form-control" name="{{ $campo->id }}_en" rows="10">{{ $campo->contenido_en }}</textarea>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <div class="row">
         <div class="col-lg-12">
            <h3><i class="fa fa-fw fa-file-text-o"></i> Otros</h3>
        </div>
    </div>
    @foreach($pagina->campos_adm as $campo)
        @if($campo->tipo === 'select')
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>{{ $campo->titulo }}</label>
                        <select class="form-control" name="{{ $campo->id }}">
                            @foreach(explode('|', $campo->valores) as $valor)
                                <option value="{{ $valor }}" @if($valor==$campo->contenido) selected="selected" @endif >{{ $valor }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="{{ $campo->id }}_en" value=".">
                    </div>
                </div>
            </div>
        @endif
        @if($campo->tipo === 'file_multiple')
            <div class="row div-logos">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>{{ $campo->titulo }}</label>
                    </div>
                </div>
                @if($campo->contenido <> '')
                    @php
                        $logos = explode('|', $campo->contenido);
                    @endphp
                    @foreach ($logos as $logo)
                        @php
                            $logoFixed = explode(',', $logo);
                        @endphp
                        <div class="col-lg-4 col-logo">
                            <div class="form-group">
                                <div class="slim">
                                    <input name="{{ $campo->id }}[]" value={{ $logoFixed[0] }} type="file" accept="image/jpeg, image/png, image/gif" />
                                    <img src="uploads/logos/{{ $logoFixed[0] }}" class="img-logo">
                                </div>
                                <br/>
                                <input type="text" class="form-control" value="{{ $logoFixed[1] }}" name="{{ $campo->id }}_link[]" placeholder="Enlace...">
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-logo">
                        <div class="form-group">
                            <div class="slim">
                                <input name="{{ $campo->id }}[]" type="file" accept="image/jpeg, image/png, image/gif" />
                            </div>
                            <br/>
                            <input type="text" class="form-control" name="{{ $campo->id }}_link[]" placeholder="Enlace...">
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-light btn-sm button-add-logo" onClick="addLogo({{ $campo->id }});"><i class="fa fa-image"></i> Agregar Logo</button>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <div class="row">
        <div class="col-lg-6">
            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Guardar</button>
            <a href="{{ route('admin.pagina.index') }}" class="btn btn-primary"><i class="fa fa-fw fa-list"></i> Volver a la lista</a>
            @if(Auth::user()->id === 1)
                <a href="{{ route('admin.campos.index') }}" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Campos</a>
            @endif
        </div>
    </div>
</form>
@endsection

@section('javascript')
<script src="js/slim.jquery.js"></script>
<script type="text/javascript">
    function initializeSlim() {
        $('.slim').slim({
            label: 'Arrastra tu imagen ó haz click aquí',
            ratio: 'free',
            //minSize: { width: 395, height: 222 },
            //size: { width: 395, height: 222 },
            download: true,
            saveInitialImage: true,
            labelLoading: 'Cargando imagen...',
            statusImageTooSmall: 'La imagen es muy pequeña. El tamaño mínimo es $0 píxeles.',
            statusUnknownResponse: 'Ha ocurrido un error inesperado.',
            statusUploadSuccess: 'Imagen guardada',
            statusFileType: 'El formato de imagen no es permitido. Solamente: $0.',
            statusFileSize: 'El tamaño máximo de imagen es 2MB.',
            buttonConfirmLabel: 'Aceptar',
            buttonConfirmTitle: 'Aceptar',
            buttonCancelLabel: 'Cancelar',
            buttonCancelLabel: "Cancelar",
            buttonCancelTitle: "Cancelar",
            buttonEditTitle: "Editar",
            buttonRemoveTitle: "Eliminar",
            buttonRotateTitle: "Rotar",
            buttonUploadTitle: "Guardar",
            multiple: true
        });
    }

    function addLogo(id) {
        var divLogos = document.getElementsByClassName("div-logos")[0];
        divLogos.insertAdjacentHTML('beforeend', `
            <div class="col-lg-4 col-logo">
                <div class="form-group">
                    <div class="slim">
                        <input name="`+id+`[]" type="file" accept="image/jpeg, image/png, image/gif" />
                    </div>
                    <br/>
                    <input type="text" class="form-control" name="`+id+`_link[]" placeholder="Enlace...">
                </div>
            </div>`);
        initializeSlim();
    }

    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").slideUp(500);
        }, 10000);

        initializeSlim();
    });
</script>
@endsection