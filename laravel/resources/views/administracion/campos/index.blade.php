@extends('layouts.admin')

@section('content')

<div class="row">
     <div class="col-lg-6">
        <h1 class="page-header">Campos</h1>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('administracion_home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-fw fa-pencil"></i> Campos</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
    @if($notificacion_error=Session::get('notificacion_error'))
        <div class="alert alert-danger">{{ $notificacion_error }}</div>
    @endif
    </div>
    <div class="col-lg-4">
        <p class="text-right">
            <a href="{{ route('admin.pagina.edit',[codifica($_SESSION["pagina_id"])]) }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-file-text-o"></i> Volver a la página</a> 
            <a href="{{ route('admin.campos.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Nuevo</a>
    </p>
    </div>
</div>

<div class="row">
    <div class="col-lg-12"><!-- class tr active success warning danger -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th width="80"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($campos as $campo)
                    <tr>
                        <td><a href="{{ route('admin.campos.edit', codifica($campo->id) ) }}" title="Editar">{{ $campo->titulo }}</a></td>
                        <td>
                            <a href="{{ route('admin.campos.edit', codifica($campo->id) ) }}" title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                            <a href="{{ route('campos_eliminar', codifica($campo->id) ) }}" title="Eliminar"><i class="fa fa-fw fa-ban bloquear"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        {{$campos->render()}}
    </div>
</div>

@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $(".bloquear").click(function(event){
        event.preventDefault();
        if(confirm("¿Está seguro de eliminar este registro?")){
            document.location=$(this).parent().attr("href");
        }
    })
    setTimeout(function(){
        $(".alert").slideUp(500);
    },10000)
})
</script>
@endsection
