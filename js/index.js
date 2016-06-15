r$('document').ready(function(e){
    var cookie = document.cookie;
    var data = cookie.split(",");
    if(cookie=="" || cookie=="x" ){
      window.location="Login/index.php";
    }
    var hoy = new Date();// todo el dia de hoy
    var ultimo=0;
    $.ajax({
        type: "get",
        dataType: 'json',
        url: "http://127.0.0.1/GYM/table/historial.php?metodo=show",//URL dela funcion a ejecutar en table/usuarios.php
        success: function (data){
        //	console.log(data);
        	for (var i = 0; i < data.length; i++) {
        		var dayScanner;		//guardar td dependiendo del dia
                var fVencida = new Date(data[i][3]);
        		if (fVencida<=hoy) { // si el dia hoy vence la fecha de vencimiento lo pondra en rojo
        			dayScanner ="<td class='dia-vencido'>"+data[i][3]+"</td>";
        		}
        		else{//si no lo pondra normal
        			dayScanner ="<td>"+data[i][3]+"</td>";
        		}
        		$('#tableBody').append( $("<tr><td>"+data[i][0]+"</td><td>"+data[i][1]+"</td><td>"+data[i][2]+"</td>"+dayScanner+"</tr>") )

            };
           // console.log(data[ultimo][1]);
            document.getElementById("numeroSocio").value =data[ultimo][0];
            document.getElementById("nombreCliente").value =data[ultimo][1];
            document.getElementById("fechaFinal").value =data[ultimo][3];

        	$('#example').dataTable();
        } // respuesta de case en table/usuarios.php
    });

});//--------------------------END DOCUMENT

function guardar(){
	var socio   = document.getElementById("socio").value;
	$data = { 'noSocio'   : socio};
	if(socio==""){
		 Materialize.toast('Completar campos requeridos', 4000);
	}
	else{
		$.ajax({
		    type: "POST",
		    url: "http://127.0.0.1/GYM/table/historial.php?metodo=store",//URL dela funcion a ejecutar en table/usuarios.php
		    data: $data, //enviar los datos que colocamos dentro del objeto
		    success: function (data){ location.reload();} // respuesta de case en table/usuarios.php
		});
	}
}