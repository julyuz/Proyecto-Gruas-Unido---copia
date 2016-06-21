	$(document).on("ready",function(){
	$(".eliminar").click(function(){
		$.post('../admin/ejecuta.php',{
			Caso:'Eliminarusu',
			Id:$(this).attr('data-id')
		},function(e){
			location.reload();
			alert(e);
		});
		
	});
	
});	