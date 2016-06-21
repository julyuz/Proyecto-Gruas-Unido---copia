var cont_tableAllUsers =1;

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
  $('.modal-triggerGetAllUsers').leanModal();


  // Muestra los clientes existentes en cuanto carga la página
   $.ajax({
       type: "get",
       dataType: 'json',
       url: url +"clientes.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){
        for (var i = 0; i < data.length; i++) {

            $("#muestra").append(
             $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
            	"</td><td>"+data[i][2]+"</td><td>"+data[i][3]+"</td><td>"+data[i][4]+
              "</td><td>"+data[i][5]+"</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
              "</td><td>"+data[i][8]+"</td><td>"+data[i][9]+"</td><td>"+data[i][10]+
              "</td><td>"+data[i][11]+"</td></tr>")
            );

        }
        $('#example').dataTable();

       } // respuesta de case en table/clientes.php
   });

});//--------------------------END DOCUMENT


function getAllUsers()
{
    //alert("Clickeado!");
    if(cont_tableAllUsers === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "clientes.php?met=show",
       success: function (data){
        console.log("*** For ***\ncont_tableAllUsers: " + cont_tableAllUsers );
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );

            $("#tbodyAllUsers").append
              (
                $(
                    "<tr id ='pointer' onclick='getRowUsers();' >"+
                    "<td>"+data[i][0]+"</td><td>"+data[i][1]+
                    "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                    "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
                    "</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
                    "</td><td>"+data[i][8]+"</td><td>"+data[i][9]+
                    "</td><td>"+data[i][10]+"</td><td>"+data[i][11]+
                    "</td></tr>"
                )
              );

            //console.log("Exito; data.length: " + data.length, 4000);
          } // Fin for
          cont_tableAllUsers = cont_tableAllUsers + 1;
          $('#tableAllUsers').dataTable();
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

function getRowUsers()
{
    var table = $('#tableAllUsers').DataTable();

        $('#tbodyAllUsers').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila

              var id = registro[0];

                  document.getElementById("clienteBuscar").value = id;

                  document.getElementById("nombreliminar").value = id;

              $('#modalGetAllUsers').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function agregarclientes(){//Funcion agregar usuario

  var nombre=document.getElementById("nombre").value;
  var correo=document.getElementById("correo").value;
  var tel_fijo=document.getElementById("telf").value;
  var tel_celular=document.getElementById("telcel").value;
  var calle=document.getElementById("calle").value;
  var colonia=document.getElementById("colonia").value;
  var codigo_postal=document.getElementById("codpos").value;
  var num_exterior=document.getElementById("numext").value;
  var num_interior=document.getElementById("numint").value;
  var ciudad=document.getElementById("ciudad").value;
  var contacto1=document.getElementById("cont1").value;
  var tel_contacto1=document.getElementById("telcont1").value;
  var contacto2=document.getElementById("cont2").value;
  var tel_contacto2=document.getElementById("telcont2").value;
  var curp=document.getElementById("curp").value;
  var rfc=document.getElementById("rfc").value;

    if( nombre=="" || correo==""|| tel_fijo==""|| tel_celular==""|| calle==""|| colonia==""|| codigo_postal==""
    	|| num_exterior==""|| num_interior==""|| ciudad==""|| contacto1==""|| tel_contacto1==""
    	|| contacto2==""|| tel_contacto2==""|| curp==""|| rfc==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }
   else{

  $data = { 'nombre'   : nombre,///Colocar los parametros en un objeto
            'correo': correo,
            'tel_fijo': tel_fijo,
            'tel_celular': tel_celular,
            'calle': calle,
            'colonia': colonia,
            'codigo_postal': codigo_postal,
            'num_exterior': num_exterior,
            'num_interior': num_interior,
            'ciudad': ciudad,
            'contacto1': contacto1,
            'tel_contacto1': tel_contacto1,
            'contacto2': contacto2,
            'tel_contacto2': tel_contacto2,
            'curp'  : curp,
            'rfc'  : rfc
          };


  $.ajax({
      type: "POST",
      url: url + "clientes.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
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
      url: url +"clientes.php?met=update",//URL dela funcion a ejecutar en table/usuarios.php
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
    } else {
     $data = { 'nombreliminar': nombreliminar};

     $.ajax({
         type: "POST",
         url: url +"clientes.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
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
       url: url +"clientes.php?met=search",//URL dela funcion a ejecutar en table/usuarios.php
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






