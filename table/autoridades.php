<?php
include('conexion.php');

$metodo = $_GET['met'];

switch ($metodo) {

    case "show":///-----------------Mostrar Datos
        header("Access-Control-Allow-Origin: *");
            $result = $conn->query("Select * from autoridades");
            $autoridades= array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array(
                            $rs["id_autoridad"],
                            $rs["nombre"],
                            $rs["jefe"],
                            $rs["tel_jefe"],
                            $rs["puesto"],

                            $rs["contacto1"],
                            $rs["tel_contacto1"],
                            $rs["contacto2"],
                            $rs["tel_contacto2"],
                            $rs["contacto3"],

                            $rs["tel_contacto3"],
                            $rs["tel_dependencia"],
                            $rs["logo_dependencia"]
                            );
                array_push($autoridades,$data);
            }
            echo json_encode($autoridades);
            $conn->close();
        break;

    case "store":///-----------------Guardar Datos
        header("Access-Control-Allow-Origin: *"); // Duda
        $nombre        = $_POST["nombre"];
        $jefe     = $_POST["jefe"];
        $tel_jefe     = $_POST["tel_jefe"];
        $puesto     = $_POST["puesto"];

        $contacto1   = $_POST["contacto1"];
        $telcontacto1     = $_POST["telcontacto1"];
        $contacto2   = $_POST["contacto2"];
        $telcontacto2     = $_POST["telcontacto2"];
        $contacto3   = $_POST["contacto3"];
        $telcontacto3     = $_POST["telcontacto3"];

        $teldependencia = $_POST["teldependencia"];
        $logodependencia= $_POST["logodependencia"];

        $conn->query("insert into autoridades (nombre,jefe,tel_jefe,puesto,contacto1,tel_contacto1,
          contacto2,tel_contacto2,contacto3,tel_contacto3,tel_dependencia,logo_dependencia)
          values ('$nombre','$jefe','$tel_jefe','$puesto','$contacto1','$telcontacto1',
          '$contacto2','$telcontacto2','$contacto3','$telcontacto3','$teldependencia','$logodependencia')");

          // Checar si se ejecuto correctamente la sentencia, si es mayor a 0, se ejecuto correctamente
                  if( $conn -> affected_rows > 0 )
                     echo true;
                   else
                     echo false;
        $conn->close();
        break;

    case "update":///-----------------Actualizar Datos
        header("Access-Control-Allow-Origin: *");
             $co = $_POST["co"];
             $nombreActualizar = $_POST["nombreActualizar"];
             $jefeActualizar    = $_POST["jefeActualizar"];
             $teljActualizar    = $_POST["teljActualizar"];
             $puestoActualizar    = $_POST["puestoActualizar"];

             $contacto1Actualizar    = $_POST["contacto1Actualizar"];
             $telcontacto1Actualizar    = $_POST["telcontacto1Actualizar"];
             $contacto2Actualizar    = $_POST["contacto2Actualizar"];
             $telcontacto2Actualizar    = $_POST["telcontacto2Actualizar"];
             $contacto3Actualizar    = $_POST["contacto3Actualizar"];
             $telcontacto3Actualizar    = $_POST["telcontacto3Actualizar"];
             $teldependenciaActualizar    = $_POST["teldependenciaActualizar"];

             if ( isset($_POST["logodependenciaActualizar"]) ) {
                # code...
                $logodependenciaActualizar    = $_POST["logodependenciaActualizar"];

               $conn->query("update autoridades set nombre='$nombreActualizar', jefe='$jefeActualizar',
                tel_jefe='$teljActualizar', puesto='$puestoActualizar', contacto1='$contacto1Actualizar', tel_contacto1='$telcontacto1Actualizar',
                contacto2='$contacto2Actualizar', tel_contacto2='$telcontacto2Actualizar',
                contacto3='$contacto3Actualizar', tel_contacto3='$telcontacto3Actualizar',
                tel_dependencia='$teldependenciaActualizar', logo_dependencia='$logodependenciaActualizar'
                where id_autoridad=$co");
               printf("if isset Registros actualizados: " .$conn -> affected_rows
                ."\nISSET SI logodependenciaActualizar: " .$logodependenciaActualizar ."\n");

                // Checar si se ejecuto correctamente la sentencia, si es mayor a 0, se ejecuto correctamente
               if( $conn -> affected_rows > 0 )
                     echo true;
                   else
                     echo false;

              }
              else
              {
                  $conn->query("update autoridades set nombre='$nombreActualizar', jefe='$jefeActualizar',
                tel_jefe='$teljActualizar', puesto='$puestoActualizar', contacto1='$contacto1Actualizar', tel_contacto1='$telcontacto1Actualizar',
                contacto2='$contacto2Actualizar', tel_contacto2='$telcontacto2Actualizar',
                contacto3='$contacto3Actualizar', tel_contacto3='$telcontacto3Actualizar',
                tel_dependencia='$teldependenciaActualizar'
                where id_autoridad=$co");
                  printf("Registros actualizados: " .$conn -> affected_rows ."\n");

                  // Checar si se ejecuto correctamente la sentencia, si es mayor a 0, se ejecuto correctamente
                  if( $conn -> affected_rows > 0 )
                     echo true;
                   else
                     echo false;
              }

             $conn->close();


        break;

    case "delete":///-----------------Eliminar Datos
      header("Access-Control-Allow-Origin: *");
      $nombreliminar = $_POST["nombreliminar"];
      $conn->query("DELETE FROM autoridades where nombre LIKE '%$nombreliminar%' || id_autoridad='$nombreliminar'");

      $conn->close();
      echo $nombreliminar;
      break;

    case 'search':
       header("Access-Control-Allow-Origin: *");

        $autoridadbuscar = $_GET["autoridad"]; // Dato recibido en la variable $autoridad metodo GET, desde AJAX de autoridad-js

        $result = $conn->query("Select * from autoridades where nombre LIKE '%$autoridadbuscar%' || id_autoridad='$autoridadbuscar'");
        $autoridadbuscar = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array($rs["id_autoridad"],
                            $rs["nombre"],
                            $rs["jefe"],
                            $rs["tel_jefe"],
                            $rs["puesto"],
                            $rs["contacto1"],
                            $rs["tel_contacto1"],
                            $rs["contacto2"],
                            $rs["tel_contacto2"],
                            $rs["contacto3"],
                            $rs["tel_contacto3"],
                            $rs["tel_dependencia"],
                            $rs["logo_dependencia"]
                            );

            array_push($autoridadbuscar,$data);
        }
        echo json_encode($autoridadbuscar);
        $conn->close();

        break;

    case 'upload_image':
      /* esto esta bien
        $placas     = $_POST["placas"];
        foreach ($_FILES["imagenes_add"]["error"] as $clave=> $error)
        {
            if ($error == UPLOAD_ERR_OK)
            {
                $nombre_tmp = $_FILES["imagenes_add"]["tmp_name"][$clave];
                $nombre = $_FILES["imagenes_add"]["name"][$clave];
                move_uploaded_file($nombre_tmp,
                  "../img/subidas/$nombre");
            }
        }*/

    //$placas     = $_POST["placas"];
      $nombre_campo = $_POST["nombre_campo"];
      //echo "nombre_campo: " .$nombre_campo;
      $autoridad = $_POST["autoridad"];
          $allowedExts = array("gif", "jpeg", "jpg", "png");
          $temp = explode(".", $_FILES[$nombre_campo]["name"]);
          $extension = end($temp);
          //echo "img_name: " . $_FILES[$nombre_campo]['name'][$clave] ." temp: " .$temp[1];
          $imagen="";
          $random=rand(1,999999);

            if ((
                ($_FILES[$nombre_campo]["type"] == "image/gif")
              || ($_FILES[$nombre_campo]["type"] == "image/jpeg")
              || ($_FILES[$nombre_campo]["type"] == "image/jpg")
              || ($_FILES[$nombre_campo]["type"] == "image/pjpeg")
              || ($_FILES[$nombre_campo]["type"] == "image/png")
              ))
            {
              //Verificamos que sea una imagen
                if ($_FILES[$nombre_campo]["error"] > 0){
                  //verificamos que venga algo en el input file
                  echo "Error numero: " . $_FILES[$nombre_campo]["error"] . "<br>";
                }
                else{
                  //subimos la imagen
                  $imagen= $autoridad.'_'.$_FILES[$nombre_campo]["name"];
                  if(file_exists("../img/subidas/logos/".$imagen ) ){
                      echo $_FILES[$nombre_campo]["name"] . " Ya existe. ";
                  }
                  else
                  {
                      //move_uploaded_file($_FILES[$nombre_campo]["tmp_name"],
                        //"../img/subida.'_'.$_FILES[$nombre_campo]["name"]);
                        //echo "Archivo guardado en " . "../img/subida.'_'. $_FILES[$nombre_campo]["name"];

                      $temporal=$_FILES[$nombre_campo]['tmp_name'];
                    //$nombr=$_FILES['file']['name'];
                    if($_FILES[$nombre_campo]["type"] == "image/jpeg")
                    {
                      $original=imagecreatefromjpeg($temporal);
                    }else if ($_FILES[$nombre_campo]["type"] == "image/gif")
                    {
                      $original=imagecreatefromgif($temporal);
                    }else if ($_FILES[$nombre_campo]["type"] == "image/png")
                    {
                      $original=imagecreatefrompng($temporal);
                    }
                    else {die('El formato de la imagen debe ser jpg,jpeg,gif o png');}
                    $ancho_original= imagesx ($original); // 190, 661
                    $alto_original= imagesy ($original); // 190, 1024
                    $ancho_nuevo=560;
                    $alto_nuevo=round ($ancho_nuevo * $alto_original / $ancho_original); // 560 * 190 / 190 = 560, 560 * 1024 / 661 = 867
                    $copia=imagecreatetruecolor($ancho_nuevo,$alto_nuevo);
                    imagecopyresampled($copia, $original, 0,0,0,0, $ancho_nuevo,$alto_nuevo, $ancho_original, $alto_original);
                    imagejpeg($copia,"../img/subidas/logos/".$imagen,100);

                        echo $imagen;

                        imagedestroy($original);
                        imagedestroy($copia);
                    }
                }
            } // fin if de tipo de imagenes ( gif, jpg, etc.. )
            else{
              echo "Formato no soportado o falta agregar la imagen";
              echo "<script>alert('El registro no se agregó')</script>";
            } // fin else


      $conn->close();


    break;

    default:
        echo "Conexion a BD";
}
?>