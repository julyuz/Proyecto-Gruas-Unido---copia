<?php
/*session_start();
	include "../conexion.php";
	if(isset($_SESSION['Usuario']) and $_SESSION['Nivel']=='1'){

	}else{
		header("Location: ../index.php?Error=Acceso denegado");
	}*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js";> </script>
	<script type="text/javascript" src="eliminarusuarios.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="../js/scripts.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/main.css">
		<script src="../js/vendor/modernizr-2.6.2.min.js"></script>
		 <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.js"></script>
        <script src="../js/main.js"></script>
</head>
<body class="color1">

	<nav class="navbar  navbar-default color4">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle " data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Cambiar Navegacion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Gruas Mancera</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Vehiculos</a></li>
				<li><a href="../admin.php" class="selected">Ultimas Entregas</a></li>
				<li><a href="../admin/agregarregistro.php" >Nuevo Regristro</a></li>
				<li><a href="../vistas/modifica.php" >Modificar</a></li>
				<li><a href="../login/usuarios.php">Usuarios</a></li>
				<li><a href="../vistas/busoperador.php">Operadores</a></li>
				<li><a href="../login/cerrar.php">Salir</a></li>
	</nav>


	<section>
	<div class="container">

	<center><h1>Gestion De Usuarios</h1></center><br>
	<div class="table-responsive">

	<form method="POST" action="altausuario.php">
		<table>
			<tr>
			<td><input type="text" name="nombre" class="form-control" placeholder="Nombre"></th>
			<td><input type="text" name="usu" class="form-control" placeholder="Usuario"></th>
			<td><input type="password" name="pass" class="form-control" placeholder="Password"></th>
			<td><select name="nivel" class="form-control">
			<option value="1"> Administrador </option>
			<option value="2"> Trabajador </option>
			</th>
			<td><input type="submit" name="boton" class=".eliminar btn btn-success" value="Crear"></th>
			</tr>
		</table>
	</form><hr>


	<table class="table-hover table-condensed table-striped" border="0px" width="100%">
		<tr>
			<th width="50">Id</th>
			<th width="50">Nombre</th>
			<th width="50">Usuario</th>
			<th width="50">Password</th>
			<th width="50">Nivel de usuario</th>
			<th width="50">Eliminar</th>
		</tr>

		<?php
			include('../table/conexion.php');

			//$result = $conn->query("Select * from clientes");
            //$clientes = array();
            //while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

			$re=$conn ->query("SELECT * FROM usuarios ORDER BY id ASC");
			while ($f = $re->fetch_array(MYSQLI_ASSOC)) {
				$autori=$f['nivel'];
					$rango="1";
					$nivel = ($autori<=$rango) ? 'Administrador' : 'Trabajador';
					echo '<tr>
						<td>'.$f['Id'].'</td>
						<td>'.$f['nombre'].'</td>
						<td>'.$f['Usuario'].'</td>
						<td>'.$f['Password'].'</td>
						<td>'.$nivel.'</td>
						<td><button class="eliminar btn btn-danger" >Eliminar</button></td>
					</tr>';
			}

			if (isset($_POST['boton']))
 			{
 				require("altausuario.php");
 			}

		?>
	</table>
	</div>
	</div>
	</section>
</body>
</html>