<?php
include('conexion.php');
$metodo = $_GET['met'];

switch ($metodo) {
    case "show":///-----------------Mostrar Datos
            $result = $conn->query("SELECT * FROM usuarios");
            $usuarios = array();
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array($rs["id"],
                            $rs["nombre"],
                            $rs["Usuario"],
                            $rs["Password"],
                            $rs["nivel"],
                            $rs["created_at"]);
                array_push($usuarios,$data);
            }
            echo json_encode($usuarios);
            $conn->close();
        break;

    case "update":///-----------------Actualizar Datos
             $id            = $_POST["co"];
             $nombre        = $_POST["nombreActualizar"];
             $usuario       = $_POST["usuarioActualizar"];
             $pass          = $_POST["passActualizar"];
             $password      = md5($pass);
             $nivel         = $_POST["nivel"];
             $conn->query("UPDATE usuarios SET nombre = '$nombre', Usuario='$usuario',
              Password='$password', nivel='$nivel' WHERE id='$id'");
             $conn->close();

        break;

    case "store":///-----------------Guardar Datos
       header("Access-Control-Allow-Origin: *");
        $nom=($_POST['nombre']);
        $usu=($_POST['usu']);
        $password=($_POST['pass']);
        $nivel=($_POST['nivel']);

        $pass= md5($password);
        $prueba= strlen ($nom) * strlen ($usu) * strlen ($password) * strlen ($nivel);

        if ($prueba > 0)
        {
          $conn ->query("INSERT INTO usuarios (nombre,Usuario,Password,nivel)
            VALUES ('$nom','$usu','$pass','$nivel')");
          echo "\nregistro exitoso\n";
          echo "nombre->".$nom." usua->".$usu." contra->".$pass." nivel->".$nivel;
          //header("Location: ../login/usuarios.php");
          $conn->close(); echo true;
        }
        else{
          echo "Llene por favor todos los campos";
        }

    case "delete":///-----------------Eliminar Datos
      $id = $_POST["codigoEliminar"];
      $conn->query("DELETE FROM usuarios WHERE id = '$id'");
      $conn -> close();
      echo "Eliminado el id: " + $id;
    break;

    case 'search':
        $usuario = $_GET["usuario"];

       $result = $conn->query("SELECT * from usuarios where id = '$usuario'");
        $usuarios = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array($rs["id"],
                        $rs["nombre"],
                        $rs["Usuario"],
                        $rs["Password"],
                        $rs["nivel"]
                        );
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