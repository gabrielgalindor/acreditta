
	<!DOCTYPE html>
	<html lang="es-ES">
	<head>
		<meta charset="utf-8">
		<style type="text/css">
		#go788{
			background-color: red;
			color: #fff;
			text-align: center;
			
		}

		#loggo788{
			  display: block;
  			  margin-left: auto;
  			  margin-right: auto;
		}

		.titgo788{
			  background-color: #555557;
			  color:#fff;
		}

	</style>
	</head>
	<body>
		<h1 id="go788"> SOLICITUD DE CONTACTO </h1>

		<img id="loggo788" src="https://www.acreditta.com/logoAcreditta.png">


		<div> ESTE CORREO ES UNA RESPUESTA AUTOMÁTICA DE LA PÁGINA WEB DE ACREDITTA. POR FAVOR, NO LO RESPONDA POR ESTE MISMO MEDIO. </div>


		<h3 class="titgo788"> Nombre </h2>
		<h2> @if(isset($first_name)) {{ $first_name }} @else N/A @endif </h2>


		<h3 class="titgo788"> Apellido </h2>
		<h2> @if(isset($last_name)) {{ $last_name }} @else N/A @endif </h2>

		<h3 class="titgo788"> Compania </h2>
		<h2> @if(isset($company)) {{ $company }} @else N/A @endif </h2>

		<h3 class="titgo788"> Titulo	</h2>
		<h2> @if(isset($title)) {{ $title }} @else N/A @endif </h2>


		<h3 class="titgo788"> Correo </h2>
		<h2> @if(isset($email)) {{ $email }} @else N/A @endif </h2>


		<h3 class="titgo788"> Numero de celular </h2>
		<h2> @if(isset($phone)) {{ $phone }} @else N/A @endif </h2>
	
	</body>
	</html>
