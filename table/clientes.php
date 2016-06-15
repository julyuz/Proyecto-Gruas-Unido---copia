<?php
include('conexion.php');

$metodo = $_GET['met'];

switch ($metodo) {

    case "show":///-----------------Mostrar Datos
        header("Access-Control-Allow-Origin: *");
            $result = $conn->query("Select * from clientes");
            $clientes = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

                $data=array($rs["id_cliente"],
                            $rs["nombre"],
                            $rs["correo"],
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
            }
            echo json_encode($clientes);
            $conn->close();
        break;

    case "store":///-----------------Guardar Datos
        header("Access-Control-Allow-Origin: *"); // Duda
        $nombre        = $_POST["nombre"];
        $correo     = $_POST["correo"];
        $tel_fijo     = $_POST["tel_fijo"];
        $tel_celular     = $_POST["tel_celular"];
        $calle    = $_POST["calle"];
        $colonia     = $_POST["colonia"];
        $codigo_postal     = $_POST["codigo_postal"];
        $num_exterior          = $_POST["num_exterior"];
        $num_interior     = $_POST["num_interior"];
        $ciudad     = $_POST["ciudad"];
        $contacto1     = $_POST["contacto1"];
        $tel_contacto1     = $_POST["tel_contacto1"];
        $contacto2     = $_POST["contacto2"];
        $tel_contacto2     = $_POST["tel_contacto2"];
        $curp     = $_POST["curp"];
        $rfc           = $_POST["rfc"];
        $conn->query("insert into clientes (nombre,correo,tel_fijo,tel_celular,calle,colonia,codigo_postal,num_exterior
          ,num_interior,ciudad,contacto1,tel_contacto1,contacto2,tel_contacto2,curp,rfc)values
          ('$nombre','$correo','$tel_fijo','$tel_celular','$calle','$colonia','$codigo_postal','$num_exterior','$num_interior'
          ,'$ciudad','$contacto1','$tel_contacto1','$contacto2','$tel_contacto2','$curp','$rfc')");
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
              , curp='$curpActualizar', rfc='$rfcActualizar' where id_cliente=$co");

             $conn->close();

        break;

    case "delete":///-----------------Eliminar Datos
      header("Access-Control-Allow-Origin: *");
      $nombreliminar = $_POST["nombreliminar"];
      $conn->query("DELETE FROM clientes  where nombre LIKE '%$nombreliminar%' || id_cliente='$nombreliminar'");

      $conn->close();
      echo $nombreliminar;
      break;

    case 'search':
       header("Access-Control-Allow-Origin: *");
        $clientebuscar = $_GET["cliente"];

        $result = $conn->query("Select * from clientes where nombre LIKE '%$clientebuscar%' || id_cliente='$clientebuscar'");
        $clientebuscar = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array($rs["id_cliente"],
                            $rs["nombre"],
                            $rs["correo"],
                            $rs["tel_fijo"],
                            $rs["tel_celular"],
                            $rs["calle"],
                            $rs["colonia"],
                            $rs["codigo_postal"],
                            $rs["num_exterior"],
                            $rs["num_interior"],
                            $rs["ciudad"],
                            $rs["contacto1"],
                            $rs["tel_contacto1"],
                            $rs["contacto2"],
                            $rs["tel_contacto2"],
                            $rs["curp"],
                            $rs["rfc"]);

            array_push($clientebuscar,$data);
        }
        echo json_encode($clientebuscar);
        $conn->close();

        break;

    default:
        echo "Conexion a BD";
}
?>