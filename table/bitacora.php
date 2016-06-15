<?php
include('conexion.php'); 

$metodo = $_GET['met'];
 
switch ($metodo) {
    case "show":///-----------------Mostrar Datos
    header("Access-Control-Allow-Origin: *");
            $result = $conn->query("Select codigo,nombre,tel_celular
            ,calle,colonia,codigo_postal,num_exterior,num_interior
            ,ciudad,curp,rfc from clientes");
            $clientes = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array($rs["codigo"],
                            $rs["nombre"],
                            $rs["tel_celular"],
                            $rs["calle"],
                            $rs["colonia"],
                            $rs["codigo_postal"],
                            $rs["num_exterior"],
                            $rs["num_interior"],
                            $rs["ciudad"],
                            $rs["curp"],
                            $rs["rfc"]);
                array_push($clientes,$data);
                break;
            }
            echo json_encode($clientes);
            $conn->close();
        break;
        
   

    case "store":///-----------------Guardar Datos
    header("Access-Control-Allow-Origin: *");
        $Codigo_operador     = $_POST["Codigo_operador"];
        $fecha        = $_POST["fecha"];
        $nombre_empresa     = $_POST["nombre_empresa"];
        $domicilio     = $_POST["domicilio"];
        $telefono    = $_POST["telefono"];
        $tipo_servicio     = $_POST["tipo_servicio"];
        $modalidad     = $_POST["modalidad"];
        $marca          = $_POST["marca"];
        $modelo     = $_POST["modelo"];
        $placas     = $_POST["placas"];
        $nombre_conductor     = $_POST["nombre_conductor"];
        $licencia_num     = $_POST["licencia_num"];
        $licencia_tipo     = $_POST["licencia_tipo"];
        $vigencia     = $_POST["vigencia"];
        $origen_destino     = $_POST["origen_destino"];
        $dias_conducidos           = $_POST["dias_conducidos"];
        $casos_excepcion           = $_POST["casos_excepcion"];
        $hora_entrada            = $_POST["hora_entrada"];
        $hora_salida           = $_POST["hora_salida"];
        $horas_conduciendo           = $_POST["horas_conduciendo"];
        $nombre_elaborador           = $_POST["nombre_elaborador"];

        $conn->query("insert into bitacoras (Codigo_operador,fecha,nombre_empresa,domicilio,telefono,tipo_servicio,modalidad,marca
          ,modelo,placas,nommbre_conductor,licencia_num,licencia_tipo,vigencia,origen_destino,dias_conducidos,casos_excepcion,hora_entrada,hora_salida,horas_conduciendo,nombre_elaborador)values
          ('$Codigo_operador','$fecha','$nombre_empresa','$domicilio','$telefono','$tipo_servicio','$modalidad','$marca','$modelo'
          ,'$placas','$nombre_conductor','$licencia_num','$licencia_tipo','$vigencia','$origen_destino','$dias_conducidos','$casos_excepcion','$hora_entrada','$hora_salida','$horas_conduciendo','$nombre_elaborador')");

        $conn->close();
        echo true;
        break;

 case "update":///-----------------Actualizar Datos
 header("Access-Control-Allow-Origin: *");
             $co = $_POST["co"];
             $nombreActualizar = $_POST["nombreActualizar"];
             $correoActualizar    = $_POST["correoActualizar"];
             $telfActualizar    = $_POST["telfActualizar"];
             $telcActualizar    = $_POST["telcActualizar"];
             $calleActualizar    = $_POST["calleActualizar"];
             $coloniaActualizar    = $_POST["coloniaActualizar"];
             $cpActualizar    = $_POST["cpActualizar"];
             $nmexActualizar    = $_POST["nmexActualizar"];
             $nmintActualizar    = $_POST["nmintActualizar"];
             $ciudadActualizar    = $_POST["ciudadActualizar"];
             $cont1Actualizar    = $_POST["cont1Actualizar"];
             $cont1Actualizar    = $_POST["cont1Actualizar"];
             $telcont1Actualizar    = $_POST["telcont1Actualizar"];
             $cont2Actualizar    = $_POST["cont2Actualizar"];
             $telcont2Actualizar    = $_POST["telcont2Actualizar"];
             $curpActualizar    = $_POST["curpActualizar"];
             $rfcActualizar    = $_POST["rfcActualizar"];

             $conn->query("update clientes set nombre='$nombreActualizar', correo='$correoActualizar'
              , tel_fijo='$telfActualizar', tel_celular='$telcActualizar', calle='$calleActualizar'
              , colonia='$coloniaActualizar', codigo_postal='$cpActualizar', num_exterior='$nmexActualizar'
              , num_interior='$nmintActualizar', ciudad='$ciudadActualizar', contacto1='$cont1Actualizar'
              , tel_contacto1='$telcont1Actualizar', contacto2='$cont2Actualizar', tel_contacto2='$telcont2Actualizar'
              , curp='$curpActualizar', rfc='$rfcActualizar' where codigo=$co");
             
             $conn->close();
            
        break;
        
    case "delete":///-----------------Eliminar Datos
    header("Access-Control-Allow-Origin: *");
      $nombreliminar = $_POST["nombreliminar"];
      $conn->query("DELETE FROM clientes  where nombre LIKE '%$nombreliminar%' || codigo='$nombreliminar'");
     
      $conn->close();
      echo $nombreliminar;
      break;
 
  case 'search':
  header("Access-Control-Allow-Origin: *");
        $clientebuscar = $_GET["operador"];

        $result = $conn->query("Select * from operadores where nombre LIKE '%$clientebuscar%' || codigo='$clientebuscar'");
        $clientebuscar = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array($rs["id_operador"],
                            $rs["nombre"],
                            $rs["licencia"],
                            $rs["tipo_licencia"],
                            $rs["no_licencia"],
                            $rs["vigencia_licencia"]);

            array_push($clientebuscar,$data);
        }
        echo json_encode($clientebuscar);
        $conn->close();
       
        
        break;

    default:
        echo "Conexion a BD";
}
?>