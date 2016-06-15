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
        $logodependencia = $_POST["logodependencia"];

        $conn->query("insert into autoridades (nombre,jefe,tel_jefe,puesto,contacto1,tel_contacto1,
          contacto2,tel_contacto2,contacto3,tel_contacto3,tel_dependencia,logo_dependencia)
          values ('$nombre','$jefe','$tel_jefe','$puesto','$contacto1','$telcontacto1',
          '$contacto2','$telcontacto2','$contacto3','$telcontacto3','$teldependencia','$logodependencia')");
        $conn->close();
        echo true;
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
             $logodependenciaActualizar    = $_POST["logodependenciaActualizar"];

             if ( isset($logodependenciaActualizar) ) {
                # code...
               $conn->query("update autoridades set nombre='$nombreActualizar', jefe='$jefeActualizar',
                tel_jefe='$teljActualizar', puesto='$puestoActualizar', contacto1='$contacto1Actualizar', tel_contacto1='$telcontacto1Actualizar',
                contacto2='$contacto2Actualizar', tel_contacto2='$telcontacto2Actualizar',
                contacto3='$contacto3Actualizar', tel_contacto3='$telcontacto3Actualizar',
                tel_dependencia='$teldependenciaActualizar', logo_dependencia='$logodependenciaActualizar'
                where id_autoridad=$co");
              }
              else
              {
                  $conn->query("update autoridades set nombre='$nombreActualizar', jefe='$jefeActualizar',
                tel_jefe='$teljActualizar', puesto='$puestoActualizar', contacto1='$contacto1Actualizar', tel_contacto1='$telcontacto1Actualizar',
                contacto2='$contacto2Actualizar', tel_contacto2='$telcontacto2Actualizar',
                contacto3='$contacto3Actualizar', tel_contacto3='$telcontacto3Actualizar',
                tel_dependencia='$teldependenciaActualizar'
                where id_autoridad=$co");
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

    default:
        echo "Conexion a BD";
}
?>