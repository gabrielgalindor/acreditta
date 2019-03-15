<h1>Ha recibido un nueva solicitud de DEMO por la página web</h1>
<table>
    <tr>
        <td><b>Nombre</b></td>
        <td>@if(isset($nombre)) {{ $nombre }} @else N/A @endif</td>
    </tr>
    <tr>
        <td><b>Apellido</b></td>
        <td>@if(isset($apellido)) {{ $apellido }} @else N/A @endif</td>
    </tr>
    <tr>
        <td><b>Email</b></td>
        <td>@if(isset($email)) {{ $email }} @else N/A @endif</td>
    </tr>
    <tr>
        <td><b>Organización</b></td>
        <td>@if(isset($organizacion)) {{ $organizacion }} @else N/A @endif</td>
    </tr>
    <tr>
        <td><b>País</b></td>
        <td>@if(isset($pais)) {{ $pais }} @else N/A @endif</td>
    </tr>
    <tr>
        <td><b>Ciudad</b></td>
        <td>@if(isset($ciudad)) {{ $ciudad }} @else N/A @endif</td>
    </tr>
    <tr>
        <td><b>Cargo</b></td>
        <td>@if(isset($cargo)) {{ $cargo }} @else N/A @endif</td>
    </tr>
    <tr>
        <td><b>Fecha Live Demo</b></td>
        @php
            $fechaLiveDemo = explode('_', $fecha_live_demo);
        @endphp
        <td>@if(isset($fechaLiveDemo)) {{ $fechaLiveDemo[1] }} @else N/A @endif</td>
    </tr>
    <tr>
        <td><b>¿Cuándo quisieras comenzar la implementación de tu estrategia de insignias digitales?</b></td>
        <td>@if(isset($cuando)) {{ $cuando }} @else N/A @endif</td>
    </tr>
    <tr>
        <td><b>¿Cómo te enteraste de nosotros?</b></td>
        <td>@if(isset($como)) {{ $como }} @else N/A @endif</td>
    </tr>
</table>