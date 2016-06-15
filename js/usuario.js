$('document').ready(function(e){
  var cookie = document.cookie;
  var data = cookie.split(",");
  if(cookie=="" || cookie=="x" || data[2]=="false" ){
    window.location="Login/index.php";
  }

$(".button-collapse").sideNav();
 var usuarios;
 $.ajax({
     type: "get",
     dataType: 'json',
     url: "http://127.0.0.1/GYM/table/usuarios.php?metodo=show",//URL dela funcion a ejecutar en table/usuarios.php
     
     success: function (data){ 
      usuarios=data;
      for (var i = 0; i < data.length; i++) {
        if(data[i][3]=="true"){
          data[i][3]="Si"
        }
        else{
          data[i][3]="No";
        }
      $( "#w" ).append( $("<tr><td>"+data[i][0]+"</td><td>"+data[i][1]+"</td><td>**********</td><td>"+data[i][3]+"</td><td>"+data[i][4]+"</td></tr>") );
        }
          $('#example').dataTable();
     } // respuesta de case en table/usuarios.php
     
 });
   
});//--------------------------END DOCUMENT



this.privilegioRegistrar=false;
this.privilegioEditar=false;

function checkBoxEdit() {
  if (privilegioEditar){
    privilegioEditar=false;
  }
  else{
    privilegioEditar=true;
  }
}


function checkBoxRegistrar() {
  if (privilegioRegistrar){
    privilegioRegistrar=false;
  }
  else{
    privilegioRegistrar=true;
  }
}


function agregarUsuarios(){//Funcion agregar usuario
  var usuario    =document.getElementById("usuarioD").value;//Obtener los valores de input y guardarlos en variable
  var password   =document.getElementById("password").value;
  var privilegio =privilegioRegistrar;
  console.log(usuario+"--"+password);
  if(usuario=="" ||password==""){
    Materialize.toast('Completar campos requeridos', 4000);
  }
  else{
    $data = { 'usuario'   : usuario,///Colocar los parametros en un objeto 
              'privilegio': privilegio,
              'password'  : password };
    $.ajax({
        type: "POST",
        url: "http://127.0.0.1/GYM/table/usuarios.php?metodo=store",//URL dela funcion a ejecutar en table/usuarios.php
        data: $data, //enviar los datos que colocamos dentro del objeto
        success: function (data){ location.reload();} // respuesta de case en table/usuarios.php
    });
  }
}

function buscarUsuario() {
  var usuario=document.getElementById("usuarioBuscar").value;//Obtener los valores de input y guardarlos en variable
  $data = { 'usuario'   : usuario};
  console.log($data);
  $.ajax({
      type: "GET",
      dataType: 'json',
      url: "http://127.0.0.1/GYM/table/usuarios.php?metodo=search",//URL dela funcion a ejecutar en table/usuarios.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){ console.log(data[0][1]);
                                document.getElementById("ID").value = data[0][0];
                                document.getElementById("usuarioEditar").value = data[0][1];
                                //document.getElementById("passwordEditar").value = data[0][2];
                                if(data[0][3]=="true"){
                                  document.getElementById("privilegioEditar").checked  = true;
                                  checkBoxEditar=true;
                                }
                                else{
                                  document.getElementById("privilegioEditar").checked  = false;
                                  checkBoxEditar=false;
                                }
                                
                               } // respuesta de case en table/usuarios.php
    });
}

function modificarUsuario(){
  var id         =document.getElementById("ID").value;
  var usuario    =document.getElementById("usuarioEditar").value;
  var password   =document.getElementById("passwordEditar").value;
  var privilegio =document.getElementById("privilegioEditar").checked;
  if(id=="" || usuario=="" || password==""){
    Materialize.toast('Completar campos requeridos', 4000);
  }
  else{
    $data = { 'id'        : id,
              'usuario'   : usuario,
              'privilegio': privilegio,
              'password'  : password };
    $.ajax({
        type: "POST",
        url: "http://127.0.0.1/GYM/table/usuarios.php?metodo=update",//URL dela funcion a ejecutar en table/usuarios.php
        data: $data, //enviar los datos que colocamos dentro del objeto
        success: function (data){ location.reload();
        } // respuesta de case en table/usuarios.php
    });
  }
}

function eliminarUsuario(){
   var usuario=document.getElementById("nombreEliminar").value;
   $data = { 'usuario': usuario};

   $.ajax({
       type: "POST",
       url: "http://127.0.0.1/GYM/table/usuarios.php?metodo=delete",//URL dela funcion a ejecutar en table/usuarios.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){ location.reload();} // respuesta de case en table/usuarios.php
   });

}



