<?php
include('conexion.php'); 

$metodo = $_GET['met'];

switch ($metodo) {
    case "show":///-----------------Mostrar Datos
    header("Access-Control-Allow-Origin: *");
            $result = $conn->query("Select * from deposito");
            $deposito = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array($rs["id_deposito"],
                            $rs["codigo"],
                            $rs["fechaInicial"],
                            $rs["fechaFinal"],
                            $rs["dias_custodiado"],
                            $rs["cuotaxdia"],
                            $rs["total"]);
                array_push($deposito,$data);
            }
            echo json_encode($deposito);
            $conn->close();
        break;
        
   


    case "store":///-----------------Guardar Datos
     header("Access-Control-Allow-Origin: *");
     echo "entraaaaaaaaaaaaaaaaaaa";
        $codigo       = $_POST["codigo"];
        $fechaInicial        = $_POST["fechaInicial"];
        $fechaFinal     = $_POST["fechaFinal"];
        $dias_custodiado          = $_POST["dias_custodiado"];
        $cuotaxdia           = $_POST["cuotaxdia"];
        $total           = $_POST["total"];
        $conn->query("insert into deposito (codigo,fechaInicial,fechaFinal,dias_custodiado,cuotaxdia,total)values
          ($codigo,'$fechaInicial','$fechaFinal','$dias_custodiado','$cuotaxdia','$total')");
        $conn->close();
        echo true;
        break;

 case "update":///-----------------Actualizar Datos
 header("Access-Control-Allow-Origin: *");
             $id_cliente = $_POST["id_cliente"];
             $nombreActualizar = $_POST["nombreActualizar"];
             $domActualizar    = $_POST["domActualizar"];
             $curpActualizar    = $_POST["curpActualizar"];
             $rfcActualizar    = $_POST["rfcActualizar"];
             $conn->query("update clientes set nombre='$nombreActualizar', domicilio='$domActualizar', curp='$curpActualizar', rfc='$rfcActualizar' where id_cliente=$id_cliente");
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
                        $rs["domicilio"],
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