$("#btnGuardar").click(function(){

	if ($("#nombre_archivo").val() == ""){
		var modal = $("#modal");
		modal.find(".modal-title").text("Error");
		modal.find(".modal-body p").text("Debe colocarle un nombre a la carta");
		modal.find(".modal-header").attr({"style":"background-color:#c77270"});
		modal.find("h4").attr({"style":"color: black"});
		modal.modal("show");
	}else{
		crearCarta($("#carta").html(),$("#nombre_archivo").val());
	}
	
});

function crearCarta(contenido, nombre_archivo){
	var contenido = {"contenido":contenido,
					 "nombre_archivo":nombre_archivo
					};
	$.ajax({
		type:"post",
		url:"/guardar",
		headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		},
		data:contenido,
		dataType:"json",
		complete:function(data){
			if (data.status==200 && data.responseText=="1"){
				var modal = $("#modal");
				modal.find(".modal-title").text("Exito");
				modal.find(".modal-body p").text("La carta ha sido generada exitosamente");
				modal.find(".modal-header").attr({"style":"background-color:#337ab7"});
				modal.find("h4").attr({"style":"color: black"});
				modal.modal("show");
			}
		}
	});
}