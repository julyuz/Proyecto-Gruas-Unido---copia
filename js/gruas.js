var cont_tableAllGruas = 1;
var cont_tableAllOpe= 1;
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

  $('.modal-triggerGetAllGruas').leanModal();
  $('.modal-triggerGetAllOpe').leanModal();

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });


 $.ajax({
     type: "get",
     dataType: 'json',
     url: url + "grua.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
     success: function (data){
      console.log("success show, data: " + data);
      for (var i = 0; i < data.length; i++) {

          $("#muestra").append(
           $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
            "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
            "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
            "</td><td>"+data[i][6]+"</td></tr>"
            )
           );
      }
        $('#example').dataTable();

     } // respuesta de case en table/clientes.php
 });

});//--------------------------END DOCUMENT

function getAllOpe()
{
    //alert("Clickeado!");
    if( cont_tableAllOpe === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "operador.php?met=show",//URL dela funcion a ejecutar en table/operador.php
       success: function (data){
        console.log("*** For ***\ncont_tableAllOpe: " + cont_tableAllOpe);
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );
            $("#tbodyAllOpe").append
              (
                $("<tr onclick='getRowOpe();' ><td>"+data[i][0]+
                "</td><td>"+data[i][1]+
                "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+"</td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllOpe= cont_tableAllOpe + 1;
          $('#tableAllOpe').dataTable();

       }, // respuesta de case en table/clientes.php
       error: /*function (xhr, ajaxOptions, thrownError){
          alert(xhr.status);
          alert(thrownError);
        }*/

        function (request, status, error) {

          console.log(request.responseText);
        }
      });
    }
}

function getAllGruas()
{
  console.log("Clickeado!");
  if(cont_tableAllGruas === 1)
  {
      $.ajax({
       type: "GET",
       dataType: 'json',
       url: url + "grua.php?met=show",
       success: function (data){
        console.log("*** For ***\ncont_tableAllGruas: " + cont_tableAllGruas );
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );

             $("#tbodyAllGruas").append(
               $("<tr onClick='getRowGruas()'> <td>"+data[i][0]+"</td><td>"+data[i][1]+
                "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
                "</td><td>"+data[i][6]+"</td></tr>"
                )
               );

            //console.log("Exito; data.length: " + data.length, 4000);
          } // Fin for
          cont_tableAllGruas = cont_tableAllGruas + 1;
          $('#tableAllGruas').dataTable();
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
  } // Fin if de cont_tableAllGruas
}

function getRowOpe()
{
    //Materialize.toast("Id: " + id, 2400);

    var table = $('#tableAllOpe').DataTable();

        $('#tbodyAllOpe').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila
              var nombre_id = new Array(2);
              var idOpe = registro[0];

              document.getElementById("id_operador").value = idOpe;

              document.getElementById("id_operadorMod").value = idOpe;

              $('#modalGetAllOpe').closeModal(); // Cerrar el modal cuando se seleccione el cliente

        } );
}

function getRowGruas()
{
    var table = $('#tableAllGruas').DataTable();

        $('#tbodyAllGruas').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila

              var id = registro[0];

                  document.getElementById("vbuscar").value = id;

                  document.getElementById("noseliminar").value = id;

              $('#modalGetAllGruas').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function agregargrua(){//Funcion agregar grua


 var placas=document.getElementById("placas").value;
 var tipo=document.getElementById("tipo").value;
 var marca=document.getElementById("marca").value;
 var modelo=document.getElementById("modelo").value;
 var numero=document.getElementById("numero").value;

  var id_operador =document.getElementById("id_operador").value;

    if( placas===""||  tipo===""||marca===""|| modelo===""|| numero===""|| id_operador===""){
       Materialize.toast('Completar campos requeridos', 4000);
   }
   else{

  $data = {
            'placas': placas,
            'tipo': tipo,
            'marca'  : marca,
            'modelo'  : modelo,
            'numero'  : numero,
            'id_operador' : id_operador
          };

  $.ajax({
      type: "POST",
      url: url + "grua.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){
          //location.reload();
          console.log("respuesta: data: " + data);
       } // respuesta de case en table/grua.php
  });

  }
}

function modificargrua(){
  var id = document.getElementById("vbuscar").value;
  var plac = document.getElementById("plac").value;
  var tipoac = document.getElementById("tipoac").value;
  var marcaac = document.getElementById("marcaac").value;
  var modac = document.getElementById("modac").value;
  var numac = document.getElementById("numac").value;

  var id_operador = document.getElementById("id_operadorMod").value;

   if(plac==="" || tipoac=="" || marcaac==="" || modac===""|| numac==="" || id_operador ===""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {

  $data = {
           'id_grua': id,
           'plac'   : plac,
           'tipoac'   : tipoac,
           'marcaac': marcaac,
           'modac'   : modac,
           'numac': numac,
           'id_operador' : id_operador
          };
  $.ajax({
      type: "POST",
      url: url + "grua.php?met=update",//URL dela funcion a ejecutar en table/usuarios.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){ location.reload();
      } // respuesta de case en table/usuarios.php
  });
  }
}

function eliminargrua(){
    var noseliminar=document.getElementById("noseliminar").value;
    if(noseliminar==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {
       $data = { 'noseliminar': noseliminar};

       $.ajax({
           type: "POST",
           url: url + "grua.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
           data: $data, //enviar los datos que colocamos dentro del objeto
           success: function (data){ location.reload();} // respuesta de case en table/clientes.php
       });
    } // fin else

}

function buscargrua(){
  var vbuscar=document.getElementById("vbuscar").value;//Obtener los valores de input y guardarlos en variable
  if (vbuscar === "") { Materialize.toast('Completar campos requeridos', 4000); }
  else
  {
   $data = { 'vbuscar' : vbuscar};

   $.ajax({
       type: "GET",
       dataType: 'json',
       url: url + "grua.php?met=search",//URL dela funcion a ejecutar en table/grua.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
          console.log("data em search: " + data);
            if( data.length > 0)
            {

              // Vacia los datos devueltos a cada campo del formulario
             document.getElementById("plac").value = data[0][0];
             document.getElementById("tipoac").value = data[0][1];
             document.getElementById("marcaac").value = data[0][2];
             document.getElementById("modac").value = data[0][3];
             document.getElementById("numac").value = data[0][4];
           }
           else{ Materialize.toast("No hay registro", 4000); }
        } // respuesta de case en table/grua.php
     });
 }
}

