<?php
include('conexion.php');

$metodo = $_GET['met'];

switch ($metodo) {

    case "show":///-----------------Mostrar Datos
    header("Access-Control-Allow-Origin: *");
            $result = $conn->query("Select * from operadores");
            $vehiculos = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
          $data=array(
                        $rs["id_operador"],
                        $rs["nombre"],
                        $rs["licencia"],
                        $rs["tipo_licencia"],
                        $rs["no_licencia"],
                        $rs["vigencia_licencia"]);

                array_push($vehiculos,$data);
            }
            echo json_encode($vehiculos);
            $conn->close();
        break;




  case "store":///-----------------Guardar Datos
      header("Access-Control-Allow-Origin: *");
        $nombre     = $_POST["nombre"];
        $licencia     = $_POST["licencia"];
        $tipo        = $_POST["tipo"];
        $numero           = $_POST["numero"];
        $vigencia           = $_POST["vigencia"];



        $conn->query("insert into operadores (nombre,licencia,tipo_licencia,no_licencia,vigencia_licencia)values('$nombre','$licencia','$tipo','$numero'
            ,'$vigencia')");


          $conn->close();
        echo "no se inserto nada";
        break;

 case "update":///-----------------Actualizar Datos
    header("Access-Control-Allow-Origin: *");
             $idop    = $_POST["idop"];
             $nombreac    = $_POST["nombreac"];
             $licac = $_POST["licac"];
             $tl    = $_POST["tl"];
             $nl= $_POST["nl"];
             $vl= $_POST["vl"];



             $conn->query("update operadores set nombre='$nombreac',licencia='$licac',tipo_licencia='$tl',no_licencia='$nl',vigencia_licencia='$vl' where id_operador=$idop");
             $conn->close();

        break;

  case "delete":///-----------------Eliminar Datos
     header("Access-Control-Allow-Origin: *");
      $nombreliminar = $_POST["noseliminar"];
      $conn->query("DELETE FROM operadores  where  id_operador='$nombreliminar'");

      $conn->close();
      echo $nombreliminar;
      break;

  case 'search':
      header("Access-Control-Allow-Origin: *");
        $vbuscar = $_GET["vbuscar"];

        $result = $conn->query("Select * from operadores where id_operador='$vbuscar'");
        $vbuscar = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array(
                        $rs["id_operador"],
                        $rs["nombre"],
                        $rs["licencia"],
                        $rs["tipo_licencia"],
                        $rs["no_licencia"],
                        $rs["vigencia_licencia"]);

            array_push($vbuscar,$data);
        }
        echo json_encode($vbuscar);
        $conn->close();


        break;

    default:
        echo "Conexion a BD";
}
?>