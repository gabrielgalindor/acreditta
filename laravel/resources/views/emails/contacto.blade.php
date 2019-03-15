<h1>Ha recibido un nuevo contacto por la página web</h1>
<table>
	<tr>
		<td><b>Nombre</b></td>
		<td>{{ $nombre }}</td>
	</tr>
	<tr>
		<td><b>Apellido</b></td>
		<td>{{ $apellido }}</td>
	</tr>
	<tr>
		<td><b>Organizaión</b></td>
		<td>{{ $organizacion }}</td>
	</tr>
	<tr>
		<td><b>Cargo</b></td>
		<td>{{ $cargo }}</td>
	</tr>
	<tr>
		<td><b>Email</b></td>
		<td>{{ $email }}</td>
	</tr>
	<tr>
		<td><b>Ciudad / País</b></td>
		<td>{{ $ciudad }}</td>
	</tr>
	<tr>
		<td valign="top"><b>Comentario</b></td>
		<td>{!! nl2br($cuerpo) !!}</td>
	</tr>
</table>