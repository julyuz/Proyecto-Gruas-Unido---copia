<?php
include('conexion.php');

$metodo = $_GET['met'];

switch ($metodo) {

    case "show":///-----------------Mostrar Datos
        header("Access-Control-Allow-Origin: *");
            $result = $conn->query("Select * from gruas");
            $vehiculos = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array(
                        $rs["id_grua"],
                        $rs["placas"],
                        $rs["tipo"],
                        $rs["marca"],
                        $rs["modelo"],
                        $rs["numero"],
                        $rs["id_operador"]
                        );

                array_push($vehiculos,$data);
            }
            echo json_encode($vehiculos);
            $conn->close();
        break;

    case "store":///-----------------Guardar Datos
        header("Access-Control-Allow-Origin: *");
        $placas     = $_POST["placas"];
        $tipo     = $_POST["tipo"];
        $marca           = $_POST["marca"];
        $modelo           = $_POST["modelo"];
        $numero        = $_POST["numero"];


        $conn->query("insert into gruas (placas,tipo,marca,modelo,numero)values('$placas','$tipo','$marca','$modelo'
            ,'$numero')");


          $conn->close();
        echo "no se inserto nada";
    break;

  case "update":///-----------------Actualizar Datos
    header("Access-Control-Allow-Origin: *");
             $plcac = $_POST["plcac"];
             $tipoac    = $_POST["tipoac"];
             $marcaac = $_POST["marcaac"];
             $modac    = $_POST["modac"];
             $numac= $_POST["numac"];

             $conn->query("update gruas set tipo = '$tipoac',marca='$marcaac
              ',modelo='$modac',numero='$numac' where placas = '$plcac'" );
             $conn->close();

        break;

  case "delete":///-----------------Eliminar Datos
      header("Access-Control-Allow-Origin: *");
      $nombreliminar = $_POST["noseliminar"];
      $conn->query("DELETE FROM gruas  where  placas='$nombreliminar'");

      $conn->close();
      echo $nombreliminar;
      break;

  case 'search':
      header("Access-Control-Allow-Origin: *");
        $vbuscar = $_GET["vbuscar"];

        $result = $conn->query("Select * from gruas where placas='$vbuscar'");
        $vbuscar = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array(
                        $rs["placas"],
                        $rs["tipo"],
                        $rs["marca"],
                        $rs["modelo"],
                        $rs["numero"]);

            array_push($vbuscar,$data);
        }
        echo json_encode($vbuscar);
        $conn->close();


        break;

    default:
        echo "Conexion a BD";
}
?>