
var url = "http://127.0.0.1/Recibos_Gruas/table/";

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

  // Muestra las autoridades existentes en cuanto carga la página
   $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "autoridades.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){
        for (var i = 0; i < data.length; i++) {

            //*********************
            //      Cambiar el tamaño en 'substr' de acuerdo a la ruta de la maquina
            //*********************
            var nombre_archivo = data[i][12].substr(46, data[i][12].length);

            $("#muestra").append(
             $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
            	"</td><td>"+data[i][2]+"</td><td>"+data[i][3]+"</td><td>"+data[i][4]+
              "</td><td>"+data[i][5]+"</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
              "</td><td>"+data[i][8]+"</td><td>"+data[i][9]+"</td><td>"+data[i][10]+
              "</td><td>"+data[i][11]+"</td><td>"+nombre_archivo +"</td></tr>")
            );

        }
        $('#example').dataTable();

       }
   });

});//--------------------------END DOCUMENT



function agregarautoridades(){//Funcion agregar usuario

  var nombre=document.getElementById("nombre").value;
  var jefe=document.getElementById("jefe").value;
  var tel_jefe=document.getElementById("tel_jefe").value;
  var puesto=document.getElementById("puesto").value;
  var contacto1=document.getElementById("contacto1").value;
  var telcontacto1=document.getElementById("telcontacto1").value;
  var contacto2=document.getElementById("contacto2").value;
  var telcontacto2=document.getElementById("telcontacto2").value;
  var contacto3=document.getElementById("contacto3").value;
  var telcontacto3=document.getElementById("telcontacto3").value;
  var teldependencia=document.getElementById("teldependencia").value;

   var nombre_archivo, ruta;
    ruta = document.getElementById("logodependencia").value;
    nombre_archivo = "C:/wamp22/www/Recibos_Gruas/img/subidas/logos/" +
         ruta.substring(12, ruta.length);
    console.log("nombre_archivo: " + nombre_archivo);


    if( nombre=="" || jefe==""|| tel_jefe==""|| puesto==""|| contacto1==""|| telcontacto1==""
     	|| contacto2==""|| telcontacto2==""  ||contacto3==""|| telcontacto3==""
      || teldependencia=="" || nombre_archivo==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
   }
   else{

  $data = { 'nombre'   : nombre,///Colocar los parametros en un objeto
            'jefe': jefe,
            'tel_jefe': tel_jefe,
            'puesto': puesto,
            'contacto1': contacto1,
            'telcontacto1': telcontacto1,
            'contacto2': contacto2,
            'telcontacto2': telcontacto2,
            'contacto3': contacto3,
            'telcontacto3': telcontacto3,
            'teldependencia': teldependencia,
            'logodependencia': nombre_archivo
          };


  $.ajax({
      type: "POST",
      url: url + "autoridades.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
      data: $data, //enviar los datos que colocamos dentro del objeto
      success: function (data){ location.reload();
      } // respuesta de case en table/clientes.php
  });

  }
}

function modificarAutoridad(){
  var co=document.getElementById("co").value;
  var nombreActualizar=document.getElementById("nombreActualizar").value;
  var jefeActualizar=document.getElementById("jefeActualizar").value;
  var teljActualizar=document.getElementById("teljActualizar").value;
  var puestoActualizar=document.getElementById("puestoActualizar").value;

  var contacto1Actualizar=document.getElementById("contacto1Actualizar").value;
  var telcontacto1Actualizar=document.getElementById("telcontacto1Actualizar").value;
  var contacto2Actualizar=document.getElementById("contacto2Actualizar").value;
  var telcontacto2Actualizar=document.getElementById("telcontacto2Actualizar").value;
  var contacto3Actualizar=document.getElementById("contacto3Actualizar").value;
  var telcontacto3Actualizar=document.getElementById("telcontacto3Actualizar").value;

  var teldependenciaActualizar=document.getElementById("teldependenciaActualizar").value;
  //var logodependenciaActualizar=document.getElementById("logodependenciaActualizar").value;




   if(co=="" || nombreActualizar=="" || jefeActualizar==""
   	|| teljActualizar==""|| puestoActualizar==""
    || contacto1Actualizar=="" || telcontacto1Actualizar==""
    || contacto2Actualizar=="" || telcontacto2Actualizar==""
    || contacto3Actualizar=="" || telcontacto3Actualizar==""
    || teldependenciaActualizar==""

    ){
     Materialize.toast('Completar campos requeridos', 4000);

   }else
   {
      var ruta = document.getElementById("logodependenciaActualizar").value;
      console.log("ruta: " + ruta + "\nruta.length: " + ruta.length);

      // Si no se desea subir imagen, se comprueba si el input tiene algun dato, si esta vacio, no se seleccionó imagen
      // y no se manda dato de 'logodependencia' al servidor para actualizar en la BD
      if (ruta === "") {
          $data = {
               'co'   : co , 'nombreActualizar'   : nombreActualizar, 'jefeActualizar': jefeActualizar
               , 'teljActualizar': teljActualizar, 'puestoActualizar': puestoActualizar
               , 'contacto1Actualizar': contacto1Actualizar, 'telcontacto1Actualizar': telcontacto1Actualizar
               , 'contacto2Actualizar': contacto2Actualizar, 'telcontacto2Actualizar': telcontacto2Actualizar
               , 'contacto3Actualizar': contacto3Actualizar, 'telcontacto3Actualizar': telcontacto3Actualizar
               , 'teldependenciaActualizar': teldependenciaActualizar
              };
      }
      else
      {
        // Si si se desea subir imagen, se comprueba si el input tiene algun dato, si es así,
        // se manda dato de 'logodependenciaActualizar' con la ruta completa de la nueva imagen al servidor para actualizar en la BD

        var nombre_archivo;
        nombre_archivo = "C:/wamp22/www/Recibos_Gruas/img/subidas/logos/" +
             ruta.substring(12, ruta.length);
        console.log("nombre_archivo: " + nombre_archivo);

        $data = {
               'co'   : co , 'nombreActualizar'   : nombreActualizar, 'jefeActualizar': jefeActualizar
               , 'teljActualizar': teljActualizar, 'puestoActualizar': puestoActualizar
               , 'contacto1Actualizar': contacto1Actualizar, 'telcontacto1Actualizar': telcontacto1Actualizar
               , 'contacto2Actualizar': contacto2Actualizar, 'telcontacto2Actualizar': telcontacto2Actualizar
               , 'contacto3Actualizar': contacto3Actualizar, 'telcontacto3Actualizar': telcontacto3Actualizar
               , 'teldependenciaActualizar': teldependenciaActualizar, 'logodependenciaActualizar': nombre_archivo
              };
      }

      $.ajax({
          type: "POST",
          url: url + "autoridades.php?met=update",//URL dela funcion a ejecutar en table/autoridades.php
          data: $data, //enviar los datos que colocamos dentro del objeto
          success: function (data){ location.reload();} // respuesta de case en table/autoridades.php
      });

    }
}

function eliminarautoridades(){
    var nombreliminar=document.getElementById("nombreliminar").value;
    if(nombreliminar==""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
    } else {
     $data = { 'nombreliminar': nombreliminar};

     $.ajax({
         type: "POST",
         url: url + "autoridades.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
         data: $data, //enviar los datos que colocamos dentro del objeto
         success: function (data){ location.reload();} // respuesta de case en table/autoridades.php, si es exito, se refresca la ventana

     });
   }

}

function buscarAutoridad(){
  var autoridad=document.getElementById("autoridadBuscar").value;//Obtener los valores de input y guardarlos en variable
  console.log("Autoridad --> " + autoridad);
   $data = { 'autoridad' : autoridad };
   console.log($data);
   $.ajax({
       type: "GET",
       dataType: 'json',
       url: url + "autoridades.php?met=search",//URL dela funcion a ejecutar en table/usuarios.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
           document.getElementById("co").value = data[0][0];
           document.getElementById("nombreActualizar").value = data[0][1];
           document.getElementById("jefeActualizar").value = data[0][2];
           document.getElementById("teljActualizar").value = data[0][3];
           document.getElementById("puestoActualizar").value = data[0][4];
           document.getElementById("contacto1Actualizar").value = data[0][5];
           document.getElementById("telcontacto1Actualizar").value = data[0][6];
           document.getElementById("contacto2Actualizar").value = data[0][7];
           document.getElementById("telcontacto2Actualizar").value = data[0][8];
           document.getElementById("contacto3Actualizar").value = data[0][9];
           document.getElementById("telcontacto3Actualizar").value = data[0][10];
           document.getElementById("teldependenciaActualizar").value = data[0][11];
           document.getElementById("logodependenciaActualizar").value = data[0][12];

          } // respuesta de case en table/autoridades.php
     });
}
