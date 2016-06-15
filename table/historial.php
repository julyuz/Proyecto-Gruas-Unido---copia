<?php
include('conexion.php'); 
$metodo = $_GET['metodo'];

switch ($metodo) {
    case "show":///-----------------Mostrar Datos
            $result = $conn->query("select pagos.noSocio, pagos.fechaFinal, clientes.nombre, historial.created_at from pagos, clientes, historial where pagos.noSocio=clientes.noSocio && pagos.noSocio=historial.noSocio ORDER BY historial.created_at DESC");
            $pagos = array();
             while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                 $data=array($rs["noSocio"],
                             $rs["nombre"],
                             $rs["created_at"],
                             $rs["fechaFinal"]);
                 array_push($pagos,$data);
             }
             echo json_encode($pagos);
             $conn->close();
        break;
        
    case "update":///-----------------Actualizar Datos
        break;

    case "store":///-----------------Guardar Datos
       header("Access-Control-Allow-Origin: *");
        $noSocio          = $_POST["noSocio"];
        $conn->query("insert into historial (noSocio)values('$noSocio')");
        $conn->close();
        echo true;
        break;

    case "delete":///-----------------Eliminar Datos

      break;

    case 'search':

        break;

    default:
        echo "Conexion a BD";
}
?>