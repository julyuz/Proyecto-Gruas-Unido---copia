var cont_tableAllAutoridad= 1;
var cont_tableAllClients = 1;
var cont_tableAllCars = 1;

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

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-triggerGetAllClients').leanModal(); // Crear el modal con la clase pasada
    $('.modal-triggerGetAllCars').leanModal();
    $('.modal-triggerGetAllAutoridades').leanModal();

 $.ajax({
     type: "get",
     dataType: 'json',
     url: url + "vehiculos.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
     success: function (data){
      console.log("*** For ***");
      for (var i = 0; i < data.length; i++) {
          //console.log("getClient: " + getClient(data[i][1] ) );
          $("#tbodyVehiculos").append
            (
              $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
              "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
              "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
              "</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
              "</td><td>"+data[i][8]+"</td><td>"+data[i][9]+"</td></tr>"
              )
            );
          //console.log("Exito; data.length: " + data.length, 4000);
        }
        $('#example').dataTable();

     }, // respuesta de case en table/clientes.php
     error: /*function (xhr, ajaxOptions, thrownError){
        alert(xhr.status);
        alert(thrownError);
      }*/

      function (request, status, error) {

        console.log(request.responseText);
      }
 });

});//--------------------------END DOCUMENT

function getAllAutoridades()
{
    //alert("Clickeado!");
    if( cont_tableAllAutoridad === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "autoridades.php?met=show",//URL dela funcion a ejecutar en table/Autoridadrador.php
       success: function (data){
        console.log("*** For ***\ncont_tableAllAutoridad: " + cont_tableAllAutoridad);
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );
            var img_autoridad = data[i][12];
            var ruta_img = "img/subidas/logos/"+img_autoridad;
            $("#tbodyAllAutoridades").append
              (
                $("<tr onclick='getRowAutoridad();' ><td>"+data[i][0]+
                "</td><td>"+data[i][1]+
                "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                "</td><td>"+data[i][4]+"</td><td>"+data[i][11]+
                "</td><td><img class='responsive-img_1' src='"+ruta_img+"' /></td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllAutoridad= cont_tableAllAutoridad + 1;
          $('#tableAllAutoridades').dataTable();

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

function getRowAutoridad()
{
    //Materialize.toast("Id: " + id, 2400);

    var table = $('#tableAllAutoridades').DataTable();

        $('#tbodyAllAutoridades').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila
              var nombre_id = new Array(2);
              var nomAutoridad = registro[1];

              document.getElementById("autoridad_intervino").value = nomAutoridad;

              document.getElementById("aiActualizar").value = nomAutoridad;

              $('#modalGetAllAutoridades').closeModal(); // Cerrar el modal cuando se seleccione el cliente

        } );
}

function getAllCars()
{
  if( cont_tableAllCars === 1)
  {
    $.ajax({
     type: "get",
     dataType: 'json',
     url: url + "vehiculos.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
     success: function (data){
      console.log("*** For ***");
      for (var i = 0; i < data.length; i++) {
          //console.log("getClient: " + getClient(data[i][1] ) );
          $("#tbodyAllCars").append
            (
              $("<tr id ='vehiculo_" + i + "' onclick='getRowCar();'> <td>"+data[i][0]+"</td><td>"+data[i][1]+
              "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
              "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
              "</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
              "</td><td>"+ data[i][8]  + "</td></tr>"
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

function getRowCar()
{
    var table = $('#tableAllCars').DataTable();

        $('#tbodyAllCars').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila

              var placas = registro[0];
              document.getElementById("vbuscar").value = placas;
              document.getElementById("noseliminar").value = placas;

              $('#modalGetAllCars').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function getRowClient()
{
    //Materialize.toast("Id: " + id, 2400);

    var table = $('#tableAllClients').DataTable();

        $('#tbodyAllClients').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila
              var nombre_id = new Array(2);
              var idCliente = registro[0];
              var nombre = registro[1];

              document.getElementById("codigo").value = idCliente;
              document.getElementById("nombreCliente").value = nombre;

              $('#modalGetAllClients').closeModal(); // Cerrar el modal cuando se seleccione el cliente

        } );
}

function agregarvehiculo(){//Funcion agregar vehiculo

 var placas=document.getElementById("placas").value;
 var codigo=document.getElementById("codigo").value;
 var marca=document.getElementById("marca").value;
 var tipo=document.getElementById("tipo").value;
 var color=document.getElementById("color").value;
 var modelo=document.getElementById("modelo").value;
 var num_serie_vehiculo=document.getElementById("num_serie_vehiculo").value;
 var num_serie_motor=document.getElementById("num_serie_motor").value;
 var observacion=document.getElementById("observacion").value;
 var autoridad_intervino=document.getElementById("autoridad_intervino").value;
 var motivo=document.getElementById("motivo").value;
 var fecha_ingreso=document.getElementById("fecha_ingreso").value;
 var fecha_salida=document.getElementById("fecha_salida").value;
 var aseguradora=document.getElementById("aseguradora").value;
 var ajustador=document.getElementById("ajustador").value;
 var tel_ajustador=document.getElementById("tel_ajustador").value;
 var num_economico=document.getElementById("num_economico").value;
 var razon_social=document.getElementById("razon_social").value;
 var pa=document.getElementById("pa").value;
 var ac=document.getElementById("ac").value;
 var no_siniestro=document.getElementById("no_siniestro").value;


    if( placas==""|| codigo=="" || marca==""|| tipo==""|| color==""|| modelo==""|| num_serie_vehiculo==""|| num_serie_motor==""
      || observacion==""|| autoridad_intervino==""|| motivo==""|| fecha_ingreso==""|| fecha_salida==""|| aseguradora==""|| ajustador==""|| tel_ajustador==""
      || num_economico==""|| razon_social==""|| pa==""|| ac==""|| no_siniestro==""){
       Materialize.toast('Completar campos requeridos', 4000);
   }
   else{

  $data = {
            'placas'  : placas,
            'codigo'   : codigo,
            'marca'  : marca,
            'tipo': tipo,
            'color': color,
            'modelo'  : modelo,
            'num_serie_vehiculo'  : num_serie_vehiculo,
            'num_serie_motor'  : num_serie_motor,
            'observacion'   : observacion,
            'autoridad_intervino'   : autoridad_intervino,
            'motivo'   : motivo,
            'fecha_ingreso'   : fecha_ingreso,
            'fecha_salida'   : fecha_salida,
            'aseguradora'   : aseguradora,
            'ajustador'   : ajustador,
            'tel_ajustador'   : tel_ajustador,
            'num_economico'   : num_economico,
            'razon_social'   : razon_social,
            'pa'  : pa,
            'ac'  : ac,
            'no_siniestro'  : no_siniestro

          };


  $.ajax({
      type: "POST",
      url: "http://127.0.0.1/Recibos_Gruas/table/vehiculos.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){
       console.log(fecha_salida);
       console.log(fecha_ingreso);
      location.reload();
       } // respuesta de case en table/clientes.php
  });

  }
}

function modificarvehiculo(){
  var placasac = document.getElementById("placasac").value;
  var codigoac = document.getElementById("codigoac").value;
  var marcaActualizar = document.getElementById("marcaActualizar").value;
  var tipoActualizar = document.getElementById("tipoActualizar").value;
  var colorActualizar = document.getElementById("colorActualizar").value;
  var modeloActualizar = document.getElementById("modeloActualizar").value;
  var noserieActualizar = document.getElementById("noserieActualizar").value;
  var nomotorActualizar = document.getElementById("nomotorActualizar").value;
  var obsActualizar = document.getElementById("obsActualizar").value;
  var aiActualizar = document.getElementById("aiActualizar").value;
  var motivoActualizar = document.getElementById("motivoActualizar").value;
  var fiActualizar = document.getElementById("fiActualizar").value;
  var fsActualizar = document.getElementById("fsActualizar").value;
  var asgActualizar = document.getElementById("asgActualizar").value;
  var ajActualizar = document.getElementById("ajActualizar").value;
  var tajActualizar = document.getElementById("tajActualizar").value;
  var nmeActualizar = document.getElementById("nmeActualizar").value;
  var rzsActualizar = document.getElementById("rzsActualizar").value;
  var paActualizar = document.getElementById("paActualizar").value;
  var acActualizar = document.getElementById("acActualizar").value;
  var nsiActualizar = document.getElementById("nsiActualizar").value;


   if(placasac=="" || codigoac=="" || marcaActualizar=="" || tipoActualizar==""|| colorActualizar==""|| modeloActualizar==""
    || noserieActualizar==""|| nomotorActualizar==""|| obsActualizar==""|| aiActualizar==""|| motivoActualizar==""
    || fiActualizar==""|| fsActualizar==""|| asgActualizar==""|| ajActualizar==""|| tajActualizar==""
    || nmeActualizar==""|| rzsActualizar==""|| paActualizar==""|| acActualizar==""|| nsiActualizar==""
    ){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {

  $data = {
           'placasac'   : placasac ,
           'codigoac'   : codigoac ,
           'marcaActualizar': marcaActualizar,
           'tipoActualizar'   : tipoActualizar,
            'colorActualizar': colorActualizar,
            'modeloActualizar': modeloActualizar,
            'noserieActualizar': noserieActualizar,
            'nomotorActualizar': nomotorActualizar,
            'obsActualizar': obsActualizar,
            'aiActualizar': aiActualizar,
            'motivoActualizar': motivoActualizar,
            'fiActualizar': fiActualizar,
            'fsActualizar': fsActualizar,
            'asgActualizar': asgActualizar,
            'ajActualizar': ajActualizar,
            'tajActualizar': tajActualizar,
            'nmeActualizar': nmeActualizar,
            'rzsActualizar': rzsActualizar,
            'paActualizar': paActualizar,
            'acActualizar': acActualizar,
            'nsiActualizar': nsiActualizar};
    $.ajax({
        type: "POST",
        url: url + "vehiculos.php?met=update",//URL dela funcion a ejecutar en table/usuarios.php
        data: $data, //enviar los datos que colocamos dentro del objeto
        success: function (data){ location.reload();
        } // respuesta de case en table/usuarios.php
    });
    }
}

function eliminarvehiculos()
{
    var noseliminar=document.getElementById("noseliminar").value;
    if(noseliminar===""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {
     $data = { 'noseliminar': noseliminar};

     $.ajax({
         type: "POST",
         url: url + "vehiculos.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
         data: $data, //enviar los datos que colocamos dentro del objeto
         success: function (data){ location.reload();} // respuesta de case en table/clientes.php
     });
    }

}

function buscarvehiculo(){
  var vbuscar=document.getElementById("vbuscar").value;//Obtener los valores de input y guardarlos en variable

   $data = { 'vbuscar' : vbuscar};
   console.log($data);
   $.ajax({
       type: "GET",
       dataType: 'json',
       url: url + "vehiculos.php?met=search",//URL dela funcion a ejecutar en table/usuarios.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
           document.getElementById("placasac").value = data[0][0];
           document.getElementById("codigoac").value = data[0][1];
           document.getElementById("marcaActualizar").value = data[0][2];
           document.getElementById("tipoActualizar").value = data[0][3];
           document.getElementById("colorActualizar").value = data[0][4];
           document.getElementById("modeloActualizar").value = data[0][5];
           document.getElementById("noserieActualizar").value = data[0][6];
           document.getElementById("nomotorActualizar").value = data[0][7];
           document.getElementById("obsActualizar").value = data[0][8];
           document.getElementById("aiActualizar").value = data[0][9];
           document.getElementById("motivoActualizar").value = data[0][10];
           document.getElementById("fiActualizar").value = data[0][11];
           document.getElementById("fsActualizar").value = data[0][12];
           document.getElementById("asgActualizar").value = data[0][13];
           document.getElementById("ajActualizar").value = data[0][14];
           document.getElementById("tajActualizar").value = data[0][15];
           document.getElementById("nmeActualizar").value = data[0][16];
           document.getElementById("rzsActualizar").value = data[0][17];
           document.getElementById("paActualizar").value = data[0][18];
           document.getElementById("acActualizar").value = data[0][19];
           document.getElementById("nsiActualizar").value = data[0][20];

       }, // respuesta de case en table/vehiculos.php

       error: /*function (xhr, ajaxOptions, thrownError){
        alert(xhr.status);
        alert(thrownError);
      }*/

       function (request, status, error) {
          console.log(request.responseText);
       }
     });
}
