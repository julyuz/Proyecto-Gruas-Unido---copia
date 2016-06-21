
var cont_tableAllClients = 1;
var cont_tableAllCars = 1;
var cont_tableAllRE = 1;

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

  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-triggerGetAllClients').leanModal(); // Crear el modal con la clase pasada
    $('.modal-triggerGetAllCars').leanModal();
    $('.modal-triggerGetAllRE').leanModal();

  // Muestra los recibos efectivo existentes en cuanto carga la página
   $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "recibos_efectivo.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){

          for (var i = 0; i < data.length; i++) {

              $("#muestra").append(
               $("<tr><td>"+data[i][0]+"</td><td>"+data[i][1]+
              	"</td><td>"+data[i][2]+"</td><td>"+data[i][3]+"</td><td>"+data[i][4]+
                "</td><td>"+data[i][5]+"</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
                "</td><td>"+data[i][8]+"</td><td>"+data[i][9]+"</td><td>"+data[i][10]+
                "</td><td>"+data[i][11]+"</td></tr>")
              );
          }
          $('#example').dataTable();
       },
       error: /*function (xhr, ajaxOptions, thrownError){
          alert(xhr.status);
          alert(thrownError);
        }*/

        function (request, status, error) {

          console.log(request.responseText);
        }
   });

});//--------------------------END DOCUMENT

function getid_vehiculo(placas)
{
  console.log("Primera linea, placas: " + placas);
  $data = { 'placas' : placas };
  $.ajax({
       type: "GET",
       dataType: 'json',
       url: url + "recibos_efectivo.php?met=getid_vehiculo",
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
          Materialize.toast("Correcto", 2000);

          document.getElementById("id_vehiculo").value = data;

       }, // respuesta de case en table/recibos_efectivo.php
       error: /*function (xhr, ajaxOptions, thrownError){
          alert(xhr.status);
          alert(thrownError);
        }*/

        function (request, status, error) {

          console.log(request.responseText);
        }
     });
}

function getAllRE(accio)
{
    //alert("Clickeado!");
    var accion = this.accio;

    if( cont_tableAllRE === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "recibos_efectivo.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){
        console.log("*** For ***\ncont_tableAllRE: " + cont_tableAllRE + " accion: " + accio);
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );
            $("#tbodyAllRE").append
              (
                $("<tr id ='re_" + i + "' onclick='getRowRE()'; ><td>"+data[i][0]+
                "</td><td>"+data[i][1]+
                "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
                "</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
                "</td><td>"+data[i][8]+"</td><td>"+data[i][9]+
                "</td><td>"+data[i][10]+"</td><td>"+data[i][11]+"</td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllRE = cont_tableAllRE + 1;
          $('#tableAllRE').dataTable();
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
function getRowRE()
{
    var table = $('#tableAllRE').DataTable();
    //console.log("Accion: " + accion);

        $('#tbodyAllRE').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila

              /*if ( accion === "eliminar") {

              }
              else
              {
              }*/
                document.getElementById("nombreliminar").value = registro[0];
                document.getElementById("co").value = registro[0];
                document.getElementById("nombreActualizar").value = registro[1];
                document.getElementById("cantnumeroActualizar").value = registro[2];
                document.getElementById("cantletraActualizar").value = registro[3];
                document.getElementById("placasActualizar").value = registro[4];
                document.getElementById("marcaActualizar").value = registro[5];
                document.getElementById("tipoActualizar").value = registro[6];
                document.getElementById("modeloActualizar").value = registro[7];
                document.getElementById("fecha_ingresoActualizar").value = registro[8];
                document.getElementById("fecha_documentoActualizar").value = registro[9];
                document.getElementById("receptorActualizar").value = registro[10];
                document.getElementById("descripcionActualizar").value = registro[11];
              $('#modalGetAllRE').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function getAllCars() // Funcion para obtener todos los clientes de la tabla 'clientes'
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
                $("<tr id ='cliente_" + i + "' onclick='getRowCar();' ><td>"+data[i][0]+
                "</td><td>"+data[i][1]+
                "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
                "</td><td>"+data[i][6]+"</td><td>"+data[i][11]+
                "</td><td>"+data[i][12]+"</td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllCars = cont_tableAllCars + 1;
          $('#tableAllCars').dataTable();
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
              var nombre_cliente = registro[8];

              document.getElementById("placas").value = placas;
              document.getElementById("marca").value = marca;
              document.getElementById("tipo").value = tipo;
              document.getElementById("modelo").value = modelo;
              document.getElementById("fecha_ingreso").value = fin;
              document.getElementById("fecha_documento").value = fsa;
              document.getElementById("nombre").value = nombre_cliente;

              $('#modalGetAllCars').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function getAllClients() // Funcion para obtener todos los clientes de la tabla 'clientes'
{
    //alert("Clickeado!");
    if( cont_tableAllClients === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "clientes.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){
        console.log("*** For ***\ncont_tableAllClients: " + cont_tableAllClients );
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );
            $("#tbodyAllClients").append
              (
                $("<tr id ='cliente_" + i + "' onclick='getRowClient();' ><td>"+data[i][0]+
                "</td><td>"+data[i][1]+
                "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                "</td><td>"+data[i][4]+"</td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllClients = cont_tableAllClients + 1;
          $('#tableAllClients').dataTable();
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

function getRowClient()
{
    //Materialize.toast("Id: " + id, 2400);

    var table = $('#tableAllClients').DataTable();

        $('#tbodyAllClients').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila
              var nombre_id = new Array(2);
              var nombre = registro[1];

              document.getElementById("nombre").value = nombre;

              $('#modalGetAllClients').closeModal(); // Cerrar el modal cuando se seleccione el cliente

        } );
}

function agregarRecibo_efectivo(){//Funcion agregar recibos_efectivo

  var nombre=document.getElementById("nombre").value;
  var cantnumero=document.getElementById("cantnumero").value;
  var cantletra=document.getElementById("cantletra").value;
  console.log("Cantletra: " + cantletra);
  var placas=document.getElementById("placas").value;
  var marca=document.getElementById("marca").value;
  var tipo=document.getElementById("tipo").value;
  var modelo=document.getElementById("modelo").value;
  var fecha_ingreso=document.getElementById("fecha_ingreso").value;
  var fecha_documento=document.getElementById("fecha_documento").value;
  var receptor=document.getElementById("receptor").value;
  var descripcion=document.getElementById("descripcion").value;

    if( nombre=="" || cantnumero==""|| cantletra==""|| placas==""|| marca==""|| tipo==""
      || modelo=="" || fecha_ingreso==""|| fecha_documento==""|| receptor==""|| descripcion==""){
      Materialize.toast('Completar campos requeridos', 4000);

   }
   else{

      $data = { 'nombre'   : nombre,///Colocar los parametros en un objeto
                'cantnumero': cantnumero,
                'cantletra': cantletra,
                'placas': placas,
                'marca': marca,

                'tipo': tipo,
                'modelo': modelo,
                'fecha_ingreso': fecha_ingreso,
                'fecha_documento': fecha_documento,
                'receptor': receptor,
                'descripcion': descripcion
              };


      $.ajax({
          type: "POST",
          url: url + "recibos_efectivo.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
          data: $data, //enviar los datos que colocamos dentro del objeto
          success: function (data){
              location.reload();
              console.log("respuesta: " +data);
          }, // respuesta de case en table/clientes.php
          error: /*function (xhr, ajaxOptions, thrownError){
              alert(xhr.status);
              alert(thrownError);
            }*/
            function (request, status, error) { console.log(request.responseText); }
      });

    }
}

function modificarRecibo_efectivo(){
    var co=document.getElementById("co").value;
    console.log("Co: " + co  +"\n");
    var nombreActualizar=document.getElementById("nombreActualizar").value;
    var cantnumeroActualizar=document.getElementById("cantnumeroActualizar").value;
    var cantletraActualizar=document.getElementById("cantletraActualizar").value;
    console.log("cantletraActualizar: " + cantletraActualizar +"\n");
    var placasActualizar=document.getElementById("placasActualizar").value;
    var marcaActualizar=document.getElementById("marcaActualizar").value;
    var tipoActualizar=document.getElementById("tipoActualizar").value;
    var modeloActualizar=document.getElementById("modeloActualizar").value;
    var fecha_ingresoActualizar=document.getElementById("fecha_ingresoActualizar").value;
    var fecha_documentoActualizar=document.getElementById("fecha_documentoActualizar").value;
    var receptorActualizar=document.getElementById("receptorActualizar").value;
    var descripcionActualizar=document.getElementById("descripcionActualizar").value;

    if( nombreActualizar=="" || cantnumeroActualizar==""|| cantletraActualizar==""|| placasActualizar==""|| marcaActualizar==""|| tipoActualizar==""
      || modeloActualizar=="" || fecha_ingresoActualizar==""|| fecha_documentoActualizar==""|| receptorActualizar==""|| descripcionActualizar==""){
      Materialize.toast('Completar campos requeridos', 4000);
    }

    else{

      $data = {
                'co'   : co,
                'nombreActualizar'   : nombreActualizar,///Colocar los parametros en un objeto
                'cantnumeroActualizar': cantnumeroActualizar,
                'cantletraActualizar': cantletraActualizar,
                'placasActualizar': placasActualizar,
                'marcaActualizar': marcaActualizar,
                'tipoActualizar': tipoActualizar,

                'modeloActualizar': modeloActualizar,
                'fecha_ingresoActualizar': fecha_ingresoActualizar,
                'fecha_documentoActualizar': fecha_documentoActualizar,
                'receptorActualizar': receptorActualizar,
                'descripcionActualizar': descripcionActualizar
              };


      $.ajax({
          type: "POST",
          url: url + "recibos_efectivo.php?met=update",//URL dela funcion a ejecutar en table/clientes.php
          data: $data, //enviar los datos que colocamos dentro del objeto
          success: function (data)
          {
            Materialize.toast("Actualizado", 3000);
            location.reload();
          }
      });

    }
}

function eliminarRecibo_efectivo(){
    var nombreliminar=document.getElementById("nombreliminar").value;
    if(nombreliminar==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
    } else {
     $data = { 'nombreliminar': nombreliminar };

     $.ajax({
         type: "POST",
         url: url + "recibos_efectivo.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
         data: $data, //enviar los datos que colocamos dentro del objeto
         success: function (data){ location.reload();} // respuesta de case en table/clientes.php
     });
   }
}

function buscarRecibo_efectivo(){
   var recibo_efectivoBuscar=document.getElementById("recibo_efectivoBuscar").value;//Obtener los valores de input y guardarlos en variable
   $data = { 'recibo_efectivoBuscar' : recibo_efectivoBuscar };
   console.log("recibo_efectivoBuscar: " + $data.recibo_efectivoBuscar);
    //console.log("\n nombreActualizar: " + document.getElementById("nombreActualizar").value);
   $.ajax({
       type: "GET",
       dataType: 'json',
       url: url + "recibos_efectivo.php?met=search",
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
          Materialize.toast("Correcto", 2000);

          document.getElementById("co").value = data[0][0];
          document.getElementById("nombreActualizar").value = data[0][1];
          document.getElementById("cantnumeroActualizar").value = data[0][2];
          document.getElementById("cantletraActualizar").value = data[0][3];
          document.getElementById("placasActualizar").value = data[0][4];
          document.getElementById("marcaActualizar").value = data[0][5];
          document.getElementById("tipoActualizar").value = data[0][6];
          document.getElementById("modeloActualizar").value = data[0][7];
          document.getElementById("fecha_ingresoActualizar").value = data[0][8];
          document.getElementById("fecha_documentoActualizar").value = data[0][9];
          document.getElementById("receptorActualizar").value = data[0][10];
          document.getElementById("descripcionActualizar").value = data[0][11];

       } // respuesta de case en table/recibos_efectivo.php
     });
}

