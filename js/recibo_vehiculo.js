var url = "http://127.0.0.1/Recibos_Gruas/table/";

var cont_tableAllClients =1;
var cont_tableAllCars = 1;
var cont_tableAllRE = 1;
var cont_tableAllAtds = 1;
var cont_tableAllRV = 1;

$('document').ready(function(e){
 /* $("#eliminar").hide();
    var cookie = document.cookie;
    var data = cookie.split(",");
    if(cookie=="" || cookie=="x"){
      window.location="Login/index.php";
    }
    if(data[2]=="true"){
      $("#eliminar").show();

    }
  */
  $('.modal-triggerGetAllClients').leanModal(); // Crear el modal con la clase pasada
    $('.modal-triggerGetAllCars').leanModal();
    $('.modal-triggerGetAllRE').leanModal();
    $('.modal-triggerGetAllAtds').leanModal();
    $('.modal-triggerGetAllRV').leanModal();

  // Muestra los recibos vehiculo existentes en cuanto carga la página
   $.ajax({
       type: "get",
       dataType: 'json',
       url: url +"recibos_vehiculo.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){

        for (var i = 0; i < data.length; i++) {

            $("#muestra").append(
             $("<tr><td>"+data[i][0]+"</td><td>"+data[i][1]+
              "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+"</td><td>"+data[i][4]+
              "</td><td>"+data[i][5]+"</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
              "</td><td>"+data[i][8]+"</td><td>"+data[i][9]+"</td><td>"+data[i][10]+
              "</td></tr>")
            );

        }
        $('#example').dataTable();

       }
   });

});//--------------------------END DOCUMENT

function getAllRV()
{
    //alert("Clickeado!");
    if( cont_tableAllRV === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "recibos_vehiculo.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){
        console.log("*** For ***\ncont_tableAllRV: " + cont_tableAllRV );
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );
            $("#tbodyAllRV").append
              (
                $("<tr id ='rv_" + i + "' onclick='getRowRV();' >"+
                     "<td>"+data[i][0]+"</td><td>"+data[i][1]+
                "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
                "</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
                "</td><td>"+data[i][8]+"</td><td>"+data[i][9]+
                "</td><td>"+data[i][10]+"</td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllRV = cont_tableAllRV + 1;
          $('#tableAllRV').dataTable();
       }, // respuesta de case en table/clientes.php
       error:
       //function (xhr, ajaxOptions, thrownError){
         // alert(xhr.status);
          //alert(thrownError);
        //}

        function (request, status, error) {

          console.log(request.responseText);
        }
      });
    }
}

function getRowRV()
{
    var table = $('#tableAllRV').DataTable();

        $('#tbodyAllRV').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila

              document.getElementById("nombreliminar").value = registro[0];
              document.getElementById("co").value = registro[0];
              document.getElementById("suscriptorActualizar").value = registro[1];
              document.getElementById("marcaActualizar").value = registro[2];
              document.getElementById("tipoActualizar").value = registro[3];
              document.getElementById("modeloActualizar").value = registro[4];
              document.getElementById("colorActualizar").value = registro[5];
              document.getElementById("placasActualizar").value = registro[6];
              document.getElementById("fecha_ingresoActualizar").value = registro[7];
              document.getElementById("fecha_documentoActualizar").value = registro[8];
              document.getElementById("autoridadActualizar").value = registro[9];
              document.getElementById("nombreActualizar").value = registro[10];

              $('#modalGetAllRV').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function getAllAtds()
{
    //alert("Clickeado!");
    if( cont_tableAllAtds === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "autoridades.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){
        console.log("*** For ***\ncont_tableAllAtds: " + cont_tableAllAtds );
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );
            $("#tbodyAllAtds").append
              (
                $("<tr id ='atd_" + i + "' onclick='getRowAtd();' ><td>"+data[i][0]+
                "</td><td>"+data[i][1]+"</td><td>"+data[i][2]+
                "</td><td>"+data[i][3]+"</td><td>"+data[i][4]+
                "</td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllAtds = cont_tableAllAtds + 1;
          $('#tableAllAtds').dataTable();
       }, // respuesta de case en table/clientes.php
       error:
          //function (xhr, ajaxOptions, thrownError){
          //  alert(xhr.status);
          //  alert(thrownError);
        //}


        function (request, status, error) {

          console.log(request.responseText);
        }
      });
    }
}

function getRowAtd()
{
    var table = $('#tableAllAtds').DataTable();

        $('#tbodyAllAtds').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila

              document.getElementById("autoridad").value = registro[1];

              $('#modalGetAllAtds').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function getAllCars()
{
    //alert("Clickeado!");
    if( cont_tableAllCars === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "vehiculos.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){
        console.log("*** For ***\ncont_tableAllCars: " + cont_tableAllCars );
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );
            $("#tbodyAllCars").append
              (
                $("<tr id ='car_" + i + "' onclick='getRowCar();' >"+
                     "<td>"+data[i][0]+"</td><td>"+data[i][1]+
                "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
                "</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
                "</td><td>"+data[i][11]+"</td><td>"+data[i][12]+"</td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllCars = cont_tableAllCars + 1;
          $('#tableAllCars').dataTable();
       }, // respuesta de case en table/clientes.php
       error:
       //function (xhr, ajaxOptions, thrownError){
         // alert(xhr.status);
          //alert(thrownError);
        //}

        function (request, status, error) {

          console.log(request.responseText);
        }
      });
    }
}

function getRowCar()
{
    var table = $('#tableAllCars').DataTable();

        $('#tbodyAllCars').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila

              var placas = registro[0];
              var marca = registro[1];
              var tipo = registro[2];
              var modelo = registro[3];
              var fin = registro[5];
              var fsa = registro[6];
              var color = registro[7];
              var nombre_cliente = registro[9];

              document.getElementById("placas").value = placas;
              document.getElementById("marca").value = marca;
              document.getElementById("tipo").value = tipo;
              document.getElementById("modelo").value = modelo;
              document.getElementById("fecha_ingreso").value = fin;
              document.getElementById("fecha_documento").value = fsa;
              document.getElementById("color").value = color;
              document.getElementById("nombre").value = nombre_cliente;

              $('#modalGetAllCars').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function agregarRecibo_vehiculo(){//Funcion agregar recibos_efectivo

  var suscriptor=document.getElementById("suscriptor").value;
  var marca=document.getElementById("marca").value;
  var tipo=document.getElementById("tipo").value;
  var modelo=document.getElementById("modelo").value;
  var color=document.getElementById("color").value;
  var placas=document.getElementById("placas").value;
  var fecha_ingreso=document.getElementById("fecha_ingreso").value;
  var fecha_documento=document.getElementById("fecha_documento").value;
  var autoridad=document.getElementById("autoridad").value;
  var nombre = document.getElementById("nombre").value;

    if( nombre=="" || suscriptor==""|| placas==""|| marca==""|| tipo==""
      || modelo=="" || color =="" || fecha_ingreso==""|| fecha_documento==""|| autoridad==""){
      Materialize.toast('Completar campos requeridos', 4000);

   }
   else{

      $data = {
                'nombre'   : nombre,///Colocar los parametros en un objeto
                'suscriptor': suscriptor,
                'placas': placas,
                'marca': marca,
                'tipo': tipo,

                'modelo': modelo,
                'color': color,
                'fecha_ingreso': fecha_ingreso,
                'fecha_documento': fecha_documento,
                'autoridad': autoridad
              };

      $.ajax({
          type: "POST",
          url: url +"recibos_vehiculo.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
          data: $data, //enviar los datos que colocamos dentro del objeto
          success: function (data){
            location.reload();
            console.log("Data: " + data);
          },
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

function modificarRecibo_vehiculo(){
    var co=document.getElementById("co").value;
    console.log("Co: " + co  +"\n");

    var suscriptorActualizar=document.getElementById("suscriptorActualizar").value;
    var marcaActualizar=document.getElementById("marcaActualizar").value;
    var tipoActualizar=document.getElementById("tipoActualizar").value;
    var modeloActualizar=document.getElementById("modeloActualizar").value;
    var colorActualizar=document.getElementById("colorActualizar").value;

    var placasActualizar=document.getElementById("placasActualizar").value;
    var fecha_ingresoActualizar=document.getElementById("fecha_ingresoActualizar").value;
    var fecha_documentoActualizar=document.getElementById("fecha_documentoActualizar").value;
    var autoridadActualizar=document.getElementById("autoridadActualizar").value;
    var nombreActualizar=document.getElementById("nombreActualizar").value;

    if( nombreActualizar=="" || suscriptorActualizar==""|| placasActualizar==""|| marcaActualizar==""|| tipoActualizar==""
      || modeloActualizar=="" || colorActualizar =="" || fecha_ingresoActualizar==""|| fecha_documentoActualizar==""|| autoridadActualizar==""){
      Materialize.toast('Completar campos requeridos', 4000);

   }
   else{

      $data = {
                'co'  : co,
                'nombreActualizar'   : nombreActualizar,///Colocar los parametros en un objeto
                'suscriptorActualizar': suscriptorActualizar,
                'placasActualizar': placasActualizar,
                'marcaActualizar': marcaActualizar,
                'tipoActualizar': tipoActualizar,

                'modeloActualizar': modeloActualizar,
                'color': colorActualizar,
                'fecha_ingresoActualizar': fecha_ingresoActualizar,
                'fecha_documentoActualizar': fecha_documentoActualizar,
                'autoridadActualizar': autoridadActualizar
              };

      $.ajax({
          type: "POST",
          url: "http://127.0.0.1/Recibos_Gruas/table/recibos_vehiculo.php?met=update",//URL dela funcion a ejecutar en table/clientes.php
          data: $data, //enviar los datos que colocamos dentro del objeto
          success: function (data){
             Materialize.toast("Actualizado", 3000);
             location.reload();
          } // respuesta de case en table/recibos_vehiculo.php
      });

    }
}

function eliminarRecibo_vehiculo(){
    var nombreliminar=document.getElementById("nombreliminar").value;
    if(nombreliminar===""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
    } else {
     $data = { 'nombreliminar': nombreliminar };

     $.ajax({
         type: "POST",
         url: "http://127.0.0.1/Recibos_Gruas/table/recibos_vehiculo.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
         data: $data, //enviar los datos que colocamos dentro del objeto
         success: function (data){ location.reload();} // respuesta de case en table/clientes.php
     });
   }
}

function buscarRecibo_vehiculo(){
   var recibo_vehiculoBuscar=document.getElementById("recibo_vehiculoBuscar").value;//Obtener los valores de input y guardarlos en variable
   $data = { 'recibo_vehiculoBuscar' : recibo_vehiculoBuscar };
   console.log("recibo_vehiculoBuscar: " + $data.recibo_vehiculoBuscar);
    //console.log("\n nombreActualizar: " + document.getElementById("nombreActualizar").value);
   $.ajax({
       type: "GET",
       dataType: 'json',
       url: "http://127.0.0.1/Recibos_Gruas/table/recibos_vehiculo.php?met=search",
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
          Materialize.toast("Correcto", 2000);

          document.getElementById("co").value = data[0][0];
          document.getElementById("suscriptorActualizar").value = data[0][1];
          document.getElementById("marcaActualizar").value = data[0][2];
          document.getElementById("tipoActualizar").value = data[0][3];
          document.getElementById("modeloActualizar").value = data[0][4];
          document.getElementById("colorActualizar").value = data[0][5];
          document.getElementById("placasActualizar").value = data[0][6];
          document.getElementById("fecha_ingresoActualizar").value = data[0][7];
          document.getElementById("fecha_documentoActualizar").value = data[0][8];
          document.getElementById("autoridadActualizar").value = data[0][9];
          document.getElementById("nombreActualizar").value = data[0][10];

       } // respuesta de case en table/recibos_efectivo.php
     });
}
