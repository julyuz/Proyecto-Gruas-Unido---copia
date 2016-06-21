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

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

  console.log("url: " + url);
  $('.modal-triggerGetAllOpe').leanModal();

 $.ajax({
     type: "get",
     dataType: 'json',
     url: url +"operador.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
     success: function (data){
      for (var i = 0; i < data.length; i++) {

          $("#muestra").append( $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
            "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
            "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+"</td></tr>"));
      }
        $('#example').dataTable();

     }
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

function agregarop(){


 var nombre=document.getElementById("nombre").value;
 var licencia=document.getElementById("licencia").value;
 var tipo=document.getElementById("tipo").value;
 var numero=document.getElementById("numero").value;
 var vigencia=document.getElementById("vigencia").value;


    if( nombre==""||  licencia==""||tipo==""|| numero==""|| vigencia==""){
       Materialize.toast('Completar campos requeridos', 4000);
   }
   else{

  $data = {

            'nombre': nombre,
            'licencia': licencia,
            'tipo'  : tipo,
            'numero'  : numero,
            'vigencia'  : vigencia

          };


  $.ajax({
      type: "POST",
      url: url +"operador.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){
      location.reload();
       } // respuesta de case en table/clientes.php
  });

  }
}

function modificarop(){
    var idop = document.getElementById("idop").value;
    var nombreac = document.getElementById("nombreac").value;
    var licac = document.getElementById("licac").value;
    var tl = document.getElementById("tl").value;
    var nl = document.getElementById("nl").value;
    var vl = document.getElementById("vl").value;


   if(idop=="" || nombreac=="" || licac=="" || tl==""|| nl==""|| vl==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {

  $data = {
           'idop'   : idop ,
           'nombreac'   : nombreac ,
           'licac': licac,
           'tl'   : tl,
           'nl': nl,
           'vl': vl };
  $.ajax({
      type: "POST",
      url: url +"operador.php?met=update",//URL dela funcion a ejecutar en table/usuarios.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){ location.reload();
      } // respuesta de case en table/usuarios.php
  });
  }
}

function eliminarop(){
    var noseliminar=document.getElementById("id_operadorMod").value;
    if(noseliminar==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {
       $data = { 'noseliminar': noseliminar};

       $.ajax({
           type: "POST",
           url: url +"operador.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
           data: $data, //enviar los datos que colocamos dentro del objeto
           success: function (data){ location.reload();}
       });
    }

}

function buscarop(){
  var vbuscar=document.getElementById("id_operador").value;//Obtener los valores de input y guardarlos en variable
  if (vbuscar === "") { Materialize.toast('Completar campos requeridos', 4000); }
  else
  {
   $data = { 'vbuscar' : vbuscar};

   $.ajax({
       type: "GET",
       dataType: 'json',
       url: url +"operador.php?met=search",
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
        if( data.length > 0)
            {
             document.getElementById("idop").value = data[0][0];
             document.getElementById("nombreac").value = data[0][1];
             document.getElementById("licac").value = data[0][2];
             document.getElementById("tl").value = data[0][3];
             document.getElementById("nl").value = data[0][4];
             document.getElementById("vl").value = data[0][5];

            }
            else{ Materialize.toast("No hay registro", 4000); }
        }
     });
 }
}

