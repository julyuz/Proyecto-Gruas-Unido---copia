<?php
include('conexion.php');

$metodo = $_GET['met'];

switch ($metodo) {

    case "show":///-----------------Mostrar Datos
            $result = $conn->query("Select * from remolques");
            $vehiculos = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array(
                            $rs["id_remolques"],//0
                            $rs["tipo"],
                            $rs["marca"],//1
                            $rs["modelo"],//2
                            $rs["capacidad"],
                            $rs["serie"],
                            $rs["tipo_carroceria"],
                            $rs["pa"],
                            $rs["ac"],
                            $rs["no_siniestro"]
                            );

                array_push($vehiculos,$data);
            }
            echo json_encode($vehiculos);
            $conn->close();
        break;

    case "store":///-----------------Guardar Datos


        $tipo     = $_POST["tipo"];
        $marca           = $_POST["marca"];
        $modelo           = $_POST["modelo"];
        $capacidad        = $_POST["capacidad"];
        $serie           = $_POST["serie"];
        $tipo_carroceria       = $_POST["tipo_carroceria"];
        $pa           = $_POST["pa"];
        $ac           = $_POST["ac"];
        $no_siniestro          = $_POST["no_siniestro"];

        $conn->query("insert into remolques (tipo,marca,modelo,capacidad,serie,tipo_carroceria,pa,ac,no_siniestro)values('$tipo','$marca','$modelo'
            ,'$capacidad','$serie','$tipo_carroceria','$pa','$ac',$no_siniestro)");


          $conn->close();
        echo "no se inserto nada";
        break;

 case "update":///-----------------Actualizar Datos
             $id_remolques = $_POST["id_remolques"];
             $tipoActualizar    = $_POST["tipoActualizar"];
             $marcaActualizar = $_POST["marcaActualizar"];
             $modeloActualizar    = $_POST["modeloActualizar"];
             $capacidadac= $_POST["capacidadac"];
             $serieac    = $_POST["serieac"];
             $tipo_carrac    = $_POST["tipo_carrac"];
             $paActualizar    = $_POST["paActualizar"];
             $acActualizar    = $_POST["acActualizar"];
             $nsiActualizar    = $_POST["nsiActualizar"];



             $conn->query("update remolques set tipo='$tipoActualizar',marca='$marcaActualizar',modelo='$modeloActualizar',capacidad='$capacidadac',serie='$serieac',tipo_carroceria='$tipo_carrac',pa='$paActualizar',ac='$acActualizar',no_siniestro=$nsiActualizar where id_remolques=$id_remolques");
             $conn->close();

        break;

    case "delete":///-----------------Eliminar Datos
      $nombreliminar = $_POST["noseliminar"];
      $conn->query("DELETE FROM remolques  where  id_remolques=$nombreliminar");

      $conn->close();
      echo $nombreliminar;
      break;

  case 'search':
        $vbuscar = $_GET["vbuscar"];

        $result = $conn->query("Select * from remolques where id_remolques=$vbuscar");
        $vbuscar = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array(
                        $rs["id_remolques"],
                        $rs["tipo"],
                        $rs["marca"],
                        $rs["modelo"],
                        $rs["capacidad"],
                        $rs["serie"],
                        $rs["tipo_carroceria"],
                        $rs["pa"],
                        $rs["ac"],
                        $rs["no_siniestro"]);

            array_push($vbuscar,$data);
        }
        echo json_encode($vbuscar);
        $conn->close();


        break;

    default:
        echo "Conexion a BD";
}
?>