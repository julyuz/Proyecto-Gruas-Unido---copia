<?php

	$nom=($_POST['nombre']);
	$usu=($_POST['usu']);
	$password=($_POST['pass']);
	$nivel=($_POST['nivel']);

	$pass= md5($password);

	$prueba= strlen ($nom) * strlen ($usu) * strlen ($password) * strlen ($nivel);

 	if ($prueba > 0)
 	{
 	require("../table/conexion.php");
	$conn ->query("INSERT INTO usuarios (nombre,Usuario,Password,nivel)
		VALUES ('$nom','$usu','$pass','$nivel')");
	echo "\nregistro exitoso\n";
	echo "nombre->".$nom." usua->".$usu." contra->".$pass." nivel->".$nivel;
	header("Location: ../login/usuarios.php");
	}
	else{
	echo "Llene por favor todos los campos";
	}


?>