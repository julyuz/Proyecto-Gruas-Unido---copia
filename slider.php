

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="en">
<head>
    <title>Nivo and Materialize Slider</title>

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script src="js/memoria_grafica.js"></script>

    <script type="text/javascript">
    $('document').ready(function(e) {
        $('.slider').slider();

        $('#slider').nivoSlider(
        /*effect: 'random',
            slices: 15,
            boxCols: 8,
            boxRows: 4,
            animSpeed: 500,
            pauseTime: 3000,
            startSlide: 0,
            directionNav: true,
            controlNav: true,
            controlNavThumbs: false,
            pauseOnHover: true,
            manualAdvance: false,
            prevText: 'Prev',
            nextText: 'Next',
            randomStart: false,
            beforeChange: function(){},
            afterChange: function(){},
            slideshowEnd: function(){},
            lastSlide: function(){},
            afterLoad: function(){}
            */
        );
    });
    </script>

    <!-- Estilos del NivoSlider -->
    <link rel="stylesheet" href="css/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" /
    <link rel="stylesheet" href="css/styleNivo.css" type="text/css" media="screen" />
</head>
<body>
    <div id="wrapper">
        <div class="row">
            <div class="col s12">

                <a href="memoria.php" class="btn green waves-effect">REGRESAR</a>
                <a href="#!" onclick="alerta()" class="btn purple">Alerta</a>
            </div>

        </div>

        <div class="row">
            <div class="col s12">
                <h2>Lista de imágenes</h2>
            </div>
        </div>

        <div class="slider-wrapper theme-default">
                <div id="slider" class="nivoSlider">

                    <img src="img/walle.jpg" height="auto" data-thumb="img/walle.jpg" alt="" data-transition="slideInLeft" />
                    <img src="img/nemo.jpg" height="auto" data-thumb="img/nemo.jpg" />


                    <!--<?php
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
                                    print "<a href='img/subidas/$item_name' target='_blank'>
                                            <img src=\"img\subidas/$item_name\" class= 'responsive-img' height=250px alt='$item_placas' title='#$item_placas' />
                                        </a>
                                    ";
                                    //$i++;
                                }
                            /*else
                                {
                                    print "<strong>No exista la imagen:$item_name </strong>";
                                }*/
                            }
                    ?>-->
                </div>

                <!--<?php
                    $id_MG = $_GET['id'];
                    //include 'table/conexion.php';
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
                            print "
                                <div id='$item_placas' class='nivo-html-caption'>
                                    <strong>Vehículo con placas: $item_placas
                                </div>";
                        }
                    }
                ?>-->
        </div>

    <div class="row">
            <div class="col s12">

                <section id="slider2">
            <div class="slider" id="slidesMateria">
                <ul class="slides" id="slidesMaterial">
                    <li>
                        <img src="img/walle.jpg" data-thumb="img/walle.jpg" alt="" data-transition="slideInLeft" />
                    </li>
                    <li>
                        <img class="materialboxed" src="http://lorempixel.com/580/250/nature/3"> <!-- random image -->
                        <div class="caption right-align">
                            <h3>Right Aligned Caption</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                    </li>
                    <li>
                        <img class="materialboxed" src="http://lorempixel.com/580/250/nature/4"> <!-- random image -->
                        <div class="caption center-align">
                            <h3>This is our big Tagline!</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                    </li>



                </ul>
            </div>

        </section>

    </div>

</body>
</html>