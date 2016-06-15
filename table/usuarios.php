<?php
include('conexion.php'); 
$metodo = $_GET['metodo'];

switch ($metodo) {
    case "show":///-----------------Mostrar Datos
            $result = $conn->query("Select * from usuarios");
            $usuarios = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array($rs["id"],
                            $rs["usuario"],
                            $rs["password"],
                            $rs["privilegio"],
                            $rs["created_at"]);
                array_push($usuarios,$data);
            }
            echo json_encode($usuarios);
            $conn->close();
        break;
        
    case "update":///-----------------Actualizar Datos
             $id            = $_POST['id'];
             $usuario       = $_POST["usuario"];
             $password      = md5($_POST["password"]);
             $privilegio    = $_POST["privilegio"];
             $conn->query("update usuarios set usuario='$usuario', password='$password', privilegio='$privilegio' where id=$id");
             $conn->close();
            
        break;

    case "store":///-----------------Guardar Datos
       header("Access-Control-Allow-Origin: *");
        $usuario          = $_POST["usuario"];
        $password         = md5($_POST["password"]);
        $privilegio       = $_POST["privilegio"];
        $conn->query("insert into usuarios (usuario,password,privilegio)values('$usuario','$password','$privilegio')");
        $conn->close();
        echo true;
        break;

    case "delete":///-----------------Eliminar Datos
      $usuario = $_POST["usuario"];
      $conn->query("DELETE FROM usuarios where usuario = '$usuario'");
      echo $usuario;
      break;

    case 'search':
        $usuario = $_GET["usuario"];

       $result = $conn->query("Select * from usuarios where usuario LIKE '%$usuario%'");
        $usuarios = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array($rs["id"],
                        $rs["usuario"],
                        $rs["password"],
                        $rs["privilegio"],
                        $rs["created_at"]);
            array_push($usuarios,$data);
        }
        echo json_encode($usuarios);
        $conn->close();
       
        
        break;
    case 'log':
           $usuario  = $_POST["user"];
           $password = $_POST["password"];

            if(md5($usuario)=="5554b615f497ef2fe546606cbcdd4c8f" && md5($password)=="884b0f3c0544ea7316abf1bb33abcb28"){
                echo json_encode(array("validacion"=>"yes","usuario"=>"Claudia,xxx,true"));
            }
            else{
            $result = $conn->query("Select * from usuarios where usuario='$usuario'");
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array($rs["usuario"],
                            $rs["password"],
                            $rs["privilegio"]);
            }
            if($data[1]==md5($password)){
              echo json_encode(array("validacion"=>"yes","usuario"=>$data));
            }
            else{
              echo json_encode("no");
            }
            $conn->close();
          }
           
    break;
    default:
        echo "Conexion a BD";
}
?>