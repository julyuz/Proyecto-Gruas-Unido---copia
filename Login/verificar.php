<?php

	$caso = $_POST["met"];

	switch ($caso) {
		case 'iniciar_sesion':
			# code...
			session_start();
			include "../table/conexion.php";
			$usu=addslashes($_POST['user']);
			$contra= addslashes($_POST['pass']);
			$pass= md5 ($contra);

			$re = $conn -> query("SELECT * FROM usuarios WHERE Usuario='".$usu."' AND
		 					Password='".$pass."'")	or die(mysql_error());
			while ($rs = $re->fetch_array(MYSQLI_ASSOC)) {
				$arreglo[]=array(
							'Nombre'=>$rs['nombre'],
							'Usuario'=>$rs['Usuario']
					);

					$user = $rs['Usuario'];
					$nivel=$rs['nivel'];

			}
			if(isset($arreglo)){
				$_SESSION['Usuario']=$user;
				$_SESSION['Nivel']=$nivel;

				echo $nivel;

				/*if( $nivel == 1 ) //Admin
				{
					//header("Location: ../index1.php");
				}
				else // Trabajador
					//header("Location: ../index2.php");
				//echo "CORRECTO";
				*/
			}else{
				echo "Datos invalidos";
				header("Location: ../iniciar.php?error=datos no validos");
			}

			break;

		default:
			# code...
			break;
	} // fin switch

?>