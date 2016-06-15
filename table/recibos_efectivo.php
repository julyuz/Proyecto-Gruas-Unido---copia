<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('conexion.php');

$metodo = $_GET['met'];

switch ($metodo) {

    case "show":///-----------------Mostrar Datos
        header("Access-Control-Allow-Origin: *");
            $result = $conn->query("SELECT * FROM recibos_efectivo");
            $recibos_efectivo= array();

            //printf("La seleccion devolvio %d filas.\n",
                  //  mysqli_num_rows($result) + "\n\n"
                //);

            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array(
                            $rs["id_recibo_efectivo"],
                            $rs["nombre_cliente"],
                            $rs["cantidad_numero"],
                            $rs["cantidad_letra"],
                            $rs["placas"],

                            $rs["marca"],
                            $rs["tipo"],
                            $rs["modelo"],
                            $rs["fecha_ingreso"],
                            $rs["fecha_documento"],

                            $rs["receptor"],
                            $rs["descripcion"]
                            );
                        //printf("rs[id_recibo_efectivo]: " + $rs["id_recibo_efectivo"]);
                array_push($recibos_efectivo,$data);
            }
            echo json_encode($recibos_efectivo);
            $conn->close();
        break;

    case "store":///-----------------Guardar Datos
        header("Access-Control-Allow-Origin: *"); // Duda
        $nombre        = $_POST["nombre"];
        $cantnumero     = $_POST["cantnumero"];
        $cantletra     = $_POST["cantletra"];
        $placas     = $_POST["placas"];

        $marca   = $_POST["marca"];
        $tipo     = $_POST["tipo"];
        $modelo   = $_POST["modelo"];
        $fecha_ingreso     = $_POST["fecha_ingreso"];

        $fecha_documento   = $_POST["fecha_documento"];
        $receptor     = $_POST["receptor"];
        $descripcion = $_POST["descripcion"];

        //$id_vehiculo = getid_vehiculo($placas);
        //$id_cliente = getid_cliente($nombre);

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

        $conn->query("INSERT into recibos_efectivo (nombre_cliente,cantidad_numero,cantidad_letra,
          placas,marca,tipo,modelo,fecha_ingreso,fecha_documento,receptor,descripcion, id_vehiculo, id_cliente)
          values ('$nombre','$cantnumero','$cantletra','$placas','$marca','$tipo',
          '$modelo','$fecha_ingreso','$fecha_documento','$receptor','$descripcion',
          '$id_vehiculo','$id_cliente' )");
        $conn->close();
        echo true;
        break;
          //(select id_cliente from clientes where nombre = '$nombre_cliente') )");
          //(select id_vehiculo from vehiculos where placas = '$placas'),

    case "update":///-----------------Actualizar Datos
        header("Access-Control-Allow-Origin: *");
        //echo '<SCRIPT language="JavaScript"> alert(" Primer linea del update "); </script>';

            $co = $_POST["co"];
            $nombreActualizar        = $_POST["nombreActualizar"];
            $cantnumeroActualizar     = $_POST["cantnumeroActualizar"];
            $cantletraActualizar     = $_POST["cantletraActualizar"];
            $placasActualizar     = $_POST["placasActualizar"];

            $marcaActualizar   = $_POST["marcaActualizar"];
            $tipoActualizar     = $_POST["tipoActualizar"];
            $modeloActualizar   = $_POST["modeloActualizar"];
            $fecha_ingresoActualizar     = $_POST["fecha_ingresoActualizar"];

            $fecha_documentoActualizar   = $_POST["fecha_documentoActualizar"];
            $receptorActualizar     = $_POST["receptorActualizar"];
            $descripcionActualizar = $_POST["descripcionActualizar"];


            $conn->query("UPDATE recibos_efectivo SET nombre_cliente ='$nombreActualizar',cantidad_numero='$cantnumeroActualizar',
              cantidad_letra='$cantletraActualizar',placas='$placasActualizar',marca='$marcaActualizar',tipo='$tipoActualizar',
              modelo='$modeloActualizar',fecha_ingreso='$fecha_ingresoActualizar',fecha_documento='$fecha_documentoActualizar',
              receptor='$receptorActualizar',descripcion='$descripcionActualizar'
              WHERE id_recibo_efectivo = $co");

             $conn->close();

        break;

    case "delete":///-----------------Eliminar Datos
      header("Access-Control-Allow-Origin: *");
      $nombreliminar = $_POST["nombreliminar"];
      $conn->query("DELETE FROM recibos_efectivo
        where nombre_cliente LIKE '%$nombreliminar%'
        || id_recibo_efectivo='$nombreliminar'");

      $conn->close();
      echo $nombreliminar;
      break;

    case 'search':
       header("Access-Control-Allow-Origin: *");
       //echo '<script language="JavaScript"> alert(" SEARCH "); </script>';

        $recibo_efectivobuscar = $_GET["recibo_efectivoBuscar"]; // Dato recibido en la variable $recibo_efectivobuscar metodo GET, desde AJAX de recibo_efectivo.js
       //$recibo_efectivobuscar = 2;
        $result = $conn->query("Select * from recibos_efectivo
          where nombre_cliente LIKE '%$recibo_efectivobuscar%'
          || id_recibo_efectivo='$recibo_efectivobuscar'");
        $recibo_efectivobuscar = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array(
                            $rs["id_recibo_efectivo"],
                            $rs["nombre_cliente"],
                            $rs["cantidad_numero"],
                            $rs["cantidad_letra"],
                            $rs["placas"],
                            $rs["marca"],

                            $rs["tipo"],
                            $rs["modelo"],
                            $rs["fecha_ingreso"],
                            $rs["fecha_documento"],
                            $rs["receptor"],
                            $rs["descripcion"]
                            );

            array_push($recibo_efectivobuscar,$data);
        }
        echo json_encode($recibo_efectivobuscar);
        $conn->close();

        break;

    case 'getid_vehiculo':
            # code...
            $placas = $_GET["placas"];

            header("Access-Control-Allow-Origin: *");
             $result = $conn->query("SELECT id_vehiculo from vehiculos
              where placas = '$placas'");
            $id = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
                $data=array(
                            $rs["id_vehiculo"]
                                );
                //array_push($id,$data);

                $placas = $rs["id_vehiculo"];
            }
            $conn->close();

            //echo json_encode($id);

            //echo getid_vehiculo($placas);

            echo $placas;
            break;

    default:
        echo "Conexion a BD";
}

    /*function getid_vehiculo($placas)
    {
        header("Access-Control-Allow-Origin: *");
             $result = $conn->query("SELECT id_vehiculo from vehiculos
              where placas = '$placas'");
            $id = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
                $data=array(
                            $rs["id_vehiculo"]
                                );
                $placas = $rs["id_vehiculo"];
            }
            $conn->close();
            //echo $placas;
            return $placas;
    }*/

    /*function getid_cliente($cliente)
    {
        $result = $conn->query("SELECT id_cliente from clientes
          where nombre = '$cliente'");
        //$placasbuscar = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
            $cliente = $rs["id_cliente"];
        }
        $conn->close();
        //echo $cliente;
        return $cliente;
    }*/
?>