
var id;

$(".btn-warning").click(function(){
	
	id = $(this).attr("id");
	$("#compartir").modal("show")
});

$("#btnCompartir").click(function(){

	if ($("#destinatario").val()==""){
		alert("Complete el mail");
	}else{
		var data = {"id_modelo":id,
					"destinatario":$("#destinatario").val()
					}
		$.ajax({
			type:"post",
			url:"compartir",
			headers: {
	    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  		},
			data:data,
			complete:function(data){
				console.log(data.responseText);
			}
		});
		$("#compartir").modal("hide");
	}
});