//var urlU = "http://127.0.0.1/Proyecto Gruas Unido - copia/table/";
var cont_tableAllUsers = 1;
/****** Este estoy usando *******/

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

  // Muestra los usuarios existentes en cuanto carga la página
   $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "usuarios.php?met=show",//URL dela funcion a ejecutar en table/usuarios.php
       success: function (data){
        console.log("Usuarios, data.length: " + data.length);
        for (var i = 0; i < data.length; i++) {

            //*********************
            //      Cambiar el tamaño en 'substr' de acuerdo a la ruta de la maquina
            //*********************
            //var nombre_archivo = data[i][12].substr(46, data[i][12].length);

            $("#muestra").append(
             $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
            	"</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
              "</td><td>"+data[i][4]+"</td></tr>")
            );

        }
        $('#example').dataTable();

       },
        error: function (request, status, error) {
            console.log("\n\n*** Error AJAX ***\n\n" + error);
            //alert(xhr.status);
            //alert(thrownError);
        }
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
       url: url + "usuarios.php?met=show",
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
                    "</td><td>"+data[i][4]+"</td></tr>"
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

                  document.getElementById("usuarioBuscar").value = id;

                  document.getElementById("codigoEliminar").value = id;

              $('#modalGetAllUsers').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function getNivelRadioChecked(nombre_radios)
{
  radios = document.getElementsByName(nombre_radios);
  var nivel;
  for( var i = 0; i < radios.length; i++){
      if(radios[0].checked === true)
          nivel = "2";
      if(radios[1].checked === true)
          nivel = "1";
  }
  return nivel;
}

function agregarUsuario(){//Funcion agregar usuario

  var nombre=document.getElementById("nombre").value;
  var usuario=document.getElementById("usuario").value;
  var pass=document.getElementById("pass").value;
  var pass1 = document.getElementById("pass1").value;
  var nivel = getNivelRadioChecked("nivel");
  console.log("nivel: " + nivel);

  if( nombre==="" || usuario===""|| pass===""|| pass1 ===""|| nivel==="" )
  {
     Materialize.toast('Completar campos requeridos', 4000);
  }
  else
  {
      if( pass === pass1 )
      {
          $data = { 'nombre'   : nombre,///Colocar los parametros en un objeto
                    'usu': usuario,
                    'pass': pass,
                    'nivel': nivel
                  };

          $.ajax({
              type: "POST",
              url: url + "usuarios.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
              data: $data, //enviar los datos que colocamos dentro del objeto
              success: function (data){ location.reload();
              }, // respuesta de case en table/usuarios.php

              error: function (request, status, error) {
                  console.log("\n\n*** Error AJAX ***\n\n" + error);
                  //alert(xhr.status);
                  //alert(thrownError);
              }
          });
      }
      else{ Materialize.toast("Las contraseñas no coinciden", 5000); }

  }
}

function modificarUsuario(){
  var co=document.getElementById("co").value;
  var nombreActualizar=document.getElementById("nombreActualizar").value;
  var usuarioActualizar=document.getElementById("usuarioActualizar").value;
  var passActualizar=document.getElementById("passActualizar").value;
  var pass1Actualizar = document.getElementById("pass1Actualizar").value;
  var nivel = getNivelRadioChecked("nivelActualizar");

  console.log("nivelActualizar: " + nivel);

   if( co==="" || usuarioActualizar===""|| passActualizar===""|| pass1Actualizar ===""|| nivel==="" )
  {
     Materialize.toast('Completar campos requeridos', 4000);
  }
  else
  {
      if( passActualizar === pass1Actualizar )
      {
          $data = { 'co'   : co,///Colocar los parametros en un objeto
                    'nombreActualizar' : nombreActualizar,
                    'usuarioActualizar': usuarioActualizar,
                    'passActualizar': passActualizar,
                    'nivel': nivel
                  };

          $.ajax({
              type: "POST",
              url: url + "usuarios.php?met=update",//URL dela funcion a ejecutar en table/usuarios.php
              data: $data, //enviar los datos que colocamos dentro del objeto
              success: function (data){ location.reload();
              }, // respuesta de case en table/usuarios.php

              error: function (request, status, error) {
                  console.log("\n\n*** Error AJAX ***\n\n" + error);
                  //alert(xhr.status);
                  //alert(thrownError);
              }
          });
      }
      else{ Materialize.toast("Las contraseñas no coinciden", 5000); }

  }

}

function eliminarUsuario(){
    var codigoEliminar=document.getElementById("codigoEliminar").value;
    if(codigoEliminar===""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
    } else {
     $data = { 'codigoEliminar': codigoEliminar};

     $.ajax({
         type: "POST",
         url: url + "usuarios.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
         data: $data, //enviar los datos que colocamos dentro del objeto
         success: function (data){
              console.log(data);
              location.reload();
          }

     });
   }

}

function buscarUsuario(){
  var usuario=document.getElementById("usuarioBuscar").value;//Obtener los valores de input y guardarlos en variable
  console.log("usuario --> " + usuario);
   $data = { 'usuario' : usuario };
   console.log($data);
   if (usuario === "") { Materialize.toast('Completar campos requeridos', 4000); }
  else
  {
   $.ajax({
       type: "GET",
       dataType: 'json',
       url: url + "usuarios.php?met=search",//URL dela funcion a ejecutar en table/usuarios.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
        if( data.length > 0)
          {
            document.getElementById("co").value= data[0][0];
            document.getElementById("nombreActualizar").value = data[0][1];
            document.getElementById("usuarioActualizar").value = data[0][2];
            document.getElementById("passActualizar").value = "";
            document.getElementById("pass1Actualizar").value = "";

            Materialize.toast("Ingrese/Actualice su contraseña", 4500);

            var nivel = data[0][4];

            var radios = document.getElementsByName("nivelActualizar");
            if( nivel === "1")
                radios[1].checked = true;
            if( nivel === "2")
                radios[0].checked = true;
          }
          else{ Materialize.toast("No hay registro", 4000); }
        }
     });
 }
}
