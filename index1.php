<?php include('inc/header.php');
include('table/conexion.php');
date_default_timezone_set('America/Mexico_City');
	session_start();
	if(isset($_SESSION['Usuario'])){

	}else{
		header("Location: iniciar.php?Error=Acceso denegado");
	}
?>


	<div class="row">
		<div class="col s6">
			<a href="#!" class="btn waves-effect purple">Fecha actual: <?php echo date('Y-m-d'); ?></a>
		</div>
		<div class="col s6">
			<label for="">Bienvenido: <?php echo $_SESSION['Usuario']; ?></label>
		</div>
		<div class="col s12">
			<label for="">Nivel: <?php echo $_SESSION['Nivel']; ?> </label>
		</div>
		<div class="col s12">
			<a href="login/cerrar.php" class="btn red waves-effect">Cerrar sesión</a>
		</div>
	</div>