<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Proyecto gruas Mancera</title>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>


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
	</ul>

	<ul id="recibos" class="dropdown-content">
		<li id="recibo_efectivo"  style="color:#5CC6D0 !important;" >
		<a href="recibo_efectivo.php">Recibo efectivo</a>
		</li>
		<li id="recibo_vehiculo">
		<a href="recibo_vehiculo.php" >Recibo vehiculo</a>
		</li>
		<li id="memoria">
		<a href="memoria.php" >Memoria gráfica</a>
		</li>
	</ul>

	<ul id="costos" class="dropdown-content">
		<li id="bitacoras"  style="color:#5CC6D0 !important;" >
		<a href="bitacoras.php">Bitacoras</a>
		</li>
		<li id="deposito">
		<a href="deposito.php" >Deposito</a>
		</li>
		<li id="cporte">
		<a href="cporte.php" >Carta porte</a>
		</li>
		<li id="salvamentoArrastre">
		<a href="salvamentoArrastre.php" >Salvamento</a>
		</li>
		<li id="importes">
		<a href="#" >Importes</a>
		</li>
	</ul>

	<ul id="resenas" class="dropdown-content">
		<li id="memoria_descriptiva"  style="color:#5CC6D0 !important;" >
		<a href="memoria_descriptiva.php">Memoria descriptiva</a>
		</li>
		<li id="resena_grafica">
		<a href="resena_grafica.php" >Reseña gráfica</a>
		</li>
	</ul>

	<ul id="usuarios" class="dropdown-content">
		<li id="usuarios"  style="color:#5CC6D0 !important;" >
		<a href="usuarios.php">Usuarios</a>
		</li>
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

	<ul id="recibosMovil" class="dropdown-content">
		<li id="recibo_efectivo" >
		<a href="recibo_efectivo.php">Recibo efectivo</a>
		</li>
		<li id="recibo_vehiculo">
		<a href="recibo_vehiculo.php" >Recibo vehiculo</a>
		</li>
		<li id="memoria">
		<a href="memoria.php" >Memoria gráfica</a>
		</li>
	</ul>

	<ul id="costosMovil" class="dropdown-content">
		<li id="bitacoras"  style="color:#5CC6D0 !important;" >
		<a href="bitacoras.php">Bitacoras</a>
		</li>
		<li id="deposito">
		<a href="deposito.php" >Deposito</a>
		</li>
		<li id="cporte">
		<a href="cporte.php" >Carta porte</a>
		</li>
		<li id="salvamentoArrastre">
		<a href="salvamentoArrastre.php" >Salvamento</a>
		</li>
		<li id="importes">
		<a href="#" >Importes</a>
		</li>
	</ul>

	<ul id="resenasMovil" class="dropdown-content">
		<li id="memoria_descriptiva"  style="color:#5CC6D0 !important;" >
		<a href="memoria_descriptiva.php">Memoria descriptiva</a>
		</li>
		<li id="resena_grafica">
		<a href="resena_grafica.php" >Reseña gráfica</a>
		</li>
	</ul>

	<ul id="usuariosMovil" class="dropdown-content">
		<li id="usuarios"  style="color:#5CC6D0 !important;" >
		<a href="usuarios.php">Usuarios</a>
		</li>
	</ul>

	<nav class="header">
	    <div class="nav-wrapper">
	      <a href="#" class="brand-logo right">Grúas Mancera</a>

	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

		    <ul class="left hide-on-med-and-down">

				<li class = "menu_0opacity" id ="li_catalogos">
				<a class="dropdown-button" href="#!" data-activates="catalogos">Catálogos<i class="material-icons right">arrow_drop_down</i></a></li>
				<li class = "menu_0opacity" id ="li_recibos">
				<a class="dropdown-button" href="#!" data-activates="recibos">Recibos<i class="material-icons right">arrow_drop_down</i></a></li>
				<li class = "menu_0opacity" id ="li_costos">
				<a class="dropdown-button" href="#!" data-activates="costos">Costos<i class="material-icons right">arrow_drop_down</i></a></li>
				<li class = "menu_0opacity" id ="li_resenas">
				<a class="dropdown-button" href="#!" data-activates="resenas">Reseñas<i class="material-icons right">arrow_drop_down</i></a></li>
				<li class = "menu_0opacity" id ="li_usuarios">
				<a class="dropdown-button" href="#!" data-activates="usuarios">Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>
				<li class="menu_0opacity" id="li_cerrar_sesion">
					<a href="login/cerrar.php">Cerrar sesión</a>
				</li>
		    </ul>

		    <!-- Menú para móviles -->
		    <ul class="side-nav" id="mobile-demo">

				<li id ="li_catalogosMovil">
				<a class="dropdown-button" href="#!" data-activates="catalogosMovil">Catálogos<i class="material-icons right">arrow_drop_down</i></a>
				</li>
				<li id ="li_recibosMovil">
				<a class="dropdown-button" href="#!" data-activates="recibosMovil">Recibos<i class="material-icons right">arrow_drop_down</i></a>
				</li>

				<li id ="li_costosMovil">
				<a class="dropdown-button" href="#!" data-activates="costosMovil">Costos<i class="material-icons right">arrow_drop_down</i></a>
				</li>

				<li id ="li_resenasMovil">
				<a class="dropdown-button" href="#!" data-activates="resenasMovil">Reseñas<i class="material-icons right">arrow_drop_down</i></a>
				</li>

				<li id ="li_usuariosMovil">
				<a class="dropdown-button" href="#!" data-activates="usuariosMovil">Usuarios<i class="material-icons right">arrow_drop_down</i></a>
				</li>

				<li class="menu_0opacity" id="li_cerrar_sesion">
					<a href="Login/cerrar.php">Cerrar sesión</a>
				</li>

		    </ul>
	    </div>
    </nav>


    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="inc/header.js"></script>
    <script src="js/funciones_generales.js"></script>

    <script type="text/javascript">
        $( document ).ready(function()
        {
        	$(".button-collapse").sideNav();
        })
    </script>
</div>
