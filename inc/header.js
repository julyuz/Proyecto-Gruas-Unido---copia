/*
	Archivo necesario para el login, si se ingresa correctamente, se muestra lo necesario
	o de acuerdo a los permisos que se tengan
*/

$('document').ready(function(e){


	$("#home").hide();
	$("#cliente").hide();
	$("#pago").hide();
	$("#grupo").hide();
	$("#producto").hide();
	$("#usuario").hide();
	$("#corte").hide();
	var cookie = document.cookie;
	if(cookie=="" || cookie=="x"){
		window.location="Login/index.php";
	}
	else{
		var data = cookie.split(",");
		$( "#name" ).append( $("<h1 class='title-user'>"+data[0]+"</h1>"));

		if(data[2]=="true"){
			$("#home").show();
			$("#cliente").show();
			$("#pago").show();
			$("#grupo").show();
			$("#producto").show();
			$("#usuario").show();
			$("#corte").show();
		}
		else{
			$("#home").show();
			$("#cliente").show();
			$("#pago").show();
			$("#grupo").show();
			$("#producto").show();
		}
	}

});//--------------------------END DOCUMENT*/


function cerrar(){
	document.cookie="x;path=/";
	window.location="Login/index.php";
}
