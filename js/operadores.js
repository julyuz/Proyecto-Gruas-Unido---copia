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


 $.ajax({
     type: "get",
     dataType: 'json',
     url: "http://127.0.0.1/Recibos_Gruas/table/operador.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
     success: function (data){
      for (var i = 0; i < data.length; i++) {

          $("tbody").append( $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
            "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
            "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+"</td></tr>"));


              }
        $('#example').dataTable();

     } // respuesta de case en table/clientes.php
 });

});//--------------------------END DOCUMENT



function agregarop(){//Funcion agregar usuario


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
      url: "http://127.0.0.1/Recibos_Gruas/table/operador.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
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
      url: "http://127.0.0.1/Recibos_Gruas/table/operador.php?met=update",//URL dela funcion a ejecutar en table/usuarios.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){ location.reload();
      } // respuesta de case en table/usuarios.php
  });
  }
}

function eliminarop(){
    var noseliminar=document.getElementById("noseliminar").value;
    if(noseliminar==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {
       $data = { 'noseliminar': noseliminar};

       $.ajax({
           type: "POST",
           url: "http://127.0.0.1/Recibos_Gruas/table/operador.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
           data: $data, //enviar los datos que colocamos dentro del objeto
           success: function (data){ location.reload();} // respuesta de case en table/clientes.php
       });
    }

}

function buscarop(){
  var vbuscar=document.getElementById("vbuscar").value;//Obtener los valores de input y guardarlos en variable

   $data = { 'vbuscar' : vbuscar};

   $.ajax({
       type: "GET",
       dataType: 'json',
       url: "http://127.0.0.1/Recibos_Gruas/table/operador.php?met=search",//URL dela funcion a ejecutar en table/usuarios.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
                                 document.getElementById("idop").value = data[0][0];
                                 document.getElementById("nombreac").value = data[0][1];
                                 document.getElementById("licac").value = data[0][2];
                                 document.getElementById("tl").value = data[0][3];
                                 document.getElementById("nl").value = data[0][4];
                                 document.getElementById("vl").value = data[0][5];

                                } // respuesta de case en table/usuarios.php
     });
}

