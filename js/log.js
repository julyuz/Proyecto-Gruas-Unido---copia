$('document').ready(function(e){   




});//--------------------------END DOCUMENT


function Login(){


  var usuario    =document.getElementById("usuario").value;
  var password   =document.getElementById("password").value;

console.log(usuario);
console.log(password);


 $data = {  'usuario'   : usuario,///Colocar los parametros en un objeto 
            'password'  : password };
  $.ajax({
      type: "get",
      url: "http://127.0.0.1/GYM/table/usuarios.php?metodo=log",//URL dela funcion a ejecutar en table/usuarios.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){ //location.reload();
      } // respuesta de case en table/usuarios.php
  });


}




