var cont_tableAllUsers = 1;
$('document').ready(function(e){
 /* $("#eliminar").hide();
  var cookie = document.cookie;
  var data = cookie.split(",");
  if(cookie=="" || cookie=="x"){
    window.location="Login/index.php";
  }
  if(data[2]=="true"){
    $("#eliminar").show();

  }*/

  $('.modal-triggerGetAllRem').leanModal();

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

  console.log("Ready en remolque.js");


 $.ajax({
     type: "get",
     dataType: 'json',
     url: url +"remolque.php?met=show",
     success: function (data){
      console.log("success data: " + data);
      for (var i = 0; i < data.length; i++) {

          $("#tbodyR").append( $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
            "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
            "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
            "</td><td>"+data[i][6]+"</td><td>"+data[i][7]+"</td><td>"+data[i][8]+"</td><td>"+data[i][9]+"</td></tr>"));
        }
        $('#example').dataTable();

     },
     error: function (request, status, error) {
            console.log("\n\n*** Error AJAX ***\n\n" + error);
            //alert(xhr.status);
            //alert(thrownError);
        }
 });

});//--------------------------END DOCUMENT

function getAllRem()
{
    //alert("Clickeado!");
    if(cont_tableAllUsers === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "remolque.php?met=show",
       success: function (data){
        console.log("*** For ***\ncont_tableAllUsers: " + cont_tableAllUsers );
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );

            $("#tbodyAllRem").append
              (
                $(
                    "<tr id ='pointer' onclick='getRowRem();' >"+
                    "<td>"+data[i][0]+"</td><td>"+data[i][1]+
                    "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                    "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
                    "</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
                    "</td><td>"+data[i][8]+"</td><td>"+data[i][9]+
                    "</td></tr>"
                )
              );

            //console.log("Exito; data.length: " + data.length, 4000);
          } // Fin for
          cont_tableAllUsers = cont_tableAllUsers + 1;
          $('#tableAllRem').dataTable();
       },
       error:
       //function (xhr, ajaxOptions, thrownError){
         // alert(xhr.status);
          //alert(thrownError);
        //}

        function (request, status, error) {

          console.log(request.responseText);
        }
      });
  } // Fin if de cont_tableAllUsers
}

function getRowRem()
{
    var table = $('#tableAllRem').DataTable();

        $('#tbodyAllRem').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila

              var id = registro[0];

                  document.getElementById("vbuscar").value = id;

                  document.getElementById("noseliminar").value = id;

              $('#modalGetAllRem').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function agregarremolque(){//Funcion agregar usuario



 var tipo=document.getElementById("tipo").value;
 var marca=document.getElementById("marca").value;
 var modelo=document.getElementById("modelo").value;
 var capacidad=document.getElementById("capacidad").value;
 var serie=document.getElementById("serie").value;
 var tipo_carroceria=document.getElementById("tipo_carroceria").value;
 var pa=document.getElementById("pa").value;
 var ac=document.getElementById("ac").value;
 var no_siniestro=document.getElementById("no_siniestro").value;


    if(   tipo==""||marca==""|| modelo==""|| capacidad==""|| serie==""
      || tipo_carroceria==""|| pa==""|| ac==""|| no_siniestro==""){
       Materialize.toast('Completar campos requeridos', 4000);
   }
   else{

      $data = {
            'tipo': tipo,
            'marca'  : marca,
            'modelo'  : modelo,
            'capacidad'  : capacidad,
            'serie'  : serie,
            'tipo_carroceria'   : tipo_carroceria,
            'pa'  : pa,
            'ac'  : ac,
            'no_siniestro'  : no_siniestro

          };


  $.ajax({
      type: "POST",
      url: url +"remolque.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){
      location.reload();
       } // respuesta de case en table/clientes.php
  });

  }
}

function modificarremolque(){
                                var id_remolques = document.getElementById("id_remolques").value;
                                var tipoActualizar = document.getElementById("tipoActualizar").value;
                                var marcaActualizar = document.getElementById("marcaActualizar").value;
                                var modeloActualizar = document.getElementById("modeloActualizar").value;
                                var capacidadac = document.getElementById("capacidadac").value;
                                var serieac = document.getElementById("serieac").value;
                                var tipo_carrac = document.getElementById("tipo_carrac").value;
                                var paActualizar = document.getElementById("paActualizar").value;
                                var acActualizar = document.getElementById("acActualizar").value;
                                var nsiActualizar = document.getElementById("nsiActualizar").value;


   if(id_remolques=="" || tipoActualizar=="" || marcaActualizar=="" || modeloActualizar==""|| capacidadac==""|| serieac==""
    || tipo_carrac==""|| paActualizar==""|| acActualizar==""|| nsiActualizar==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {

  $data = {
           'id_remolques'   : id_remolques ,
           'tipoActualizar'   : tipoActualizar ,
           'marcaActualizar': marcaActualizar,
           'modeloActualizar'   : modeloActualizar,
            'capacidadac': capacidadac,
            'serieac': serieac,
            'tipo_carrac': tipo_carrac,
            'paActualizar': paActualizar,
            'acActualizar': acActualizar,
            'nsiActualizar': nsiActualizar};
  $.ajax({
      type: "POST",
      url: url +"remolque.php?met=update",//URL dela funcion a ejecutar en table/usuarios.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){ location.reload();
      } // respuesta de case en table/usuarios.php
  });
  }
}

function eliminarremolque(){
    var noseliminar=document.getElementById("noseliminar").value;
    if(noseliminar==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {
   $data = { 'noseliminar': noseliminar};

   $.ajax({
       type: "POST",
       url: url +"remolque.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){ location.reload();} // respuesta de case en table/clientes.php
   });
   } // fin else

}

function buscarremolque(){
  var vbuscar=document.getElementById("vbuscar").value;//Obtener los valores de input y guardarlos en variable

   $data = { 'vbuscar' : vbuscar};
   console.log($data);
   $.ajax({
       type: "GET",
       dataType: 'json',
       url: url +"remolque.php?met=search",//URL dela funcion a ejecutar en table/usuarios.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
                                 document.getElementById("id_remolques").value = data[0][0];
                                 document.getElementById("tipoActualizar").value = data[0][1];
                                 document.getElementById("marcaActualizar").value = data[0][2];
                                 document.getElementById("modeloActualizar").value = data[0][3];
                                 document.getElementById("capacidadac").value = data[0][4];
                                 document.getElementById("serieac").value = data[0][5];
                                 document.getElementById("tipo_carrac").value = data[0][6];
                                 document.getElementById("paActualizar").value = data[0][7];
                                 document.getElementById("acActualizar").value = data[0][8];
                                 document.getElementById("nsiActualizar").value = data[0][9];

                                } // respuesta de case en table/usuarios.php
     });
}
