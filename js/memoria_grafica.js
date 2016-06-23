
var cont_tableAllCars = 1;
var cont_tableAllMG = 1;

//include('funciones_generales.js');
//document.write("<script src = 'funciones_generales.js' language = 'JavaScript' type = 'text/javascript'></script>");
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

  var fecha = new Date();
  var mes = (fecha.getMonth() + 1);

  if( mes < 10 )
    mes = "0" + mes;

  var fechaActualDMY = fecha.getDate()+"/"+mes+"/"+fecha.getFullYear();


  var fechaActualYMD = fecha.getFullYear() +"/" + mes +"/" + fecha.getDate();

  console.log("fecha: "+ fechaActualDMY +"\nfecha ActualYMD: " + fechaActualYMD);
  //document.getElementById("fecha_documento").value = fechaActualYMD;


  $('.modal-triggerGetAllCars').leanModal();
  $('.modal-triggerGetAllMG').leanModal();
  $('.modal-triggerGetAllFotos').leanModal();
  $('.slider').slider({full_width: true});

  // Muestra las memorias graficas existentes en cuanto carga la página
   $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "memorias_graficas.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){

        for (var i = 0; i < data.length; i++) {

            $("#muestra").append
              (
                $("<tr id='pointer' onclick='abrirVentana("+data[i][0]+")'><td>"+data[i][0]+
                  "</td><td>"+data[i][1]+
            	    "</td><td>"+data[i][2]+
                  "</td><td>"+data[i][3]+
                  "</td><td>"+data[i][4]+"</td></tr>"
                )
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

   Materialize.toast("Listo", 3000);

});//--------------------------END DOCUMENT

function alerta(){ alert("Alerta"); Materialize.toast("Materialize", 4000); }

// Esta función no sirve :(
function abrirVentana2(id_MG) {
  $datos = { 'id' : id_MG, 'met' : 'get_photos_perMG' };
  console.log("id: " + $datos.id + "\nmet: " + $datos.met);

  $.ajax({
       type: "GET",
       data: $datos,
       url: url + "memorias_graficas.php",
       success: function (dataRequest){
            console.log("Correcto:\n " + dataRequest);

            // Buscar la posición donde se encuentra el texto 'No existe', si es >= 0 quiere decir que si se encuentra el texto,
            // por lo tanto quiere decir que no existe(n) la(s) imagen(es) de la memoria gráfica solicitada (id)
            if( dataRequest.search("No existe") >= 0 ){
              document.open("text/html", "replace");
              document.write(dataRequest);
              document.close();
            }else{

              //console.log("dataRequest: " + dataRequest);
              $("#slidesMaterial").html(dataRequest);

              /*$("#slidesMaterial").append
                  (
                    $(dataRequest)
                  );*/
              //$('.slider').reload();
              window.open("slider.php", "nuevo", "directories=no, location=no, menubar=no,scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
              // La línea de arriba abre una nueva ventana de navegador con el archivo html y las características especificadas
            }
       },
       error: function (request, status, error) {
            console.log("\n\n*** Error AJAX ***\n\n" + error);
            //alert(xhr.status);
            //alert(thrownError);
        }
   });
}

// Si sirve
function abrirVentana(id_MG) {
  $datos = { 'id' : id_MG };
  console.log("id: " + $datos.id);

  $.ajax({
       type: "GET",
       data: $datos,
       url: "slider_material.php",
       success: function (data){
          console.log("Correcto: " + data);
          document.open("text/html", "replace");
          document.write(data);
          document.close();
          //window.open("slider.php", "nuevo", "directories=no, location=no, menubar=no,scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
          // La línea de arriba abre una nueva ventana de navegador con el archivo html y las características especificadas

       },
       error: function (request, status, error) {
            console.log("\n\n*** Error AJAX ***\n\n" + error);
            //alert(xhr.status);
            //alert(thrownError);
          }
   });
}

function getAllMG()
{
    //alert("Clickeado!");
    if( cont_tableAllMG === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "memorias_graficas.php?met=show",
       success: function (data){
        console.log("*** For ***\ncont_tableAllMG: " + cont_tableAllMG );
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );
            $("#tbodyAllMG").append
              (
                $("<tr id ='pointer' onclick='getRowMG();' >"+
                     "<td>"+data[i][0]+"</td><td>"+data[i][1]+
                    "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                    "</td><td>"+data[i][4]+"</td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllMG = cont_tableAllMG + 1;
          $('#tableAllMG').dataTable();
       }, // respuesta de case en table/clientes.php
       error:
       //function (xhr, ajaxOptions, thrownError){
         // alert(xhr.status);
          //alert(thrownError);
        //}

        function (request, status, error) {

          console.log(request.responseText);
        }
      });
    }
}

function getRowMG()
{
    var table = $('#tableAllMG').DataTable();

        $('#tbodyAllMG').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila

              var id = registro[0];
              var placas = registro[1];
              var fin = registro[2];
              var fdo = registro[3];

              document.getElementById("nombreliminar").value = id;
              document.getElementById("id_MG").value = id;
              document.getElementById("memoria_graficaBuscar").value = id;
              //document.getElementById("placasActualizar").value = placas;
              //document.getElementById("fecha_ingresoActualizar").value = fin;
              //document.getElementById("fecha_documentoActualizar").value = fdo;

              $('#modalGetAllMG').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function getAllCars()
{
    //alert("Clickeado!");
    if( cont_tableAllCars === 1)
    {
      $.ajax({
       type: "get",
       dataType: 'json',
       url: url + "vehiculos.php?met=show",//URL dela funcion a ejecutar en table/clientes.php
       success: function (data){
        console.log("*** For ***\ncont_tableAllCars: " + cont_tableAllCars );
        for (var i = 0; i < data.length; i++) {
            //console.log("getClient: " + getClient(data[i][1] ) );
            $("#tbodyAllCars").append
              (
                $("<tr id ='pointer' onclick='getRowCar();' >"+
                     "<td>"+data[i][0]+"</td><td>"+data[i][1]+
                "</td><td>"+data[i][2]+"</td><td>"+data[i][3]+
                "</td><td>"+data[i][4]+"</td><td>"+data[i][5]+
                "</td><td>"+data[i][6]+"</td><td>"+data[i][7]+
                "</td><td>"+data[i][11]+"</td><td>"+data[i][12]+"</td></tr>"
                )
              );
            //console.log("Exito; data.length: " + data.length, 4000);
          }
          cont_tableAllCars = cont_tableAllCars + 1;
          $('#tableAllCars').dataTable();
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
    }
}

function getRowCar()
{
    var table = $('#tableAllCars').DataTable();

        $('#tbodyAllCars').on( 'click', 'tr', function () {

              console.log( table.row( this ).data() );
              var registro = table.row( this ).data(); // Obtener todos los datos de la actual fila

              var placas = registro[0];
              var fin = registro[5];
              //var fsa = registro[6];

              document.getElementById("placas").value = placas;
              document.getElementById("placasActualizar").value = placas;
              document.getElementById("fecha_ingreso").value = fin;
              //document.getElementById("fecha_documento").value = fsa;

              $('#modalGetAllCars').closeModal(); // Cerrar el modal cuando se seleccione el cliente
        } );
}

function crearPDF_img()
{
  var id_MG = document.getElementById("id_MG").value;
  if( id_MG === "")
    Materialize.toast("Completar campos requeridos", 4000);
  else
  {
    console.log("metodo crearPDF_img(id_MG): " + id_MG);

    var form = document.forms.namedItem("form_add");
    var placas = document.getElementById("placas").value;

    //form.addEventListener('submit', function(ev)
      //{
        var
          oOutput = document.getElementById("output"), // variable para poner el texto que se subio correctamente las imagenes
          oData = new FormData(document.forms.namedItem("form_add")); // variable que obtiene el formulario nombrado 'form_add'

        //oData.append("CustomField", "This is some extra data"); // Se le agrega la 2da opcion en la posicion 1era opcion al formulario 'oData'

        oData.append("id_MG", id_MG); // id de MG a mandar para obtener las fotos de esta MG


        var request = new XMLHttpRequest();
        request.open("POST",
          url + "memorias_graficas.php?met=prueba_get_datos", true) ;

        request.onload = function(oEvent)
        {
            if ( request.status == 200 )
            {
                console.log("Respuesta de pruebas_get_datos: " + request.responseText);
            }
        };
        request.send(oData);

        /*var oReq = new XMLHttpRequest();
        oReq.open("POST",
          url + "memorias_graficas.php?met=get_img_perMg", true);

        oReq.onload = function(oEvent)
        {
          if (oReq.status == 200) { // Si la respuesta es satisfactoria se notifica en la variable 'oOutput'
            //oOutput.innerHTML = "correcta respuesta !: " + JSON.parse(oReq.responseText);
            //Materialize.toast("correcta respuesta " + JSON.parse(oReq.responseText, 17500));
            //Materialize.toast("Correcta respuesta: " + oReq.responseText, 15555);

            //var imgs = JSON.parse(oReq.responseText); // Obtener cada imagen desde las respuesta ( vienen separadas por una coma ( ',' ) ), con un split ( dividir la cadena con el caracter pasado )
            var imags = oReq.responseText;
            console.log("imags: " + imags);

            // Codigo necesario para separar cada imagen obtenida ( agregandole una ',' ( coma ) ),
            var split = imags.split(",=,");
            console.log("*** split: " + split + " length: " + split.length);

            var imgs_enviar ="";
            for( var i =0; i < split.length - 1; i++)
            {
              if( i !== split.length-2 )
                imgs_enviar = imgs_enviar + split[i] + ",";
              else
                imgs_enviar = imgs_enviar + split[i];
              console.log("\nsplit[ " + i + " ] : " + split[i] + " length: " + split[i].length);
            }

            console.log("imgs_enviar: " + imgs_enviar + " length: " + imgs_enviar.length);
            document.getElementById("output").innerHTML = "imgs_enviar --> " + imgs_enviar;

            //var jsonString = JSON.stringify(imags);

            //console.log("Antes de met=create_pdf_MG, jsonString: " + jsonString);

            // crear el pdf con las imagenes obtenidas en la respuesta anteior ( oReq )
            $.ajax({
                type: "POST",
                data: { "data" : imgs_enviar },
                url: url + "memorias_graficas.php?met=create_pdf_MG",
                success: function (data){

                  //Materialize.toast("Documento creado en Recibos_Gruas/PDFs/" + data, 5000);
                  console.log("Respuesta de met=create_pdf_MG: " + data);

                  //location.reload();
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

            //flag_img = true;
          } else { // Si la respuesta es incorrecta se notifica en la variable 'oOutput'
            oOutput.innerHTML = "Error AAAA" + oReq.status + " occurred uploading your file.<br \/>";
            console.log("\n\nError respuesta de getImg_perMg ---> " + oReq.status + "\n\n");
          }
        };

        oReq.send(oData); // La variable 'oReq' envia los datos ( el formulario 'form_add' ) al servidor
        */
  }
}

function crearPDF() // Crear pdf sencillo ( con header y footer )
{
    $.ajax({
          type: "POST",
          url: url + "memorias_graficas.php?met=create_pdf",
          //data: $data, //enviar los datos que colocamos dentro del objeto
          success: function (data){
            // Mandar llamar a una funcion para crear el PDF

            //Materialize.toast("Documento creado en Recibos_Gruas/PDFs/" + data, 5000);
            console.log("Respuesta: " + data);

            //location.reload();
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
}

function agregarMemoria_grafica()
{
  //if( flag_img === true)
  //{
    var $cont_inputs = $('div#campo_extra_add').find(':file').length; //variable para saber la cantidad de input['file'] hay en el div 'campo_add_mod'
    console.log("   hay: " + $cont_inputs + " inputs en add");

    img = $cont_inputs;
    console.log("valor de img: " + img);

    var placas=document.getElementById("placas").value;
    console.log("Placas: " + placas);
    var fecha_ingreso=document.getElementById("fecha_ingreso").value;
    var fecha_documento=document.getElementById("fecha_documento").value;


    if( img==="" || placas===""|| fecha_ingreso===""|| fecha_documento===""){
      Materialize.toast('Completar campos requeridos', 4000);
   }
   else{
      $data = { 'img'   : img,///Colocar los parametros en un objeto
                'placas': placas,
                'fecha_ingreso': fecha_ingreso,
                'fecha_documento': fecha_documento
              };

      $.ajax({
          type: "POST",
          url: url + "memorias_graficas.php?met=store",
          data: $data, //enviar los datos que colocamos dentro del objeto
          success: function (data){
            // Mandar llamar a una funcion para crear el PDF

            Materialize.toast("Correcto, registro con id: " + data, 5000);

            subirImagenes(data); // Funcion para subir las imagenes seleccionadas e insertarlas en la tabla 'fotos',  de acuerdo con 'data' ( el id_memoria_grafica ) recien insertada en la tabla 'memorias_graficas'
            //crearPDF_img(data);
            location.reload();
          }
      });

    }
  //}
  //else { alert("Primero suba las img"); }
}

function modificarMemoria_grafica()
{
  var co = document.getElementById("memoria_graficaBuscar").value;
  var placasActualizar=document.getElementById("placasActualizar").value;
  console.log("Placas: " + placasActualizar);
  var fecha_ingresoActualizar=document.getElementById("fecha_ingresoActualizar").value;
  var fecha_documentoActualizar=document.getElementById("fecha_documentoActualizar").value;
  var $cont_inputs = $('div#campo_extra_mod').find(':file').length; //variable para saber la cantidad de input['file'] hay en el div 'campo_add_mod'
    console.log("   hay: " + $cont_inputs + " inputs en add_mod");

    if( co==="" || placasActualizar===""||
      fecha_ingresoActualizar==="" || fecha_documentoActualizar===""){
      Materialize.toast('Completar campos requeridos', 4000);
   }
   else{

      $data = { 'co'  : co,///Colocar los parametros en un objeto
                'placasActualizar': placasActualizar,
                'fecha_ingresoActualizar': fecha_ingresoActualizar,
                'fecha_documentoActualizar': fecha_documentoActualizar,
                'cantidad_fotos' : $cont_inputs
              };

      $.ajax({
          type: "POST",
          url: url + "memorias_graficas.php?met=update",
          data: $data, //enviar los datos que colocamos dentro del objeto
          success: function (data){
            subirImagenes_mod(co);
            location.reload();
          }
      });

    }
}

function eliminarMemoria_grafica()
{
    var nombreliminar=document.getElementById("nombreliminar").value;
    if(nombreliminar===""){
     Materialize.toast('Completar campos requeridos', 4000);
    //console.log(tipoPago);
    } else {
     $data = { 'nombreliminar': nombreliminar };

     $.ajax({
         type: "POST",
         url: url + "memorias_graficas.php?met=delete",//URL dela funcion a ejecutar en table/clientes.php
         data: $data, //enviar los datos que colocamos dentro del objeto
         success: function (data){ location.reload();} // respuesta de case en table/clientes.php
     });
   }
}

function buscarMemoria_grafica()
{
   var memoria_graficaBuscar=document.getElementById("memoria_graficaBuscar").value;//Obtener los valores de input y guardarlos en variable
   if( memoria_graficaBuscar === "")
   {
      Materialize.toast("Completar campos requeridos", 4000);
   }
   else{

   $data = { 'memoria_graficaBuscar' : memoria_graficaBuscar };
   console.log("memoria_graficaBuscar: " + $data.memoria_graficaBuscar);
    //console.log("\n nombreActualizar: " + document.getElementById("nombreActualizar").value);
   $.ajax({
       type: "GET",
       dataType: 'json',
       url: url + "memorias_graficas.php?met=search",
       data: $data, //enviar los datos que colocamos dentro del objeto
       success: function (data){

        if( data.length > 0 )
        {

          //Materialize.toast("Correcto", 2000);
          //document.getElementById("co").value = data[0][0];
          document.getElementById("fecha_ingresoActualizar").value = data[0][1];
          document.getElementById("fecha_documentoActualizar").value = data[0][2];
          document.getElementById("placasActualizar").value = data[0][3];
          //document.getElementById("imgActualizar").value = data[0][4];
        }
        else{ Materialize.toast("No hay registro", 4000); }

       } // respuesta de case en table/memorias_graficas.php
     });
  } // fin else
}

function agregar_campoIMG_add() // Funcion para agregar un input['file'] a 'Agregar memoria'
{
    var $cont_inputs = $('div#campo_extra_add').find(':file').length; //variable para saber la cantidad de input['file'] hay en el div 'campo_add_mod'
    console.log("hay: " + $cont_inputs + " inputs en add");

    $cont_inputs = $cont_inputs + 1; // Le sumo 1 para que empiece a partir de 2 el siguiente id del input['file']

    // Funcion AJAX
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
          if (xhttp.readyState == 4 && xhttp.status == 200)
          {
              //document.getElementById("campo_extra").innerHTML = xhttp.responseText;
              $("#campo_extra_add").append
              (
                (xhttp.responseText)
              );
          }
        };

    xhttp.open("GET",
    url + "memorias_graficas.php?met=add_add&cont_inputs=" + $cont_inputs, true);
        xhttp.send();

    /*$('#campo_extra_add input').each(function(index, elemento) {
        console.log(
              'El elemento: ' + index +
              ' contiene el siguiente HTML: ' +
              $(elemento).html()
          );
    });*/

}

function agregar_campoIMG_mod() // Funcion para agregar campo extra de input["file"] en modificacion
{
    var $cont_inputs = $('div#campo_extra_mod').find(':file').length; //variable para saber la cantidad de input['file'] hay en el div 'campo_add_mod'
    console.log("hay: " + $cont_inputs + " inputs");

    $cont_inputs = $cont_inputs + 1; // Le sumo 1 para que empiece a partir de 2 el siguiente id del input['file']

    // Funcion AJAX
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
          if (xhttp.readyState == 4 && xhttp.status == 200)
          {
              //document.getElementById("campo_extra").innerHTML = xhttp.responseText;
              $("#campo_extra_mod").append
              (
                (xhttp.responseText)
              );
          }
        };

    xhttp.open("GET",
      url + "memorias_graficas.php?met=add_mod&cont_inputs="+$cont_inputs, true);
        xhttp.send();

    /*$('#campo_extra_add input').each(function(index, elemento) {
        console.log(
              'El elemento: ' + index +
              ' contiene el siguiente HTML: ' +
              $(elemento).html()
          );
    });*/

}

function subirImagenes(id_MG) // Funcion para subir al servidor las imagenes seleccionadas
{
    var form = document.forms.namedItem("form_add");
    var placas = document.getElementById("placas").value;

    //form.addEventListener('submit', function(ev)
      //{
        var
          oOutput = document.getElementById("output"), // variable para poner el texto que se subio correctamente las imagenes
          oData = new FormData(document.forms.namedItem("form_add")); // variable que obtiene el formulario nombrado 'form_add'

        console.log("oData length: " + oData.length);

        //oData.append("CustomField", "This is some extra data"); // Se le agrega la 2da opcion en la posicion 1era opcion al formulario 'oData'
        if(placas !== "")
        {
          oData.append("placas", placas); // Agregar placas en la variable placas
          oData.append("id_MG", id_MG); // Agregar el id_memoria_grafica para insertar este id en la tabla 'fotos'
        }

        var oReq = new XMLHttpRequest();
        oReq.open("POST",
          url + "memorias_graficas.php?met=upload_images", true);

        oReq.onload = function(oEvent)
        {
          if (oReq.status == 200) { // Si la respuesta es satisfactoria se notifica en la variable 'oOutput'
            oOutput.innerHTML = "Subida correcta!: " + oReq.responseText + " ";
            Materialize.toast("Subida correcta " + oReq.responseText + " ", 3500);
            //flag_img = true;
          } else { // Si la respuesta es incorrecta se notifica en la variable 'oOutput'
            oOutput.innerHTML = "Error AAAA" + oReq.status + " occurred uploading your file.<br \/>";
          }
        };

        oReq.send(oData); // La variable 'oReq' envia los datos ( el formulario 'form_add' ) al servidor
        //ev.preventDefault();
      //}, false);
}

function subirImagenes_mod(co) // Funcion para subir al servidor las imagenes seleccionadas
{
    var form = document.forms.namedItem("form_mod");
    var placas = document.getElementById("placasActualizar").value;

    //form.addEventListener('submit', function(ev)
      //{
        var
          oOutput = document.getElementById("output"), // variable para poner el texto que se subio correctamente las imagenes
          oData = new FormData(document.forms.namedItem("form_mod")); // variable que obtiene el formulario nombrado 'form_add'

        console.log("oData length: " + oData.length);

        //oData.append("CustomField", "This is some extra data"); // Se le agrega la 2da opcion en la posicion 1era opcion al formulario 'oData'
        oData.append("placas", placas); // Agregar placas en la variable placas
        oData.append("id_MG", co);

        var oReq = new XMLHttpRequest();
        oReq.open("POST",
          url + "memorias_graficas.php?met=upload_images_mod", true);

        oReq.onload = function(oEvent)
        {
          if (oReq.status == 200) { // Si la respuesta es satisfactoria se notifica en la variable 'oOutput'
            //oOutput.innerHTML = "Subida correcta!";
            if (oReq.responseText === 1)
            {
              Materialize.toast("Datos actualizados", 4000);
              Materialize.toast("Subida correcta", 3500);
            }
            if (oReq.responseText === 2) { Materialize.toast("No se actualizo: " + oReq.responseText, 4000); }

            console.log("Respuesta de upload_images_mod: " + oReq.responseText);

          } else { // Si la respuesta es incorrecta se notifica en la variable 'oOutput'
            oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
          }
        };

        oReq.send(oData); // La variable 'oReq' envia los datos ( el formulario 'form_add' ) al servidor
        //ev.preventDefault();
      //}, false);
}
