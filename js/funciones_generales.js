//********
//  Cambiar la url por la de la maquina real
//********
var url = "http://127.0.0.1/Proyecto Gruas Unido - copia/table/";

// ***** Funciones COOKIES
function mostrarCookies()
{
  alert("Cookies ->  " + document.cookie);
}

function guardarCookie(nombre, valor)
{
  //nombre = document.getElementById("nombre").value;
  //valor = document.getElementById("valor").value;

  console.log("nombre: " + nombre + " valor: " + valor);


  caduca = "31 Dec 2020 23:59:59 GMT";

  document.cookie = nombre +"="+ valor +" expires="+caduca;

  var misCookies = document.cookie;
  //alert("Guardada la cookie: " + misCookies);
}

function leerCookie(nombre)
{
  //var nombre = document.getElementById("buscar").value;
  var lista = document.cookie.split(";");

  for(i in lista)
  {
    var busca = lista[i].search(nombre);
    if(busca > -1)
    {
      miCookie = lista[i];
    }
  }
  var igual = miCookie.indexOf("=");
  var valor = miCookie.substring(igual + 1);
  console.log("metodo leerCookie() -> valor de cookie: " + nombre +" = " + valor);
  return valor;
}

function borrarCookies()
{
  var lista = document.cookie.split(";");
  for( i in lista )
  {
    var igual = lista[i].indexOf("=");
    var nombre = lista[i].substring(0, igual);
    lista[i] = nombre +"=" +""+"; expires=1 Dec 2000 00:00:00 GMT";
    document.cookie = lista[i];
  }
  alert("Cookies borradas");
}
// ***** Funciones COOKIES

function convertir_aMayuscula(cadena, id)
{
    //console.log("convertir_aMayuscula:  cad: " + cadena + "\nid: " + id );
    document.getElementById(id).value = cadena.toUpperCase();
    //console.log("*** Mayuscula *** \nconvertir_aMayuscula:  cad: " + cadena + "\nid: " + id );

}

// Funcion para subir una imagen con Ajax, se ocupa el nombre del formulario, y el nombre del input
function subirImagen(form_, name) // Funcion para subir al servidor la imagen seleccionada
{
    console.log("form_: " + form_ + "\nname:" + name);
    var form = document.forms.namedItem(form_);
    var logodependencia = document.getElementsByName(name).value;

        var
          //oOutput = document.getElementById("output"), // variable para poner el texto que se subio correctamente las imagenes
          oData = new FormData(form); // variable que obtiene el formulario nombrado 'form_add'

        oData.append("nombre_campo", name);
        console.log("oData length: " + oData.length);

        var oReq = new XMLHttpRequest();
        oReq.open("POST",
          url + "funciones_generales.php?caso=upload_image", true);

        oReq.onload = function(oEvent)
        {
          if (oReq.status == 200) { // Si la respuesta es satisfactoria se notifica en la variable 'oOutput'
            //oOutput.innerHTML = "Subida correcta!";
            Materialize.toast("Subida correcta " + oReq.responseText , 3500);
          } else { // Si la respuesta es incorrecta se notifica en la variable 'oOutput'
            //oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
          }
        };

        oReq.send(oData); // La variable 'oReq' envia los datos ( el formulario 'form' ) al servidor
}

function numaLetra(origen_num, destino_letra)
{
  var numero = document.getElementById(origen_num).value;

    var oReq = new XMLHttpRequest();
        oReq.open("GET",
          url + "funciones_generales.php?caso=convert_number_to_letter&numero="+numero, true);

        oReq.onload = function(oEvent)
        {
          if (oReq.status == 200) { // Si la respuesta es satisfactoria se notifica en la variable 'oOutput'
            document.getElementById(destino_letra).value = oReq.responseText;
            //Materialize.toast("Correcto: " + oReq.responseText, 3500);
          } else { // Si la respuesta es incorrecta se notifica en la variable 'oOutput'
            //oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
            Materialize.toast("Error: " + oReq.responseText, 5000);
          }
        };

        oReq.send(numero);
}

function mostrarHora(id)
{
    setInterval(function(){
            document.getElementById(id).innerHTML = new Date();
      },1000);
}

// Funcion que convierte la cadena pasada en mayusculas, enviando la peticion por ajax y estableciendo la
// cadena ya en mayusculas en el campo con el id pasado como parametro
/*function convertir_aMayusculas(cadena, id)
{
    console.log("id: " + id + "\ncadena: " + cadena);
    var oReq = new XMLHttpRequest();
        oReq.open("GET",
          url + "funciones_generales.php?caso=convert_toUppercase&cadena=" + cadena, true);

        oReq.onload = function(oEvent)
        {
          if (oReq.status == 200) { // Si la respuesta es satisfactoria se notifica en la variable 'oOutput'
            //oOutput.innerHTML = "Subida correcta!";
            document.getElementById(id).value =  oReq.responseText;

          } else { // Si la respuesta es incorrecta se notifica en la variable 'oOutput'
            //oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
            Materialize.toast("error", 1500);
          }
        };

        oReq.send();
}*/