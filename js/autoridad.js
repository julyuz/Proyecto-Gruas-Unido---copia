var nombre_archivo; // variable usada para el nombre de la imagen que se subió
var cont_tableAllAutoridad= 1;

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

   $('.modal-triggerGetAllAutoridad').leanModal();

  $('.materialboxed').materialbox();

  // Muestra las autoridades existentes en cuanto carga la página
   $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "autoridades.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){
        for (var i = 0; i < data.length; i++) {

            var img_autoridad = data[i][12];
            var ruta_img = "img/subidas/logos/"+img_autoridad;

            $("#muestra").append(
             $("<tr> <td>"+data[i][0]+"</td><td>"+data[i][1]+
            	"</td><td>"+data[i][2]+"</td><td>"+data[i][3]+"</td><td>"+data[i][4]+
              "</td><td>"+data[i][5]+"</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
              "</td><td>"+data[i][8]+"</td><td>"+data[i][9]+"</td><td>"+data[i][10]+
              "</td><td>"+data[i][11]+"</td><td>"+
              "<a href='" +ruta_img+ "' target='_blank'><img class='responsive-img_1' src='"+ruta_img+"' /></a></td></tr>")
            );

        }
        $('#example').dataTable();

       }
   });

});//--------------------------END DOCUMENT

function getAllAutoridad()
{
    //alert("Clickeado!");
    if( cont_tableAllAutoridad === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "autoridades.php?met=show",//URL dela funcion a ejecutar en table/Autoridadrador.php
       success: function (data){
        console.log("*** For ***\ncont_tableAllAutoridad: " + cont_tableAllAutoridad);
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );
            var img_autoridad = data[i][12];
            var ruta_img = "img/subidas/logos/"+img_autoridad;
            $("#tbodyAllAutoridad").append
              (
                $("<tr onclick='getRowAutoridad();' ><td>"+data[i][0]+
                "</td><td>"+data[i][1]+
                "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                "</td><td>"+data[i][4]+"</td><td>"+data[i][11]+
                "</td><td><img class='responsive-img_1' src='"+ruta_img+"' /></td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllAutoridad= cont_tableAllAutoridad + 1;
          $('#tableAllAutoridad').dataTable();

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

function getRowAutoridad()
{
    //Materialize.toast("Id: " + id, 2400);

    var table = $('#tableAllAutoridad').DataTable();

        $('#tbodyAllAutoridad').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila
              var nombre_id = new Array(2);
              var idAutoridad = registro[0];

              document.getElementById("vbuscar").value = idAutoridad;

              document.getElementById("noseliminar").value = idAutoridad;

              $('#modalGetAllAutoridad').closeModal(); // Cerrar el modal cuando se seleccione el cliente

        } );
}

// Funcion para subir una imagen con Ajax, se ocupa el nombre del formulario, y el nombre del input
function subirImagenAutoridad(form_, name, autoridad) // Funcion para subir al servidor la imagen seleccionada
{
    var form = document.forms.namedItem(form_);
    var logodependencia = document.getElementsByName(name).value;
    console.log("form_: " + form_ + "\nlogodependencia:" + logodependencia);

    var nombreAutoridad = document.getElementById(autoridad).value;

        var
          oOutput = document.getElementById("output"), // variable para poner el texto que se subio correctamente las imagenes
          oData = new FormData(form); // variable que obtiene el formulario nombrado 'form_add'

        oData.append("nombre_campo", name);
        console.log("oData length: " + oData.length);

         if( nombreAutoridad !== "" )
          {
             oData.append("autoridad", nombreAutoridad);
          }
          else
          {
            oData.append("autoridad", "autoridad");
          }

        var oReq = new XMLHttpRequest();
        oReq.open("POST",
          url + "autoridades.php?met=upload_image", true);

        oReq.onload = function(oEvent)
        {
          if (oReq.status == 200) { // Si la respuesta es satisfactoria se notifica en la variable 'oOutput'
            //oOutput.innerHTML = "Subida correcta! nombre --> " + oReq.responseText;

            if( (oReq.responseText.search(/Formato no soportado o falta agregar la imagen/) ) !== -1 )
            {
                Materialize.toast("Formato no soportado o falta agregar la imagen", 5000);
            }
            else{
              Materialize.toast("Subida correcta de la imagen: " + oReq.responseText , 3500);
              nombre_archivo = oReq.responseText;
              if( form_ === "form_add" )
                agregarautoridades(nombre_archivo);
              if( form_ === "form_mod")
                modificarAutoridad(nombre_archivo);
            }
          } else { // Si la respuesta es incorrecta se notifica en la variable 'oOutput'
            oOutput.innerHTML = "Error " + oReq.status + " ocurrió un problema subiendo su archivo.<br \/>";
          }
        };

        oReq.send(oData); // La variable 'oReq' envia los datos ( el formulario 'form' ) al servidor

}

function agregarautoridades(nombre_archivo){//Funcion agregar autoridad

  var nombre_img = nombre_archivo;
  console.log("agregarautoridades(), nombre_img: " +nombre_img);

  //if( nombre_img !== "")
  //{
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

        console.log("nombre_archivo: " + nombre_img);

        if( nombre=="" || jefe==""|| tel_jefe==""|| puesto==""|| contacto1==""|| telcontacto1==""
         	|| contacto2==""|| telcontacto2==""  ||contacto3==""|| telcontacto3==""
          || teldependencia=="" || nombre_img==""){
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
                'logodependencia': nombre_img
              };


      $.ajax({
          type: "POST",
          url: url + "autoridades.php?met=store",//URL dela funcion a ejecutar en table/clientes.php
          data: $data, //enviar los datos que colocamos dentro del objeto
          success: function (data){
            location.reload();
            if( data === 1 )
              Materialize("Registro insertado correctamente", 4000);
            else
              Materialize("No se registró nada", 4000);

          } // respuesta de case en table/autoridades.php
      });

      }
  //} // fin if
  //else { Materialize.toast("Elija la imagen", 4000); }

}

function modificarAutoridad(nombre_archivo){

 var ruta = document.getElementById("logodependenciaActualizar").value;

  var nombre_img = nombre_archivo;
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


   if(co=="" || nombreActualizar=="" || jefeActualizar==""
   	|| teljActualizar==""|| puestoActualizar==""
    || contacto1Actualizar=="" || telcontacto1Actualizar==""
    || contacto2Actualizar=="" || telcontacto2Actualizar==""
    || contacto3Actualizar=="" || telcontacto3Actualizar==""
    || teldependenciaActualizar==""

    ){
     Materialize.toast('Completar campos requeridos', 4000);
   }
   else
   {
      console.log("modificarAutoridad() ruta: " + ruta + "\nruta.length: " + ruta.length);
      console.log("modificarAutoridad() nombre_img : " + nombre_img); // Nombre de la imagen subida actualizado en el metodo subirImagen()

      // Si no se desea subir imagen, se comprueba si el input tiene algun dato, si esta vacio, no se seleccionó imagen
      // y no se manda dato de 'logodependencia' al servidor para actualizar en la BD
      if (nombre_img === "") {
          $data = {
               'co'   : co , 'nombreActualizar'   : nombreActualizar, 'jefeActualizar' : jefeActualizar
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

        $data = {
               'co'   : co , 'nombreActualizar'   : nombreActualizar, 'jefeActualizar': jefeActualizar
               , 'teljActualizar': teljActualizar, 'puestoActualizar': puestoActualizar
               , 'contacto1Actualizar': contacto1Actualizar, 'telcontacto1Actualizar': telcontacto1Actualizar
               , 'contacto2Actualizar': contacto2Actualizar, 'telcontacto2Actualizar': telcontacto2Actualizar
               , 'contacto3Actualizar': contacto3Actualizar, 'telcontacto3Actualizar': telcontacto3Actualizar
               , 'teldependenciaActualizar': teldependenciaActualizar, 'logodependenciaActualizar': nombre_img
              };
      }

      $.ajax({
          type: "POST",
          url: url + "autoridades.php?met=update",//URL dela funcion a ejecutar en table/autoridades.php
          data: $data, //enviar los datos que colocamos dentro del objeto
          success: function (data){
              location.reload();
              console.log("respuesta update: " + data);
           }, // respuesta de case en table/autoridades.php
            error: /*function (xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
              }*/

            function (request, status, error) {
              console.log("Error: " + request.responseText);
            }
      });

   }

}

function eliminarautoridades(){
    var nombreliminar=document.getElementById("nombreliminar").value;
    if(nombreliminar===""){
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
  var autoridad=document.getElementById("vbuscar").value;//Obtener los valores de input y guardarlos en variable
  console.log("Autoridad --> " + autoridad);
  if (autoridad === "") { Materialize.toast('Completar campos requeridos', 4000); }
  else
  {
   $data = { 'autoridad' : autoridad };
   console.log($data);
   $.ajax({
       type: "GET",
       dataType: 'json',
       url: url + "autoridades.php?met=search",//URL dela funcion a ejecutar en table/usuarios.php
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){
        if( data.length > 0)
          {

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
           //document.getElementById("logodependenciaActualizar").value = data[0][12];
         }
         else{ Materialize.toast("No hay registro", 4000); }

        } // respuesta de case en table/autoridades.php
     });
  }
}
