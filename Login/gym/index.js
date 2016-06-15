
function Login(){
	
	var usuario  = document.getElementById("usuario").value;
	var password = document.getElementById("password").value;
	$data ={'user':usuario,'password':password};

	  $.ajax({
      type: "POST",
      dataType: 'json',
      url: "http://127.0.0.1/GYM/table/usuarios.php?metodo=log",
      data: $data, 
      success: function (data){
        console.log(data);
      	if (data.validacion=="yes") {
      		console.log("entro");
          document.cookie=data.usuario+";path=/;";
      		window.location="../index.php";
      	}
      	else{
      		alert("Verificar usario y contraseña");
      	}
       } 
    });
}