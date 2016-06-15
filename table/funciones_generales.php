<?php
	include('numero_a_letra.php');

	$caso = $_GET['caso'];
	$url_aSubir = "../img/subidas/";

	switch ($caso) {
		case 'convert_toUppercase':
			# code...
			$cadena = $_GET["cadena"];
        	$mayuscula = getMayuscula($cadena);
        	echo $mayuscula;

			break;

		case 'upload_image':

	      $dir_subida = $url_aSubir ."logos/";
	      $nombre_campo = $_POST["nombre_campo"];
	      $fichero_subido = $dir_subida . basename($_FILES[$nombre_campo]["name"]);

	      if( move_uploaded_file($_FILES[$nombre_campo]["tmp_name"], $fichero_subido) )
	      {
	           echo "El fichero es válido y se subió con éxito.\n";
	      }
	      else {
	          echo "¡Posible ataque de subida de ficheros!\n";
	          echo "nombre_campo:  " .$nombre_campo;
	      }

	    break;

	    case "convert_number_to_letter":
        # code...
	        $num = $_GET["numero"];
	        echo numtoletras($num);

        break;

		default:
			# code...
			break;
	}

	function getMayuscula($cadena)
	{
		$mayuscula = strtoupper($cadena);

		return $mayuscula;
	}

?>