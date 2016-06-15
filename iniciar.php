<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Iniciar sesión</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/materialize.min.css">

</head>
<body class="color1">
	<header align="center" class="texto tamtex1">
	Gruas Mancera
	</header> <hr>

	<div class="container login1" align="center">
		<div class="row">
		<div class="col-xs-12">
	<form id="formulario" >
		<?php
		if(isset($_GET['error'])){
			echo '<center class="errorlogin">Tus datos son incorrectos</center>';
		}
		?>

		<label for="usuario" class="tamtex3">Usuario</label><br>
		<div class="input-group">
  				<input type="text" id="user" class="form-control" name="Usuario" placeholder="Usuario" aria-describedby="basic-addon1">		  </div><br>

		<label for="password" class=" tamtex3">Password</label><br>
		<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"></span>
  				<input type="password" id="pass" class="form-control" id="password" name="Password" placeholder="Password" aria-describedby="basic-addon1">
  				 </div><br>
		<a href="#" name="aceptar" class="btn blue waves-effect" onclick="iniciar_sesion()">Iniciar sesión</a
	</form>
		</div>
		</div>
		</div>


	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/funciones_generales.js"></script>

	<script type="text/javascript">
		$('document').ready(function (e) {
			// body...
			Materialize.toast("Listo", 3000);
		});

		function iniciar_sesion()
		{
			var user = document.getElementById('user').value;
			var pass = document.getElementById('pass').value;

			//Materialize.toast("Click user: " + user + " pass: " + pass, 7000);

			$datos = { "user" : user, "pass" : pass, "met" : "iniciar_sesion" }

			$.ajax({
		       type: "POST",
		       data: $datos,
		       url: "login/verificar.php",//URL dela funcion a ejecutar en table/clientes.php
		       success: function (data){
		       		if(data === "1")
		       		{
			       		Materialize.toast("Respuesta de iniciar_sesion: " + data, 3000);
			       		// Guardar cookie con el nombre ( primer parametro ) y su valor ( segundo parametro )
			       		guardarCookie('nivel', data);
			       		window.location.assign("index1.php");
		       		}
		       		if(data === "2")
		       		{
		       			Materialize.toast("TRABAJADOR Nivel " data, 3000);
		       			guardarCookie('nivel', data);
		       		}
		       },
		       error: function (request, status, error) {
		            console.log("\n\n*** Error AJAX ***\n\n" + error);
		            //alert(xhr.status);
		            //alert(thrownError);
		        }
	   		});
		}
	</script>

</body>
</html>