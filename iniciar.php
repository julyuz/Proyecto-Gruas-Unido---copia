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
	<h2 style="color: #5CC6D0;">Gruas Mancera</h2>
	</header> <hr>

	<!--<div class="container login1" align="center">
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
	-->

	<div class="row">
		<div class="col m3 l3 " style="color: transparent;">AAA</div>
		<div class="col s12 m6 l6" id="inicio_sesion">
          <div class="card  blue-grey darken-1">
          	<div class="card-image">
          		<div class="row">
          			<div class="col s4" style="color: transparent;">A</div>
          			<div class="col s4">
		              <img src="Login/gym/imj/user.png">
		              <span class="card-title">Iniciar Sesión</span>
          			</div>
          		</div>
            </div>
            <div class="card-content">
                <div class="row">
                  <h2 class="title">Ingrese sus datos</h2>
                  <form class="col s12">
                  	<?php
						if(isset($_GET['error'])){
							echo '<center class="errorlogin">Tus datos son incorrectos</center>';
						}
					?>

                     <div class="row">
                      <div class="input-field col s12">
                         <input type="text" id="user" class="form-control white-text" name="Usuario" placeholder="Usuario">
                        <label for="first_name">Usuario</label>
                      </div>
                    </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input type="password" id="pass" class="form-control white-text" id="password" name="Password" placeholder="Password">

                        <label for="first_name">Password</label>
                      </div>
                    </div>

                     <a style="background-color: #5CC6D0 !important;"
                     	class="waves-effect waves-light btn blue" onclick="iniciar_sesion()">iniciar sesión</a>
                  </form>

                </div>
            </div>
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
			Materialize.toast("Listo", 1000);
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
		       url: "login/verificar.php",//
		       success: function (data){
		       		var valor_cookie = data;
		       		if(valor_cookie === "1")
		       		{
			       		//Materialize.toast("Respuesta de iniciar_sesion: " + data, 3000);
			       		// Guardar cookie con el nombre ( primer parametro ) y su valor ( segundo parametro )
			       		guardarCookie("nivel", "1");
		       		}
		       		if(valor_cookie === "2")
		       		{
		       			//Materialize.toast("TRABAJADOR Nivel " + data, 3000);
		       			guardarCookie("nivel", "2");
		       		}
		       		//Materialize.toast("Data: " + data, 4500);
			       		window.location.assign("index.php");
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