<?php
$directorio = 'uploads/blog';

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<html lang="es">
	<title>Administración</title>
	<base href="{{asset('/') }}" />
	<link href="css/estilosADM.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-1.7.1.min.js"></script>
	<style>
	#g_fotos{display:-webkit-box;display:-ms-flexbox;display:flex; -webkit-box-pack:center; -ms-flex-wrap:wrap; flex-wrap:wrap;}
	#g_fotos div{width:25%; text-align:center; margin-top:6px;}
	#g_fotos div img{max-width:90%; padding:3%; border:1px solid #CCC; cursor:pointer; background:#eee}

	#fondo{background:#000; position:fixed; width:100%; height:100%; z-index:1000; display:none; }
	#fondo2{position:fixed; z-index:1001; width:100%; height:100%; display:none; top:0px; text-align:center; overflow:auto;}
	#fondo2 img{padding:10px; border:1px solid #CCC; cursor:pointer; background:#eee}
	.oh{overflow:hidden;}
	#fondo2 div{padding:10px 0;}
</style>

<link href="css/slim.min.css" rel="stylesheet">
<script src="js/slim.jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   $('.slim').slim({
    label: 'Arrastra tu imagen ó haz click aquí',
    ratio: 'free',
    minSize: {
      width: 100,
      height: 100
    },
    size: {
      width: 720,
      height: 1024
    },
    download: true,
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
    buttonUploadTitle: "Guardar"
  });
 })
</script>

</head>
<body>
	<div id="fondo"></div>
	<div id="fondo2">
		<div><a href="javascript:copyToClipboard()" class="botones">Copiar al porta papeles</a>&nbsp;&nbsp;<a href="javascript:cerrar();" class="botones">Cerrar</a></div>
		<img src="imagenes/nada.gif">
	</div>
	<section id="titulo">
		<h1>{{ config('app.name') }}</h1>
		<div class="alinear_de"><a href="javascript:window.close();" style="background-image:url(imagesADM/i_eliminar.png)">Cerrar</a></div>
	</section>
	<form role="form" action="{{ route('cargafotos_nueva') }}" method="POST">
	  {{ csrf_field() }}
	  <div style="margin:20px auto; width: 720px;">
	    <p><label><b>Cargar nueva imagen</b></label></p>
	    <div class="slim">
	      <input name="archivo" type="file" accept="image/jpeg, image/png, image/gif" />
	    </div>
	    <p><label><span>Mínimo 100 píxeles x 100 píxeles | JPG o PNG</span></label></p>
	    <p><button class="botones">Cargar</button></p>
	  </div>
	</form>
	<div id="g_fotos"></div>
	<div id="guia"></div>
	<p>&nbsp;</p>
	<footer>
		<div class="alinear_iz">TODOS LOS DERECHOS RESERVADOS - CACAO DIGITAL, C.A. - J-29656593-7</div>
		<div class="alinear_de">PARA SOPORTE TÉCNICO: <a href="mailto:info@cacaodigital.com">INFO@CACAODIGITAL.COM</a></div>
	</footer>
	<script type="text/javascript">
		var foto="";
		var mfotos=[<?php
			$gestor_dir = opendir($directorio);
			while (false !== ($nombre_fichero = readdir($gestor_dir))) {
				$ficheros[] = $nombre_fichero;
			} 

			$ficheros = array_diff($ficheros, array('..', '.'));
			rsort($ficheros);
			$u="";
			foreach ($ficheros as $valor){
				echo $u . "'" . $valor . "'";
				$u=",";
			}
			?>];
			var tot=<?php echo count($ficheros); ?>, paginas=<?php echo ceil(count($ficheros)/16);?>, cargando="No", paginaactual=0;
			$(window).load(function(e){
				$("#g_fotos img").live("click",function(){
					$("body").addClass("oh");
					foto=$(this).attr("src");
					$("#fondo2").find("img").attr("src",foto);
					$("#fondo").fadeTo(200, 0.7,function(){
						$("#fondo2").css("display","inline");
					});
				});
			});
			function copyToClipboard() {
				var $temp = $("<input>");
				$("body").append($temp);
				$temp.val("{{asset('/') }}" + foto).select();
				document.execCommand("copy");
				$temp.remove();
				alert("Referencia copiada al porta papeles");
				window.close();
			}
			function cerrar(){
				$("body").removeClass("oh");
				$("#fondo2").css("display","none");
				$("#fondo").fadeTo(200, 0, function(){
					$("#fondo").css("display","none");
				});
			}
			$(window).scroll(function(e){
				scrolled = $(window).scrollTop();
				x=$("#guia").offset().top - $(window).height();
				if(scrolled>x){
					cargar();
				}
			});
			function cargar(){
				if(cargando=="No" && paginaactual<paginas){
					cargando="Si";
					paginaactual++;
					hasta=paginaactual*16;
					if(hasta>tot) hasta=tot;
					for(l=((paginaactual-1)*16); l<hasta; l++){
						$("#g_fotos").append('<div><img src="<?php echo $directorio . "/";?>' + mfotos[l] + '"></div>');
					}
					cargando="No";
				}
			}
			cargar();
			function opw(diru,cam,extra){
				durl='upload/upload_galeria.php?diru=' + diru + '&cam=' + cam + '&cam=' + cam + '&extra=' + extra;
				opn=window.open(durl,null,'height=200,width=470,status=no,toolbar=no,menubar=no,location=no','true');
				opn.focus();
			}
			function f_fotocargada(){
				window.location.reload();
			}
		</script>
		<form name="formulario" style="display:none"><input name="fotocargada" id="fotocargada"></form>
	</body>
	</html>
