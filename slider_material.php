<!DOCTYPE>
<html lang="en">
<head>
    <title>Lista de imágenes</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    <script src="js/materialize.min.js"></script>

</head>
<body>
    <div id="row">
        <div class="row"></div>
        <div class="row">
            <div class="col s12">
                <a href="memoria.php" class="btn green waves-effect">REGRESAR</a>
            </div>

        </div>

        <div class="row">
            <div class="col s12">
                <h2 style="color: #5CC6D0;">Lista de imágenes</h2>
            </div>
        </div>

        <div class="row">
            <div class="col l2"><label for=""class ="white-text">AA</label></div>
            <div class="col s12 l8 offset-l2">

                <section id="slider2">
                    <div class="slider">
                        <ul class="slides">
                            <!--<li>
                                <img src="img/walle.jpg" data-thumb="img/walle.jpg" min-width="100%" alt="" />
                            </li>
                            <li>
                                <img src="img/nemo.jpg" data-thumb="img/nemo.jpg" />
                            </li>
                            <li>
                                <img class="materialboxed" src="http://lorempixel.com/580/250/nature/1">
                                <div class="caption center-align">
                                    <h3>This is our big Tagline!</h3>
                                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                </div>
                            </li>
                            <li>
                                <img class="materialboxed" src="http://lorempixel.com/580/250/nature/2">
                                <div class="caption left-align">
                                    <h3>Left Aligned Caption</h3>
                                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                </div>
                            </li>
                            <li>
                                <img class="materialboxed" src="http://lorempixel.com/580/250/nature/3">
                                <div class="caption right-align">
                                    <h3>Right Aligned Caption</h3>
                                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                </div>
                            </li>
                            <li>
                                <img class="materialboxed" src="http://lorempixel.com/580/250/nature/4">
                                <div class="caption center-align">
                                    <h3>This is our big Tagline!</h3>
                                    <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                </div>
                            </li>
                        -->

                            <?php
                                global $no_hay_img;
                                $id_MG = $_GET['id'];
                                $conn = new mysqli("127.0.0.1", "root", "", "gruasmancera");
                                    $result = $conn->query("SELECT ruta_img, placas FROM fotos WHERE id_memoria_grafica = '$id_MG'");
                                    //$rutas= array();
                                    while($rs = $result->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $item_name = $rs["ruta_img"];
                                        $item_placas = $rs["placas"];

                                        $check_pic = "img/subidas/$item_name";
                                        if (file_exists($check_pic))
                                        {
                                            //echo "<img src='img/subidas/$item_name' />";
                                            print "<li><a href='img/subidas/$item_name' target='_blank'>
                                                    <img src=\"img/subidas/$item_name\" height=250px alt='$item_placas' title='#$item_placas' />
                                                </a>
                                                    <div class='caption center-align'>
                                                        <h3>Auto con placas:</h3>
                                                        <h5 class='light grey-text text-lighten-3'>$item_placas</h5>
                                                    </div>
                                                </li>
                                            ";
                                            //$i++;
                                        }
                                        else
                                        {
                                            $error = "<strong>No existe la imagen: " .$item_name ."</strong>";
                                            print $error;
                                            $no_hay_img = true;
                                        }
                                    }
                            ?>

                        </ul>
                    </div>

                </section>

            </div>
        </div>

    </div> <!-- fin row -->

    <div class="row">
        <div class="col s12">
            <?php
                if($no_hay_img == true)
                {
                    print $error;
                }
            ?>
        </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){

        $('.slider').slider( { full_width: true } );
        $('.materialboxed').materialbox();

    });
    </script>

</body>
</html>