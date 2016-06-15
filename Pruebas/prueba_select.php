<?php
	include('conexion.php');

	/* Consultas de selección que devuelven un conjunto de resultados */
	//met=show
	/*if($rrr = $conn->query("SELECT * FROM recibos_efectivo") )
    {
         printf("La seleccion devolvio %d filas.\n",
         			mysqli_num_rows($rrr)
         		);
         // liberar el conjunto de resultados
         mysqli_free_result($rrr);

    }*/


    //met =search
    //$recibo_efectivobuscar = $GET["recibo_efectivoBuscar"];
    /*$recibo_efectivobuscar = 2;
    if($r = $conn->query("Select * from recibos_efectivo
          where nombre_cliente LIKE '%$recibo_efectivobuscar%'
          || id_recibo_efectivo='$recibo_efectivobuscar'"))
    {
    	printf("La seleccion devolvio %d filas.\n",
         			mysqli_num_rows($r)
         		);
         // liberar el conjunto de resultados
         mysqli_free_result($r);
    }
    */

    //met = update
    /*$co ="nombre";
    $cantnumeroActualizar = 33;
    $cantletraActualizar = "treinta y tres";
     if($r = $conn->query("UPDATE recibos_efectivo
     	SET cantidad_numero='$cantnumeroActualizar',
              cantidad_letra='$cantletraActualizar'
              where nombre_cliente LIKE '%$co%'") === true)
    {
    	printf("Correcto, : " + $r);
    	//printf("La seleccion devolvio %d filas.\n",
         //			mysqli_num_rows($r)
         	//	);
         // liberar el conjunto de resultados
         //mysqli_free_result($r);
    }*/

    //met = update
    echo '<SCRIPT language="JavaScript"> alert(" Primer linea del update "); </script>';

    $co = 1;
    $fi = "2016/05/01";
    $fd = "2016/05/04";

     if($r = $conn->query("UPDATE recibos_vehiculo
        SET fecha_ingreso='$fi',
              fecha_documento='$fd'
              where id_recibo_vehiculo LIKE '%$co%'") === true)
    {
        printf("Correcto, : " + $r);
        /*printf("La seleccion devolvio %d filas.\n",
                    mysqli_num_rows($r)
                );*/
         // liberar el conjunto de resultados
         //mysqli_free_result($r);
    }


?>