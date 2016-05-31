$("#save").click(function(){
	var nombre = $("#nombre").val();
	var descripcion = $("#descripcion").val();
	var contenido = {"contenido":tinyMCE.activeEditor.getContent(),
					 "nombre":nombre,
					 "descripcion":descripcion
					};
	$.ajax({
		url:"crear",
		type:"post",
		headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		},
		data:contenido,
		dataType:"json",
	});
	tinyMCE.activeEditor.setContent("");
});