/*
	Archivo necesario para el login, si se ingresa correctamente, se muestra lo necesario
	o de acuerdo a los permisos que se tengan
*/

$('document').ready(function(e){
	//Materialize.toast("Listo el header", 1000);
	//console.log('Metodo de header.js leerCookie(nivel) : ' + leerCookie('nivel'));

	var cookie = leerCookie('nivel').substring(0, 1);
	//console.log("Cookie: " + cookie + " length: " + cookie.length);

	if( cookie === "2") // Si el valor de la cookie ( nivel ) es 2, quiere decir que es nivel de trabajador, y por tanto se ocultan los apartados de 'modificar' y 'eliminar'
	{
		$("#modificar_clientes").hide();
		$("#eliminar_clientes").hide();
		$("#row1_clientes").prepend("<div class='col s12 l2 white-text'>AA</div>");
		$("#agregar_clientes").removeClass("l4");
		$("#agregar_clientes").addClass("l8 offset-l2");

        $("#modificar_autoridades").hide();
		$("#eliminar_autoridades").hide();
		$("#row1_autoridades").prepend("<div class='col s12 l2 white-text'>AA</div>");
		$("#agregar_autoridades").removeClass("l4");
		$("#agregar_autoridades").addClass("l8 offset-l2");

		$("#modificar_gruas").hide();
		$("#eliminar_gruas").hide();
		$("#row1_gruas").prepend("<div class='col s12 l2 white-text'>AA</div>");
		$("#agregar_gruas").removeClass("l4");
		$("#agregar_gruas").addClass("l8 offset-l2");

		$("#modificar_vehiculos").hide();
		$("#eliminar_vehiculos").hide();
		$("#row1_vehiculos").prepend("<div class='col s12 l2 white-text'>AA</div>");
		$("#agregar_vehiculos").removeClass("l4");
		$("#agregar_vehiculos").addClass("l8 offset-l2");

		$("#modificar_remolques").hide();
		$("#eliminar_remolques").hide();
		$("#row1_remolques").prepend("<div class='col s12 l2 white-text'>AA</div>");
		$("#agregar_remolques").removeClass("l4");
		$("#agregar_remolques").addClass("l8 offset-l2");

		$("#modificar_op").hide();
		$("#eliminar_op").hide();
		$("#row1_op").prepend("<div class='col s12 l2 white-text'>AA</div>");
		$("#agregar_op").removeClass("l4");
		$("#agregar_op").addClass("l8 offset-l2");

		$("#modificar_re").hide();
		$("#eliminar_re").hide();
		$("#row1_re").prepend("<div class='col s12 l2 white-text'>AA</div>");
		$("#agregar_re").removeClass("l4");
		$("#agregar_re").addClass("l8 offset-l2");

		$("#modificar_rv").hide();
		$("#eliminar_rv").hide();
		$("#row1_rv").prepend("<div class='col s12 l2 white-text'>AA</div>");
		$("#agregar_rv").removeClass("l4");
		$("#agregar_rv").addClass("l8 offset-l2");

		$("#modificar_memoria").hide();
		$("#eliminar_memoria").hide();
		$("#row1_memoria").prepend("<div class='col s12 l2 white-text'>AA</div>");
		$("#agregar_memoria").removeClass("l4");
		$("#agregar_memoria").addClass("l8 offset-l2");

	}

/*
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
	*/

});//--------------------------END DOCUMENT*/


function cerrar(){
	document.cookie="x;path=/";
	window.location="Login/index.php";
}
