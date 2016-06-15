<?php
include('conexion.php');

$metodo = $_GET['met'];

switch ($metodo) {

    case "show":///-----------------Mostrar Datos
        header("Access-Control-Allow-Origin: *");
            $result = $conn->query("SELECT * FROM recibos_vehiculo");
            $recibos_efectivo= array();

            //printf("La seleccion devolvio %d filas.\n",
              //      mysqli_num_rows($result) + "\n\n"
                //);

            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array(
                            $rs["id_recibo_vehiculo"],
                            $rs["suscriptor"],
                            $rs["marca"],
                            $rs["tipo"],
                            $rs["modelo"],

                            $rs["color"],
                            $rs["placas"],
                            $rs["fecha_ingreso"],
                            $rs["fecha_documento"],
                            $rs["autoridad"],
                            $rs["nombre_cliente"]
                            );
                        //printf("rs[id_recibo_efectivo]: " + $rs["id_recibo_efectivo"]);
                array_push($recibos_efectivo,$data);
            }
            echo json_encode($recibos_efectivo);
            $conn->close();
        break;

    case "store":///-----------------Guardar Datos
        header("Access-Control-Allow-Origin: *"); // Duda
        $suscriptor = $_POST["suscriptor"];
        $marca   = $_POST["marca"];
        $tipo     = $_POST["tipo"];
        $modelo   = $_POST["modelo"];
        $color     = $_POST["color"];

        $placas     = $_POST["placas"];
        $fecha_ingreso     = $_POST["fecha_ingreso"];
        $fecha_documento   = $_POST["fecha_documento"];
        $autoridad = $_POST["autoridad"];
        $nombre        = $_POST["nombre"];

        $result = $conn->query("SELECT id_vehiculo from vehiculos
              where placas = '$placas'");
            $id = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
                $id_vehiculo = $rs["id_vehiculo"];
            }
            //$conn->close();

            $result_1 = $conn->query("SELECT id_cliente from clientes where nombre = '$nombre'");
            while($rs_1 = $result_1->fetch_array(MYSQLI_ASSOC) ) {
                $id_cliente = $rs_1["id_cliente"];
            }

            $result_2 = $conn->query("SELECT id_autoridad from autoridades where nombre = '$autoridad'");
            while($rs_2 = $result_2->fetch_array(MYSQLI_ASSOC) ) {
                $id_autoridad = $rs_2["id_autoridad"];
            }

        $conn->query("INSERT into recibos_vehiculo (suscriptor, marca,tipo,modelo, color,
            placas, fecha_ingreso,fecha_documento, autoridad, nombre_cliente,
            id_vehiculo, id_cliente, id_autoridad)
          values ('$suscriptor','$marca','$tipo','$modelo','$color',
           '$placas', '$fecha_ingreso','$fecha_documento','$autoridad','$nombre',
           '$id_vehiculo','$id_cliente', '$id_autoridad')");
        $conn->close();
        echo true;
        break;

    case "update":///-----------------Actualizar Datos
        header("Access-Control-Allow-Origin: *");
        //echo '<SCRIPT language="JavaScript"> alert(" Primer linea del update "); </script>';
            $co = $_POST["co"];
            $suscriptorActualizar = $_POST["suscriptorActualizar"];
            $marcaActualizar   = $_POST["marcaActualizar"];
            $tipoActualizar     = $_POST["tipoActualizar"];
            $modeloActualizar   = $_POST["modeloActualizar"];
            $colorActualizar     = $_POST["colorActualizar"];

            $placasActualizar     = $_POST["placasActualizar"];
            $fecha_ingresoActualizar     = $_POST["fecha_ingresoActualizar"];
            $fecha_documentoActualizar   = $_POST["fecha_documentoActualizar"];
            $autoridadActualizar     = $_POST["autoridadActualizar"];
            $nombreActualizar        = $_POST["nombreActualizar"];


            $conn->query("UPDATE recibos_vehiculo SET nombre_cliente ='$nombreActualizar',
              suscriptor='$suscriptorActualizar',
              placas='$placasActualizar',marca='$marcaActualizar',tipo='$tipoActualizar',
              modelo='$modeloActualizar',color = '$colorActualizar',
              fecha_ingreso='$fecha_ingresoActualizar',
              fecha_documento='$fecha_documentoActualizar',autoridad='$autoridadActualizar'
              WHERE id_recibo_vehiculo = $co");

             $conn->close();

        break;

    case "delete":///-----------------Eliminar Datos
      header("Access-Control-Allow-Origin: *");
      $nombreliminar = $_POST["nombreliminar"];
      $conn->query("DELETE FROM recibos_vehiculo
        where nombre_cliente LIKE '%$nombreliminar%'
        || id_recibo_vehiculo='$nombreliminar'");

      $conn->close();
      echo $nombreliminar;
      break;

    case 'search':
       header("Access-Control-Allow-Origin: *");
       //echo '<script language="JavaScript"> alert(" SEARCH "); </script>';

        $recibo_vehiculobuscar = $_GET["recibo_vehiculoBuscar"]; // Dato recibido en la variable $recibo_efectivobuscar metodo GET, desde AJAX de recibo_efectivo.js
       //$recibo_efectivobuscar = 2;
        $result = $conn->query("SELECT * from recibos_vehiculo
          where nombre_cliente LIKE '%$recibo_vehiculobuscar%'
          || id_recibo_vehiculo='$recibo_vehiculobuscar'");
        $recibo_vehiculobuscar = array();

        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array(
                            $rs["id_recibo_vehiculo"],
                            $rs["suscriptor"],
                            $rs["marca"],
                            $rs["tipo"],
                            $rs["modelo"],
                            $rs["color"],

                            $rs["placas"],
                            $rs["fecha_ingreso"],
                            $rs["fecha_documento"],
                            $rs["autoridad"],
                            $rs["nombre_cliente"]
                            );

            array_push($recibo_vehiculobuscar,$data);
        }
        echo json_encode($recibo_vehiculobuscar);
        $conn->close();

        break;

    default:
        echo "Conexion a BD";
}
?>