var id_pdf;

$(".btn-warning").click(function(){
	var modal = $("#mails");
	id_pdf = $(this).attr("id");
	modal.modal("show");
});

$("#btnEnviarModal").click(function(){

	var data = {"id_pdf":id_pdf,
				"destino":$("#destinatario").val(),
				};
	$.ajax({
		type:"post",
		url:"/enviar",
		headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		},
		data:data,
		complete:function(data){
			var modal = $("#modal");
			modal.find(".modal-title").text("Exito");
			modal.find(".modal-body p").text("El mail ha sido enviado");
			modal.find(".modal-header").attr({"style":"background-color:#337ab7"});
			modal.find("h4").attr({"style":"color: black"});
			modal.modal("show");
		}
	});

	$("#mails").modal("hide");
	
});