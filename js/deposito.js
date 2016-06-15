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


 $.ajax({
     type: "get",
     dataType: 'json',
     url: "http://127.0.0.1/Costeo_Gruas/table/depositos.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
     success: function (data){ 
      for (var i = 0; i < data.length; i++) {
     
     
          $("#muestra").append( $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+"</td><td>"+data[i][2]+"</td><td>"+data[i][3]+"</td><td>"+data[i][4]+"</td><td>"+data[i][5]+"</td><td>"+data[i][6]+"</td></tr>"));

              }
        $('#example').dataTable();  
        
     } // respuesta de case en table/clientes.php
 });
   
});//--------------------------END DOCUMENT






function total(){
var resultado =0;  
var dias_custodiado=document.getElementById("dias_custodiado").value;
var cuotaxdia=document.getElementById("cuotaxdia").value;
var auxres=parseFloat(dias_custodiado)*parseFloat(cuotaxdia);
resultado=auxres;
document.getElementById("total").value=resultado;

}

function agregardeposito(){//Funcion agregar usuario
 
  var codigo=document.getElementById("codigo").value;
  var fechaInicial=document.getElementById("fechaInicial").value;
  var fechaFinal=document.getElementById("fechaFinal").value;
  var dias_custodiado=document.getElementById("dias_custodiado").value;
  var cuotaxdia=document.getElementById("cuotaxdia").value;
  var total=document.getElementById("total").value;
 

    if( codigo=="" || fechaInicial==""|| fechaFinal==""|| dias_custodiado==""|| cuotaxdia==""|| total==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }
   else{

  $data = { 'codigo'   : codigo,///Colocar los parametros en un objeto 
            'fechaInicial': fechaInicial,
            'fechaFinal': fechaFinal,
            'dias_custodiado': dias_custodiado,
            'cuotaxdia': cuotaxdia,
            'total': total
          };

    
  $.ajax({
      type: "POST",
      url: "http://127.0.0.1/Costeo_Gruas/table/depositos.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){ location.reload();
      } // respuesta de case en table/clientes.php
  }); 

  }
}


function modificarCliente(){
   var id_cliente    =document.getElementById("id_cliente").value; 
  var nombreActualizar    =document.getElementById("nombreActualizar").value;
  var domActualizar =document.getElementById("domActualizar").value;
  var curpActualizar =document.getElementById("curpActualizar").value;
  var rfcActualizar =document.getElementById("rfcActualizar").value;

   if(id_cliente=="" || nombreActualizar=="" || domActualizar==""|| curpActualizar==""|| rfcActualizar==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }else {

  $data = { 
           'id_cliente'   : id_cliente , 'nombreActualizar'   : nombreActualizar, 'domActualizar': domActualizar
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
       success: function (data){ console.log(data[0][2]);
                                 document.getElementById("id_cliente").value = data[0][0];
                                 document.getElementById("nombreActualizar").value = data[0][1];
                                 document.getElementById("domActualizar").value = data[0][2];
                                 document.getElementById("curpActualizar").value = data[0][3];
                                 document.getElementById("rfcActualizar").value = data[0][4];
                               
                                 
                                } // respuesta de case en table/usuarios.php
     });
}

