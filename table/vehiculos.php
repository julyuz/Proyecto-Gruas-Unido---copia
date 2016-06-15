<?php
include('conexion.php');

$metodo = $_GET['met'];

switch ($metodo) {

    case "show":///-----------------Mostrar Datos
    header("Access-Control-Allow-Origin: *");
            $result = $conn->query("Select * from vehiculos");
            $vehiculos = array();
            $conta = 0;
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array(
                            $rs["placas"],//0
                            $rs["marca"],//1
                            $rs["tipo"],//2
                            $rs["modelo"],
                            $rs["num_serie_motor"],

                            $rs["fecha_ingreso"],
                            $rs["fecha_salida"],
                            $rs["color"],
                            $rs["pa"],
                            $rs["ac"],

                            $rs["no_siniestro"],
                            $rs["id_cliente"]
                            );
                array_push($vehiculos,$data);

                $result_2 = $conn->query("Select nombre from clientes
                    where id_cliente = " .$rs['id_cliente'] ."" );
                //$vehiculos = array();
                while($rs_2 = $result_2->fetch_array(MYSQLI_ASSOC)) {
                    $data_2=array(
                                $rs_2["nombre"]
                                );

                    $vehiculos[$conta][12] = $data_2;
                    $conta = $conta + 1;
                }

            }

            echo json_encode($vehiculos);
            $conn->close();
        break;

    /*case 'getClient':
            # code...
        header("Access-Control-Allow-Origin: *");
            $id_cliente = json_decode($_GET["id"]);

            $result = $conn->query("SELECT nombre FROM clientes
                WHERE id_cliente = $id_cliente");
            $nombre = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array(
                            $rs["nombre"]
                            );

                array_push($nombre,$data);
            }

            echo json_encode($nombre);
            $conn->close();
    break;*/


    case "store":///-----------------Guardar Datos
    header("Access-Control-Allow-Origin: *");
       $placas           = $_POST["placas"];
        $codigo           = $_POST["codigo"];
        $marca           = $_POST["marca"];
        $tipo     = $_POST["tipo"];
        $color        = $_POST["color"];
        $modelo           = $_POST["modelo"];
        $num_serie_vehiculo        = $_POST["num_serie_vehiculo"];
        $num_serie_motor           = $_POST["num_serie_motor"];
        $observacion       = $_POST["observacion"];
        $autoridad_intervino          = $_POST["autoridad_intervino"];
        $motivo          = $_POST["motivo"];
        $fecha_ingreso          = $_POST["fecha_ingreso"];
        $fecha_salida          = $_POST["fecha_salida"];
        $aseguradora          = $_POST["aseguradora"];
        $ajustador          = $_POST["ajustador"];
        $tel_ajustador          = $_POST["tel_ajustador"];
        $num_economico          = $_POST["num_economico"];
        $razon_social          = $_POST["razon_social"];
        $pa           = $_POST["pa"];
        $ac           = $_POST["ac"];
        $no_siniestro          = $_POST["no_siniestro"];

        $conn->query("insert into vehiculos (placas,id_cliente,marca,tipo,
            color,modelo,num_serie_vehiculo,num_serie_motor,observacion,
            autoridad_intervino,motivo,fecha_ingreso,fecha_salida,
            aseguradora,ajustador,tel_ajustador,num_economico,razon_social,
            pa,ac,no_siniestro)
        values('$placas',$codigo,'$marca','$tipo','$color','$modelo','$num_serie_vehiculo','$num_serie_motor','$observacion','$autoridad_intervino','$motivo','$fecha_ingreso','$fecha_salida','$aseguradora','$ajustador','$tel_ajustador','$num_economico','$razon_social','$pa','$ac',$no_siniestro)");


          $conn->close();
        echo "no se inserto nada";
        break;

 case "update":///-----------------Actualizar Datos
 header("Access-Control-Allow-Origin: *");
             $placasac = $_POST["placasac"];
             $codigoac = $_POST["codigoac"];
             $marcaActualizar = $_POST["marcaActualizar"];
             $tipoActualizar    = $_POST["tipoActualizar"];
             $colorActualizar    = $_POST["colorActualizar"];
             $modeloActualizar    = $_POST["modeloActualizar"];
             $noserieActualizar    = $_POST["noserieActualizar"];
             $nomotorActualizar    = $_POST["nomotorActualizar"];
             $obsActualizar    = $_POST["obsActualizar"];
             $aiActualizar    = $_POST["aiActualizar"];
             $motivoActualizar    = $_POST["motivoActualizar"];
             $fiActualizar    = $_POST["fiActualizar"];
             $fsActualizar    = $_POST["fsActualizar"];
             $asgActualizar    = $_POST["asgActualizar"];
             $ajActualizar    = $_POST["ajActualizar"];
             $tajActualizar    = $_POST["tajActualizar"];
             $nmeActualizar    = $_POST["nmeActualizar"];
             $rzsActualizar    = $_POST["rzsActualizar"];
             $paActualizar    = $_POST["paActualizar"];
             $acActualizar    = $_POST["acActualizar"];
             $nsiActualizar    = $_POST["nsiActualizar"];



             $conn->query("update vehiculos set id_cliente=$codigoac,marca='$marcaActualizar',tipo='$tipoActualizar',color='$colorActualizar',modelo='$modeloActualizar',num_serie_vehiculo='$noserieActualizar',num_serie_motor='$nomotorActualizar',observacion='$obsActualizar',autoridad_intervino='aiActualizar',motivo='$motivoActualizar',fecha_ingreso='$fiActualizar',fecha_salida='$fsActualizar',aseguradora='$asgActualizar',ajustador='$ajActualizar',tel_ajustador='$tajActualizar',num_economico='$nmeActualizar',razon_social='$rzsActualizar',pa='$paActualizar',ac='$acActualizar',no_siniestro=$nsiActualizar where placas='$placasac'");
             $conn->close();

        break;

    case "delete":///-----------------Eliminar Datos
        header("Access-Control-Allow-Origin: *");
      $nombreliminar = $_POST["noseliminar"];
      $conn->query("DELETE FROM vehiculos  where  placas='$nombreliminar'");

      $conn->close();
      echo $nombreliminar;
      break;

  case 'search':
     header("Access-Control-Allow-Origin: *");
        $vbuscar = $_GET["vbuscar"];

        $result = $conn->query("Select * from vehiculos where placas LIKE '%$vbuscar%'");
        $vbuscar = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array($rs["placas"],
                        $rs["id_cliente"],
                        $rs["marca"],
                        $rs["tipo"],
                        $rs["color"],

                        $rs["modelo"],
                        $rs["num_serie_vehiculo"],
                        $rs["num_serie_motor"],
                        $rs["observacion"],
                        $rs["autoridad_intervino"],

                        $rs["motivo"],
                        $rs["fecha_ingreso"],
                        $rs["fecha_salida"],
                        $rs["aseguradora"],
                        $rs["ajustador"],

                        $rs["tel_ajustador"],
                        $rs["num_economico"],
                        $rs["razon_social"],
                        $rs["pa"],
                        $rs["ac"],
                        $rs["no_siniestro"]
                        );

            array_push($vbuscar,$data);
        }
        echo json_encode($vbuscar);
        $conn->close();


        break;

    default:
        echo "Conexion a BD";
}
?>