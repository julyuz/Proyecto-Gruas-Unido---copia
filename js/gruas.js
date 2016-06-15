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
     url: "http://127.0.0.1/Recibos_Gruas/table/grua.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
     success: function (data){
      for (var i = 0; i < data.length; i++) {

          $("tbody").append( $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
            "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
            "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
            "</td><td>"+data[i][6]+"</td></tr>"));


              }
        $('#example').dataTable();

     } // respuesta de case en table/clientes.php
 });

});//--------------------------END DOCUMENT



function agregargrua(){//Funcion agregar usuario


 var placas=document.getElementById("placas").value;
 var tipo=document.getElementById("tipo").value;
 var marca=document.getElementById("marca").value;
 var modelo=document.getElementById("modelo").value;
 var numero=document.getElementById("numero").value;


    if( placas==""||  tipo==""||marca==""|| modelo==""|| numero==""){
       Materialize.toast('Completar campos requeridos', 4000);
   }
   else{

  $data = {
            'placas': placas,
            'tipo': tipo,
            'marca'  : marca,
            'modelo'  : modelo,
            'numero'  : numero
          };

  $.ajax({
      type: "POST",
      url: "http://127.0.0.1/Recibos_Gruas/table/grua.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){
      location.reload();
       } // respuesta de case en table/clientes.php
  });

  }
}

function modificargrua(){
                                var plcac = document.getElementById("plcac").value;
                                var tipoac = document.getElementById("tipoac").value;
                                var marcaac = document.getElementById("marcaac").value;
                                var modac = document.getElementById("modac").value;
                                var numac = document.getElementById("numac").value;


   if(plcac=="" || tipoac=="" || marcaac=="" || modac==""|| numac==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {

  $data = {
           'plcac'   : plcac ,
           'tipoac'   : tipoac ,
           'marcaac': marcaac,
           'modac'   : modac,
            'numac': numac
          };
  $.ajax({
      type: "POST",
      url: "http://127.0.0.1/Recibos_Gruas/table/grua.php?met=update",//URL dela funcion a ejecutar en table/usuarios.php
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
           url: "http://127.0.0.1/Recibos_Gruas/table/grua.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
           data: $data, //enviar los datos que colocamos dentro del objeto
           success: function (data){ location.reload();} // respuesta de case en table/clientes.php
       });
    } // fin else

}

function buscargrua(){
  var vbuscar=document.getElementById("vbuscar").value;//Obtener los valores de input y guardarlos en variable

   $data = { 'vbuscar' : vbuscar};

   $.ajax({
       type: "GET",
       dataType: 'json',
       url: "http://127.0.0.1/Recibos_Gruas/table/grua.php?met=search",//URL dela funcion a ejecutar en table/usuarios.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
              // Vacia los datos devueltos a cada campo del formulario
                                 document.getElementById("plcac").value = data[0][0];
                                 document.getElementById("tipoac").value = data[0][1];
                                 document.getElementById("marcaac").value = data[0][2];
                                 document.getElementById("modac").value = data[0][3];
                                 document.getElementById("numac").value = data[0][4];


                                } // respuesta de case en table/usuarios.php
     });
}

