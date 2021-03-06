<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Recibos gruas Mancera</title>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    <script src="js/materialize.min.js"></script>

</head>
<body>

<div class="header navbar-fixed">
	<ul id="catalogos" class="dropdown-content">
		<li id="cliente"  style="color:#5CC6D0 !important;" >
		<a href="clientes.php">Clientes</a>
		</li>
		<li id="vehiculos">
		<a href="vehiculos.php" >Vehículos</a>
		</li>
		<li id="remolques">
		<a href="remolques.php" >Remolques</a>
		</li>
		<li id="gruas">
		<a href="gruas.php" >Grúas</a>
		</li>
		<li id="operadores">
		<a href="operadores.php" >Operadores</a>
		</li>
		<li id="autoridades">
		<a href="autoridades.php" >Autoridades</a>
		</li>

		if( isset($_POST["nivel"]) )
		{
			if(nivel == 2)
				$("#eliminar_operadores").hide();
		}


	</ul>




	<ul id="catalogosMovil" class="dropdown-content">
        <li  id="cliente">
			<a href="clientes.php">Clientes</a>
		</li>
		<li  id="vehiculos">
			<a href="vehiculos.php">Vehículos</a>
		</li>
		<li  id="remolques">
			<a href="remolques.php">Remolques</a>
		</li>
		<li  id="gruas">
			<a href="gruas.php" >Grúas</a>
		</li>
		<li  id="operadores">
			<a href="operadores.php" >Operadores</a>
		</li>
		<li  id="autoridades">
			<a href="autoridades.php" >Autoridades</a>
		</li>
	</ul>


	<nav class="header">
	    <div class="nav-wrapper">
	      <a href="#" class="brand-logo right">Grúas Mancera</a>

	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	      <ul class="left hide-on-med-and-down">

			<li class = "menu_0opacity" id ="li_catalogos">
			<a class="dropdown-button" href="#!" data-activates="catalogos">Catálogos<i class="material-icons right">arrow_drop_down</i></a></li>


	      </ul>

	    <!-- Menú para móviles -->
	      <ul class="side-nav" id="mobile-demo">

			<li id ="li_catalogosMovil">
			<a class="dropdown-button" href="#!" data-activates="catalogosMovil">Catálogos<i class="material-icons right">arrow_drop_down</i></a>
			</li>

	      </ul>
	    </div>
    </nav>


	<script type="text/javascript">
        $( document ).ready(function()
        {
        	$(".button-collapse").sideNav();
        })
    </script>
</div>
