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
  

 /*$.ajax({
     type: "get",
     dataType: 'json',
     url: "http://127.0.0.1/Costeo_Gruas/table/bitacora.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
     success: function (data){ 
      for (var i = 0; i < data.length; i++) {
     
     
          $("#muestra").append( $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
          	"</td><td>"+data[i][2]+"</td><td>"+data[i][3]+"</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
          	"</td><td>"+data[i][6]+"</td><td>"+data[i][7]+"</td><td>"+data[i][8]
          	+"</td><td>"+data[i][9]+"</td><td>"+data[i][10]+"</td></tr>"));

                }     
        $('#example').dataTable();  
        
     } // respuesta de case en table/clientes.php
 });*/



 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
   
});//--------------------------END DOCUMENT



function agregarbitacora(){//Funcion agregar usuario
 
  var fecha=document.getElementById("fecha").value;
  var codigo=document.getElementById("codigo").value;
  var nombreE=document.getElementById("nombreE").value;
  var domicilio=document.getElementById("domicilio").value;
  var telefono=document.getElementById("telefono").value;
  var tiposervicio=document.getElementById("tiposervicio").value;
  var modalidad=document.getElementById("modalidad").value;
  var marca=document.getElementById("marca").value;
  var modelo=document.getElementById("modelo").value;
  var placas=document.getElementById("placas").value;
  var nombreC=document.getElementById("nombreC").value;
  var numlic=document.getElementById("numlic").value;
  var tipolic=document.getElementById("tipolic").value;
  var vigencia=document.getElementById("vigencia").value;
  var ordes=document.getElementById("ordes").value;
  var diascon=document.getElementById("diascon").value;
  var casosE=document.getElementById("casosE").value;
  var hsalida=document.getElementById("hsalida").value;
  var hllegada=document.getElementById("hllegada").value;
  var husadas=document.getElementById("husadas").value;
  var nomela=document.getElementById("nomela").value;
    if( fecha==""|| codigo=="" || nombreE==""|| domicilio==""|| telefono==""|| tiposervicio==""|| modalidad==""|| marca==""
    	|| modelo==""|| placas==""|| nombreC==""|| numlic==""|| tipolic==""
    	|| vigencia==""|| ordes==""|| diascon==""|| casosE==""|| hsalida==""|| hllegada==""|| husadas==""|| nomela==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }
   else{

  $data = { 'codigo'   : codigo,
            'fecha'   : fecha,///Colocar los parametros en un objeto 
            'nombreE': nombreE,
            'domicilio': domicilio,
            'telefono': telefono,
            'tiposervicio': tiposervicio,
            'modalidad': modalidad,
            'marca': marca,
            'modelo': modelo,
            'placas': placas,
            'nombreC': nombreC,
            'numlic': numlic,
            'tipolic': tipolic,
            'vigencia': vigencia,
            'ordes': ordes,
            'diascon'  : diascon,
            'casosE'  : casosE,  
            'hsalida'  : hsalida,
            'hllegada'  : hllegada, 
            'husadas'  : husadas, 
            'nomela'  : nomela
          };

    
  $.ajax({
      type: "POST",
      url: "http://127.0.0.1/Costeo_Gruas/table/bitacora.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){ location.reload();
      } // respuesta de case en table/clientes.php
  }); 

  }
}

function modificarCliente(){
  var co=document.getElementById("co").value; 
  var nombreActualizar=document.getElementById("nombreActualizar").value;
  var correoActualizar=document.getElementById("correoActualizar").value;
  var telfActualizar=document.getElementById("telfActualizar").value;
  var telcActualizar=document.getElementById("telcActualizar").value;
  var calleActualizar=document.getElementById("calleActualizar").value;
  var coloniaActualizar=document.getElementById("coloniaActualizar").value;
  var cpActualizar=document.getElementById("cpActualizar").value; 
  var nmexActualizar=document.getElementById("nmexActualizar").value;
  var nmintActualizar=document.getElementById("nmintActualizar").value;
  var ciudadActualizar=document.getElementById("ciudadActualizar").value;
  var cont1Actualizar=document.getElementById("cont1Actualizar").value;
  var telcont1Actualizar=document.getElementById("telcont1Actualizar").value;
  var cont2Actualizar=document.getElementById("cont2Actualizar").value;
  var telcont2Actualizar=document.getElementById("telcont2Actualizar").value;
  var curpActualizar =document.getElementById("curpActualizar").value;
  var rfcActualizar =document.getElementById("rfcActualizar").value;

   if(co=="" || nombreActualizar=="" || correoActualizar==""
   	|| telfActualizar==""|| telcActualizar==""|| calleActualizar==""
   	|| coloniaActualizar==""|| cpActualizar==""|| nmexActualizar==""
   	|| nmintActualizar==""|| ciudadActualizar==""|| cont1Actualizar==""
   	|| telcont1Actualizar==""|| cont2Actualizar==""|| telcont2Actualizar==""
   	|| curpActualizar==""|| rfcActualizar==""){
     Materialize.toast('Completar campos requeridos', 4000);
   
   }else {

  $data = { 
           'co'   : co , 'nombreActualizar'   : nombreActualizar, 'correoActualizar': correoActualizar
           , 'telfActualizar': telfActualizar, 'telcActualizar': telcActualizar
           , 'calleActualizar': calleActualizar, 'coloniaActualizar': coloniaActualizar
           , 'cpActualizar': cpActualizar, 'nmexActualizar': nmexActualizar, 'nmintActualizar': nmintActualizar
           , 'ciudadActualizar': ciudadActualizar, 'cont1Actualizar': cont1Actualizar, 'telcont1Actualizar': telcont1Actualizar
           , 'cont2Actualizar': cont2Actualizar, 'telcont2Actualizar': telcont2Actualizar
           ,'curpActualizar': curpActualizar,'rfcActualizar': rfcActualizar
            };
  $.ajax({
      type: "POST",
      url: "http://127.0.0.1/Costeo_Gruas/table/clientes.php?met=update",//URL dela funcion a ejecutar en table/usuarios.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){ location.reload();} // respuesta de case en table/usuarios.php
  });
  }
}

function eliminarclientes(){
    var nombreliminar=document.getElementById("nombreliminar").value;
    if(nombreliminar==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {
   $data = { 'nombreliminar': nombreliminar};

   $.ajax({
       type: "POST",
       url: "http://127.0.0.1/Costeo_Gruas/table/clientes.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){ location.reload();} // respuesta de case en table/clientes.php
   });
}



}



function buscarCliente(){
  var cliente=document.getElementById("clienteBuscar").value;//Obtener los valores de input y guardarlos en variable
  console.log(cliente);
   $data = { 'cliente' : cliente};
   console.log($data);
   $.ajax({
       type: "GET",
       dataType: 'json',
       url: "http://127.0.0.1/Costeo_Gruas/table/clientes.php?met=search",//URL dela funcion a ejecutar en table/usuarios.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){ 
                                 document.getElementById("co").value = data[0][0];
                                 document.getElementById("nombreActualizar").value = data[0][1];
                                 document.getElementById("correoActualizar").value = data[0][2];
                                 document.getElementById("telfActualizar").value = data[0][3];
                                 document.getElementById("telcActualizar").value = data[0][4];
                                 document.getElementById("calleActualizar").value = data[0][5];
                                 document.getElementById("coloniaActualizar").value = data[0][6];
                                 document.getElementById("cpActualizar").value = data[0][7];
                                 document.getElementById("nmexActualizar").value = data[0][8];
                                 document.getElementById("nmintActualizar").value = data[0][9];
                                 document.getElementById("ciudadActualizar").value = data[0][10];
                                 document.getElementById("cont1Actualizar").value = data[0][11];
                                 document.getElementById("telcont1Actualizar").value = data[0][12];
                                 document.getElementById("cont2Actualizar").value = data[0][13];
                                 document.getElementById("telcont2Actualizar").value = data[0][14];
                                 document.getElementById("curpActualizar").value = data[0][15];
                                 document.getElementById("rfcActualizar").value = data[0][16];
                               
                                 
                                } // respuesta de case en table/usuarios.php
     });
}






