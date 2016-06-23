<?php
ob_end_clean();
ini_set ('error_reporting', E_ALL);
include('conexion.php');
//include 'funciones_generales.php';

/***  MG = Memoria Gráfica  ***/

$metodo = $_GET['met'];

switch ($metodo) {

  // Caso para verificar si fueron enviadas correctamente las imagenes de la MG creada en un array por JSON
  case 'ver_imgs':
    # code...
    if( isset( $_POST["data"] ))
    {
      $data = json_decode( stripslashes( $_POST["data"] ) );
      echo $data;
    }
    else {
      die("No valido");
    }

    break;

  case 'create_pdf': // Crear pdf solo texto
      # code...
      require('../fpdf181/fpdf.php');

    class PDF extends FPDF
    {
        /*
            ** Medidas de un PDF **
            Anchura : 612 px.
            Altura : 792 px.
            Resol.: 72 dpi
        */

        // Cabecera de página
        function Header()
        {
            $x = 190; $y = 0; $salto = 5; $margen_izq = 5;

            // Logo izquierda ( águila )
            $this->Image('../img/LOGO CLASICO29052015_0000.jpg',$margen_izq,3,35);

            // Titulo
            /*$this->SetFont('Arial', 'B', 10);
            $this->SetXY(50, 5);
            $this-> Multicell($x - 80, 5, utf8_decode('GRUAS MANCERA
BOULEVARD INDUSTRIAL NO. 5700
COL. CALZONTZIN (ENFRENTE DE PEMEX)
TELS(452)5281045, 5249196 Correo: gmancerah@hotmail.com
URUAPAN, MICHOACAN'), 1, 'C');*/

            // Titulo
            $this->SetFont('Arial','B',18); // Arial bold 18
            $this->Cell($x,$y,'GRUAS MANCERA',0,0,'C');
            $this->Ln(7); // Salto de línea
            $this->SetFont('Arial','B',10); // Arial bold 10
            $this->Cell($x,$y,'BOULEVARD INDUSTRIAL NO. 5700',0,0,'C');
            $this -> Ln($salto); // Salto de línea
            $this -> Cell($x,$y, 'COL. CALZONTZIN  (ENFRENTE DE PEMEX)', 0, 0, 'C');
            $this -> Ln($salto); // Salto de línea
            $this -> Cell($x, $y, 'TELS(452)5281045, 5249196 Correo: gmancerah@hotmail.com    ', 0, 0, 'C');
            $this -> Ln($salto); // Salto de línea
            $this -> Cell($x, $y, 'URUAPAN, MICHOACAN', 0, 0,'C');

            // Logo derecha ( remolque )
            $this ->Image('../img/LOGO PLATAFORMA29052015_0000.jpg', ($x - 30), 3, 45);

        }

        // Pie de página
        function Footer()
        {

            $this -> SetFont('Arial', '', 10);
            $this -> SetY(-55);
            $this -> MultiCell(100, 5, utf8_decode('ELABORO:



ING. GERARDO ALFONSO MANCERA HUANTE
REPRESENTANTE DE GRUAS MANCERA
TEL. CEL. 4525257450'), 0, 'J');

            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','',8);
            // Número de página
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    } // Fin class PDF

    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    $pdf -> Ln(30);

    //for($i=1;$i<=40;$i++)
      //  $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
    $pdf->Output('I');

    //$fichero = 'Memoria_grafica.pdf';
    //$pdf->Output($fichero,'D');

      break;

  case 'create_pdf_MG': // Crear pdf con las imagenes de la memoria_grafica
    # code...
    require('../fpdf181/fpdf.php');

    class PDF extends FPDF
    {
        /*
            ** Medidas de un PDF **
            Anchura : 612 px.
            Altura : 792 px.
            Resol.: 72 dpi
        */

        // Cabecera de página
        function Header()
        {
            $x = 190; $y = 0; $salto = 5; $margen_izq = 5;

            // Logo izquierda ( águila )
            $this->Image('../img/LOGO CLASICO29052015_0000.jpg',$margen_izq,3,35);

            // Titulo
            /*$this->SetFont('Arial', 'B', 10);
            $this->SetXY(50, 5);
            $this-> Multicell($x - 80, 5, utf8_decode('GRUAS MANCERA
BOULEVARD INDUSTRIAL NO. 5700
COL. CALZONTZIN (ENFRENTE DE PEMEX)
TELS(452)5281045, 5249196 Correo: gmancerah@hotmail.com
URUAPAN, MICHOACAN'), 1, 'C');*/

          // Titulo
            $this->SetFont('Arial','B',18); // Arial bold 18
            $this->Cell($x,$y,'GRUAS MANCERA',0,0,'C');
            $this->Ln(7); // Salto de línea
            $this->SetFont('Arial','B',10); // Arial bold 10
            $this->Cell($x,$y,'BOULEVARD INDUSTRIAL NO. 5700',0,0,'C');
            $this -> Ln($salto); // Salto de línea
            $this -> Cell($x,$y, 'COL. CALZONTZIN  (ENFRENTE DE PEMEX)', 0, 0, 'C');
            $this -> Ln($salto); // Salto de línea
            $this -> Cell($x, $y, 'TELS(452)5281045, 5249196 Correo: gmancerah@hotmail.com    ', 0, 0, 'C');
            $this -> Ln($salto); // Salto de línea
            $this -> Cell($x, $y, 'URUAPAN, MICHOACAN', 0, 0,'C');

          // Logo derecha ( remolque )
            $this ->Image('../img/LOGO PLATAFORMA29052015_0000.jpg', ($x - 30), 3, 45);

        }

        // Pie de página
        function Footer()
        {

            $this -> SetFont('Arial', '', 10);
            $this -> SetY(-55);
            $this -> MultiCell(100, 5, utf8_decode('ELABORO:



ING. GERARDO ALFONSO MANCERA HUANTE
REPRESENTANTE DE GRUAS MANCERA
TEL. CEL. 4525257450'), 0, 'J');

            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','',8);
            // Número de página
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    } // Fin class PDF

    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    $pdf -> Ln(10);


        /*
            ** Medidas de un PDF **
            Anchura : 612 px.
            Altura : 792 px.
            Resol.: 72 dpi
        */

  /*  // Aqui van los datos del cliente
    $pdf->SetFont('Arial','',12); // Arial bold 18
            $pdf->Cell(0, 5,'DATOS DEL CLIENTE',0,0,'L');
            $pdf->Ln(7); // Salto de línea
*/

    // Creamos variables 'x' e 'y' para ubicar las imagenes
    $xImg = 30; $yImg = 70; $anImg = 150; $alImg = 70;
    //$pdf -> Image('../img/nemo.jpg', $xImg, $yImg, $anImg);

    /*// Recibimos el array 'data' con las imagenes de la MG seleccionada, para ubicarlas en el pdf que se va a crear
    if( isset( $_POST["data"] ) )
    {
      $data = explode(",", $_POST["data"]);

      for ($i = 0; $i < count($data); $i++)
      {
          $pdf ->Image('../img/subidas/' .$data[$i], $xImg, $yImg, $anImg, $alImg);
          $yImg = $yImg + 90;
          //if( $yImg )
          //echo "\n*** Dentro del for ***\n data[ " .$i ." ] --> " .$data[$i] ." length: " . strlen($data[$i]);
      }
    }
    else {
      die("Datos de imagenes no validos");
    }

    //$pdf -> Output();
*/

    for($i=1;$i<=40;$i++)
        $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
    $pdf->Output('I');

    //$fichero = 'Memoria_grafica.pdf';
    //$pdf->Output($fichero,'D');


    /*$pdf2 = 'archivo.pdf';
    header('Content-type: application/pdf');
    //header('Content-Disposition: attachment; filename="'.$pdf2.'"');
    readfile($pdf);*/

    /*if (file_exists($fichero))
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fichero));
        readfile($fichero);
        exit;
    }*/
    //echo $fichero;

    break;

    case 'get_photos_perMG': // Este metodo ( no es general ) solo sirve si se han seleccionado imagenes en el input
      # code...
      header("Access-Control-Allow-Origin: *");

      $placas     = $_POST["placas"];
      $nombre = "";
      $nombres;
      $data = array();
      foreach ($_FILES["imagenes_add"]["error"] as $clave => $error)
      {
          //if ($error == UPLOAD_ERR_OK)
          //{
              $nombre_tmp = $_FILES["imagenes_add"]["tmp_name"][$clave];
              $nombre .= $_FILES["imagenes_add"]["name"][$clave] .= ",";
              //move_uploaded_file($nombre_tmp,
                //"../js/img/subidas/$nombre");

              $data[]= $_FILES["imagenes_add"]["name"][$clave];
      }
        //print_r($data);
        echo $nombre;

        //echo json_encode($data);
          //}
        //echo "nombres: " .$nombre;

        /*$id_MG = $_POST["id_MG"];
          $conn = new mysqli("127.0.0.1", "root", "", "gruasmancera");
            $result = $conn->query("SELECT ruta_img, placas FROM fotos WHERE id_memoria_grafica = '$id_MG'");
            $resultado= "";
            while($rs = $result->fetch_array(MYSQLI_ASSOC))
            {
                $item_name = $rs["ruta_img"];
                $item_placas = $rs["placas"];

                $check_pic = "img/subidas/$item_name";
                if (file_exists($check_pic))
                {
                    //echo "<img src='img/subidas/$item_name' />";
                    $resultado .= $item_name;
                }
                else{
                  $resultado = "no existe la imagen: $item_name";
                }

            }
            echo "\nResultado: " .$resultado;
          */
        break;

    /*********** NO FUNCIONA ***************/
    case 'get_photos_perMG_1':
      # code...
      header("Access-Control-Allow-Origin: *");

        $id_MG = $_GET['id'];
        $conn = new mysqli("127.0.0.1", "root", "", "gruasmancera");
            $result = $conn->query("SELECT ruta_img, placas FROM fotos WHERE id_memoria_grafica = '$id_MG'");
            $resultado= "";
            while($rs = $result->fetch_array(MYSQLI_ASSOC))
            {
                $item_name = $rs["ruta_img"];
                $item_placas = $rs["placas"];

                $check_pic = "img/subidas/$item_name";
                //if (file_exists($check_pic))
                //{
                    //echo "<img src='img/subidas/$item_name' />";
                    $data = "<li><a href='img/subidas/$item_name' target='_blank'>
                                <img src=\"img/subidas/$item_name\" class= 'responsive-img' height=250px alt='$item_placas' title='#$item_placas' />
                            </a>
                            <div class='caption center-align'>
                                <h3>Auto con placas:</h3>
                                <h5 class='light grey-text text-lighten-3'>$item_placas</h5>
                            </div>
                        </li>
                    ";
                    $resultado = $resultado . $data;
                    /*print "<li><a href='img/subidas/$item_name' target='_blank'>
                            <img src=\"img/subidas/$item_name\" class= 'responsive-img' height=250px alt='$item_placas' title='#$item_placas' />
                              </a>
                                  <div class='caption center-align'>
                                      <h3>Auto con placas:</h3>
                                      <h5 class='light grey-text text-lighten-3'>$item_placas</h5>
                                  </div>
                              </li>
                    ";*/
                //}
              /*else { $data = "<strong>No existe la imagen:$item_name </strong>";
                        $resultado = $resultado . $data;
                  //print "<strong>No existe la imagen:$item_name </strong>";
                }*/
            }
            echo $resultado;

          /*$id_MG = $_GET["id_MG"];
            $result = $conn->query("SELECT ruta_img, placas FROM fotos
                WHERE id_memoria_grafica = '$id_MG'");
            $rutas= array();

            //printf("La seleccion devolvio %d filas.\n",
              //      mysqli_num_rows($result) + "\n\n"
                //);

            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array(
                            $rs["ruta_img"],
                            $rs["placas"]
                            );
                        //printf("rs[id_recibo_efectivo]: " + $rs["id_recibo_efectivo"]);
                array_push($rutas,$data);
            }
            echo json_encode($rutas);
            $conn->close();
          */
        break;

    case 'add_add': // Opcion del metodo de agregar memorias graficas ( boton de mas )
        header("Access-Control-Allow-Origin: *");
        $id = $_GET["cont_inputs"]; //Obtener la cantidad de inputs que hay en la sección para subir imágenes

              $campo_extra =
                    '<div class ="row">
                        <div class="file-field input-field col s12">
                          <div class="btn blue">
                            <span>Seleccione la imagen</span>
                            <input type="file" name="imagenes_add[]" id="imagenes_add_' .$id .'" accept= "image/*" >
                          </div>

                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                        </div>
                      </div>';

        echo ($campo_extra);

        # code...
    break;

    case 'add_mod': // Opcion del metodo de modificar memorias graficas ( boton de mas )
        header("Access-Control-Allow-Origin: *");
        $id = $_GET["cont_inputs"]; //Obtener la cantidad de inputs que hay en la sección para subir imágenes

        $campo_extra =
         '<div class ="row">
            <div class="file-field input-field col s12">
              <div class="btn blue">
                <span>Seleccione la imagen </span>
                <input type="file" name="imagenes_mod[]" id="imagenes_mod_' .$id .'" accept= "image/*">
              </div>

              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>';

        echo ($campo_extra);

        # code...
    break;

    case "show":///-----------------Mostrar Datos
        header("Access-Control-Allow-Origin: *");
            $result = $conn->query("SELECT * FROM memorias_graficas");
            $memorias_graficas= array();

            //printf("La seleccion devolvio %d filas.\n",
              //      mysqli_num_rows($result) + "\n\n"
                //);

            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $data=array(
                            $rs["id_memoria_grafica"],
                            $rs["placas"],
                            $rs["fecha_ingreso"],
                            $rs["fecha_documento"],
                            $rs["cantidad_fotos"]
                            );
                        //printf("rs[id_recibo_efectivo]: " + $rs["id_recibo_efectivo"]);
                array_push($memorias_graficas,$data);
            }
            echo json_encode($memorias_graficas);
            $conn->close();
        break;

    case "store":///-----------------Guardar Datos
        header("Access-Control-Allow-Origin: *"); // Duda
        $img        = $_POST["img"];
        $placas     = $_POST["placas"];
        $fecha_ingreso     = $_POST["fecha_ingreso"];
        $fecha_documento   = $_POST["fecha_documento"];

        $result = $conn->query("SELECT id_vehiculo from vehiculos
                  where placas = '$placas'");
              while($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
                  $id_vehiculo = $rs["id_vehiculo"];
              }

        // ******cantidad_fotos obtenerlo de acuerdo a las fotos guardadas, como ejemplo
        // voy a guardar un texto nadamas ( $img )*******
        $conn->query("INSERT into memorias_graficas(placas,fecha_ingreso,fecha_documento,cantidad_fotos,id_vehiculo)
          values ('$placas','$fecha_ingreso','$fecha_documento','$img','$id_vehiculo')");

        $result = $conn->query("SELECT id_memoria_grafica from memorias_graficas
              ORDER BY id_memoria_grafica desc ");
              if($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
                  $id_MG= $rs["id_memoria_grafica"];
              }

        $conn->close();

        echo $id_MG;
        break;

    case 'upload_images':
      /* esto esta bien
        $placas     = $_POST["placas"];
        foreach ($_FILES["imagenes_add"]["error"] as $clave => $error)
        {
            if ($error == UPLOAD_ERR_OK)
            {
                $nombre_tmp = $_FILES["imagenes_add"]["tmp_name"][$clave];
                $nombre = $_FILES["imagenes_add"]["name"][$clave];
                move_uploaded_file($nombre_tmp,
                  "../img/subidas/$nombre");
            }
        }*/

    //$placas     = $_POST["placas"];

    if( isset($_POST["placas"]) )
    {
      $placas = $_POST["placas"];
      foreach ($_FILES["imagenes_add"]["error"] as $clave => $error)
      {
          $allowedExts = array("gif", "jpeg", "jpg", "png");
          $temp = explode(".", $_FILES["imagenes_add"]["name"][$clave]);
          $extension = end($temp);
          //echo "img_name: " . $_FILES['imagenes_add']['name'][$clave] ." temp: " .$temp[1];
          $imagen="";
          $random=rand(1,9999999);

            if ((($_FILES["imagenes_add"]["type"][$clave] == "image/gif")
              || ($_FILES["imagenes_add"]["type"][$clave] == "image/jpeg")
              || ($_FILES["imagenes_add"]["type"][$clave] == "image/jpg")
              || ($_FILES["imagenes_add"]["type"][$clave] == "image/pjpeg")
              || ($_FILES["imagenes_add"]["type"][$clave] == "image/png")))
            {
              //Verificamos que sea una imagen
                if ($_FILES["imagenes_add"]["error"][$clave] > 0){
                  //verificamos que venga algo en el input file
                  echo "Error numero: " . $_FILES["imagenes_add"]["error"][$clave] . "<br>";
                }
                else{
                  //subimos la imagen
                  $imagen= $placas.'_'.$random.'_'.$_FILES["imagenes_add"]["name"][$clave];
                  if(file_exists("../img/subidas/".$imagen ) ){
                      echo $_FILES["imagenes_add"]["name"][$clave] . " Ya existe. ";
                  }
                  else{
                      //move_uploaded_file($_FILES["imagenes_add"]["tmp_name"],
                        //"../img/subida.'_'.$_FILES["imagenes_add"]["name"]);
                        //echo "Archivo guardado en " . "../img/subida.'_'. $_FILES["imagenes_add"]["name"];

                      $temporal=$_FILES['imagenes_add']['tmp_name'][$clave];
                    //$nombr=$_FILES['file']['name'];
                    if($_FILES["imagenes_add"]["type"][$clave] == "image/jpeg")
                    {
                      $original=imagecreatefromjpeg($temporal);
                    }else if ($_FILES["imagenes_add"]["type"][$clave] == "image/gif")
                    {
                      $original=imagecreatefromgif($temporal);
                    }else if ($_FILES["imagenes_add"]["type"][$clave] == "image/png")
                    {
                      $original=imagecreatefrompng($temporal);
                    }
                    else {die('El formato de la imagen debe ser jpg,jpeg,gif o png');}
                    $ancho_original= imagesx ($original); // 190, 661
                    $alto_original= imagesy ($original); // 190, 1024
                    $ancho_nuevo=560;
                    $alto_nuevo=round ($ancho_nuevo * $alto_original / $ancho_original); // 560 * 190 / 190 = 560, 560 * 1024 / 661 = 867
                    $copia=imagecreatetruecolor($ancho_nuevo,$alto_nuevo);
                    imagecopyresampled($copia, $original, 0,0,0,0, $ancho_nuevo,$alto_nuevo, $ancho_original, $alto_original);
                    imagejpeg($copia,"../img/subidas/".$imagen,100);

                        echo "Placas: " .$placas;

                        $id_MG = $_POST["id_MG"];

                        $thumbnail = "thumbnail_";
                        $img = "";

                        $archivo = $imagen;
                        $img .= $archivo;

                        $thumbnail .= $archivo;

                        $result = $conn->query("SELECT id_vehiculo from vehiculos
                            where placas = '$placas'");
                        while($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
                            $id_vehiculo = $rs["id_vehiculo"];
                        }

                        $conn->query("INSERT into fotos(placas, ruta_img, thumbnail, id_vehiculo,id_memoria_grafica)
                          values ('$placas','$img','$thumbnail', '$id_vehiculo', '$id_MG')");
                        //echo true; // Esto regresa un 1 ( uno )

                        imagedestroy($original);
                        imagedestroy($copia);

                  }
                }
            } // fin if de tipo de imagenes ( gif, jpg, etc.. )
            else{
              echo "Formato no soportado o falta agregar la imagen";
              echo "<script>alert('El registro no se agregó')</script>";
            } // fin else

      } // fin foreach
      $conn->close();
    } // fin if isset($placas)
    else { echo "Por favor inserte las placas"; }

    break;

    case 'upload_images_mod':

      if( isset($_POST["placas"]) )
    {
      $nombre_img = "imagenes_mod";
      $placas = $_POST["placas"];

      $id_MG = $_POST["id_MG"];

      $conn->query("DELETE from fotos WHERE id_memoria_grafica ='$id_MG'");

        // Checar si se ejecuto correctamente la sentencia, si es mayor a 0, se ejecuto correctamente
        if( $conn -> affected_rows > 0 )
           echo " BORRADAS affected_rows: " . $conn -> affected_rows ." ";
         else
           echo false;

      foreach ($_FILES[$nombre_img]["error"] as $clave => $error)
      {
          $allowedExts = array("gif", "jpeg", "jpg", "png");
          $temp = explode(".", $_FILES[$nombre_img]["name"][$clave]); // Es como split en Java
          $extension = end($temp);
          //echo "img_name: " . $_FILES['imagenes_add']['name'][$clave] ." temp: " .$temp[1];
          $imagen="";
          $random=rand(1,999999);

            if ((($_FILES[$nombre_img]["type"][$clave] == "image/gif")
              || ($_FILES[$nombre_img]["type"][$clave] == "image/jpeg")
              || ($_FILES[$nombre_img]["type"][$clave] == "image/jpg")
              || ($_FILES[$nombre_img]["type"][$clave] == "image/pjpeg")
              || ($_FILES[$nombre_img]["type"][$clave] == "image/png")))
            {
              //Verificamos que sea una imagen
                if ($_FILES[$nombre_img]["error"][$clave] > 0){
                  //verificamos que venga algo en el input file
                  echo "Error numero: " . $_FILES[$nombre_img]["error"][$clave] . "<br>";
                }
                else{
                  //subimos la imagen
                  $imagen= $placas.'_'.$random.'_'.$_FILES[$nombre_img]["name"][$clave];
                  if(file_exists("../img/subidas/".$imagen ) ){
                      echo $_FILES[$nombre_img]["name"][$clave] . " Ya existe. ";
                  }
                  else{
                      //move_uploaded_file($_FILES["imagenes_add"]["tmp_name"],
                        //"../img/subida.'_'.$_FILES["imagenes_add"]["name"]);
                        //echo "Archivo guardado en " . "../img/subida.'_'. $_FILES["imagenes_add"]["name"];

                      $temporal=$_FILES[$nombre_img]['tmp_name'][$clave];
                    //$nombr=$_FILES['file']['name'];
                    if($_FILES[$nombre_img]["type"][$clave] == "image/jpeg")
                    {
                      $original=imagecreatefromjpeg($temporal);
                    }else if ($_FILES[$nombre_img]["type"][$clave] == "image/gif")
                    {
                      $original=imagecreatefromgif($temporal);
                    }else if ($_FILES[$nombre_img]["type"][$clave] == "image/png")
                    {
                      $original=imagecreatefrompng($temporal);
                    }
                    else {die('El formato de la imagen debe ser jpg,jpeg,gif o png');}
                    $ancho_original= imagesx ($original); // 190, 661
                    $alto_original= imagesy ($original); // 190, 1024
                    $ancho_nuevo=560;
                    $alto_nuevo=round ($ancho_nuevo * $alto_original / $ancho_original); // 560 * 190 / 190 = 560, 560 * 1024 / 661 = 867
                    $copia=imagecreatetruecolor($ancho_nuevo,$alto_nuevo);
                    imagecopyresampled($copia, $original, 0,0,0,0, $ancho_nuevo,$alto_nuevo, $ancho_original, $alto_original);
                    imagejpeg($copia,"../img/subidas/".$imagen,100);

                        echo " Placas: " .$placas . " ";

                        $thumbnail = "thumbnail_";
                        $img = "";

                        $archivo = $imagen;
                        $img .= $archivo;

                        $thumbnail .= $archivo;

                        $id_vehiculo = getIdVe_perPlacas($placas, $conn);

                        $conn->query("INSERT into fotos (placas ,ruta_img,
                          thumbnail, id_vehiculo, id_memoria_grafica)
                          values('$placas','$img','$thumbnail','$id_vehiculo','$id_MG')");

                        // Checar si se ejecuto correctamente la sentencia, si es mayor a 0, se ejecuto correctamente
                        if( $conn -> affected_rows > 0 )
                        {
                           echo "INSERT FOTOS affected_rows: " . $conn -> affected_rows ." ";
                           //echo true;
                        }
                         else
                           echo false;

                        imagedestroy($original);
                        imagedestroy($copia);
                  } // fin else ( if(file_exists) )
                }
            } // fin if de tipo de imagenes ( gif, jpg, etc.. )
            else{
              echo "Formato no soportado o falta agregar la imagen";
              echo "<script>alert('El registro no se agregó')</script>";
            } // fin else

      } // fin foreach
      $conn->close();
    } // fin if isset($placas)
    else { echo "Por favor inserte las placas"; }


    /*$placas     = $_POST["placas"];
      foreach ($_FILES["imagenes_mod"]["error"] as $clave => $error)
      {
          if ($error == UPLOAD_ERR_OK)
          {
              $nombre_tmp = $_FILES["imagenes_mod"]["tmp_name"][$clave];
              $nombre = $_FILES["imagenes_mod"]["name"][$clave];
              move_uploaded_file($nombre_tmp,
                "../js/img/subidas/$nombre");
          }
      }*/
    break;

    case "update":///-----------------Actualizar Datos
        header("Access-Control-Allow-Origin: *");

            $co = $_POST["co"];
            $cantidad_fotos       = $_POST["cantidad_fotos"];
            $placasActualizar     = $_POST["placasActualizar"];
            $fecha_ingresoActualizar     = $_POST["fecha_ingresoActualizar"];
            $fecha_documentoActualizar   = $_POST["fecha_documentoActualizar"];

            $conn->query("UPDATE memorias_graficas SET cantidad_fotos ='$cantidad_fotos',placas='$placasActualizar',
              fecha_ingreso='$fecha_ingresoActualizar',fecha_documento='$fecha_documentoActualizar'
              WHERE id_memoria_grafica = $co");

             $conn->close();

        break;

    case "delete":///-----------------Eliminar Datos
      header("Access-Control-Allow-Origin: *");
      $nombreliminar = $_POST["nombreliminar"];
      $conn->query("DELETE FROM memorias_graficas
        where id_memoria_grafica='$nombreliminar'");

      $conn->close();
      echo $nombreliminar;
      break;

    case 'search':
       header("Access-Control-Allow-Origin: *");
       //echo '<script language="JavaScript"> alert(" SEARCH "); </script>';

        $memoria_graficaBuscar = $_GET["memoria_graficaBuscar"]; // Dato recibido en la variable $recibo_efectivobuscar metodo GET, desde AJAX de recibo_efectivo.js

        $result = $conn->query("Select * from memorias_graficas
          where placas LIKE '%$memoria_graficaBuscar%'
          || id_memoria_grafica='$memoria_graficaBuscar'");
        $memoria_graficaBuscar = array();
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            $data=array(
                            $rs["id_memoria_grafica"],
                            $rs["fecha_ingreso"],
                            $rs["fecha_documento"],
                            $rs["placas"]
                            );

            array_push($memoria_graficaBuscar,$data);
        }
        echo json_encode($memoria_graficaBuscar);
        $conn->close();

        break;

    case 'get_img_perMg': // Metodo general, ocupa la variable 'id_MG' por POST, que sea NUMERO
          # code...
          $id_MG = $_POST["id_MG"];
          $imagenes = "";

          $result = $conn->query("SELECT ruta_img from fotos
          WHERE id_memoria_grafica = $id_MG");

          while($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
              $imagenes= $imagenes . $rs["ruta_img"] .",=,";
          }

          $conn->close();

          //$imagenes = getImg_perMG($id_MG);
          echo $imagenes;

          break;

    case 'prueba_get_datos':
            # code...
      $id_MG = $_POST["id_MG"];
      //echo "id_MG: " .$id_MG;
      $id_vehiculo = getIdVehiculo_perMG($id_MG, $conn);
      $placas = getPlacas_perIdVe($id_vehiculo, $conn);
      $id_cliente = getIdCliente_perIdVe($id_vehiculo, $conn);
      $cliente = getCliente_perIdCli($id_cliente, $conn);


      echo "id_vehiculo: " .$id_vehiculo;
      echo "\nplacas: " .$placas;
      echo "\nid_cliente: " .$id_cliente;
      echo "\ncliente: " .$cliente;
    break;

    default:
        echo "Conexion a BD";
}

  // Funciones SQL
  function getCliente_perIdCli($idCli, $conn)
  {
    $datos_cliente="";
    $result = $conn->query("SELECT nombre, correo, calle, colonia, ciudad, contacto1, tel_fijo
     from clientes WHERE id_cliente = '$idCli'");

          while($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
              $datos_cliente= $datos_cliente .$rs["nombre"] .",=,";
              $datos_cliente= $datos_cliente .$rs["correo"] .",=,";
              $datos_cliente= $datos_cliente .$rs["calle"] .",=,";
              $datos_cliente= $datos_cliente .$rs["colonia"] .",=,";
              $datos_cliente= $datos_cliente .$rs["ciudad"] .",=,";
              $datos_cliente= $datos_cliente .$rs["tel_fijo"];
          }

    //$conn->close();

    //echo $datos_cliente;
    return $datos_cliente;
  }

  function getIdCliente_perIdVe($idVe, $conn)
  {
    $result = $conn->query("SELECT id_cliente from vehiculos
          WHERE id_vehiculo = '$idVe'");

          if($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
              $id_Cli= $rs["id_cliente"];
          }

    //$conn->close();

    //echo $id_Cli;
    return $id_Cli;
  }

  function getPlacas_perIdVe($idVe, $conn)
  {
    $result = $conn->query("SELECT placas from vehiculos
          WHERE id_vehiculo = '$idVe'");

          if($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
              $placas= $rs["placas"];
          }

    //$conn->close();

    //echo $placas;
    return $placas;
  }

  function getIdVehiculo_perMG($id_MG, $conn)
  {
    $result = $conn->query("SELECT id_vehiculo from memorias_graficas
          WHERE id_memoria_grafica = '$id_MG'");

          if($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
              $id_Ve= $rs["id_vehiculo"];
          }

    //$conn->close();

    //echo $id_Ve;
    return $id_Ve;
  }

  function getIdVe_perPlacas($placas, $conn)
  {
    $result = $conn->query("SELECT id_vehiculo from vehiculos
        where placas = '$placas'");
    while($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
        $id_vehiculo = $rs["id_vehiculo"];
    }
    return $id_vehiculo;
  }

  function getUltimo_idMG( $conn)
  {
    $result = $conn->query("SELECT id_memoria_grafica from memorias_graficas
          ORDER BY id_memoria_grafica desc");

          if($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
              $id_MG= $rs["id_memoria_grafica"];
          }

    //$conn->close();

    echo $id_MG;
    return $id_MG;
  }

  function getImg_perMG($id_MG, $conn)
  {
    $imagenes = "";
    $result = $conn->query("SELECT ruta_img from fotos
          WHERE id_memoria_grafica = $id_MG");

          while($rs = $result->fetch_array(MYSQLI_ASSOC) ) {
              $imagenes= $imagenes . $rs["ruta_img"];
          }

    //$conn->close();

    //echo $imagenes;
    return $imagenes;
  }

  // Checar si se ejecuto correctamente la sentencia, si es mayor a 0, se ejecuto correctamente
  /*if( $conn -> affected_rows > 0 )
     echo true;
   else
     echo false;*/

?>
