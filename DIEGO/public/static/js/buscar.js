    jQuery(".buscadormenu #search-term-button").click(function () {
        var search_term = jQuery("#search-term-input").val();
        console.log(search_term);
        buscar_plantillas(search_term);
    });

     function buscar_plantillas(search_term){
        if(search_term !== "*")
            url += "?id=" + search_term;
            console.log(url);
        jQuery.ajax({
                url:"/listar_plantillas",
                type: "GET",
                data: {id: jQuery('#id').val()}
            }).done(function( data ) {
                mostrar_plantillas(data, search_term);
                });
    }
 
    function mostrar_plantillas(data, search_term){
        var plantilla = jQuery('#modelo');
        modelo.empty();

        for(var i=0;i<data.length;i++){
            var plantilla = data[i];
            var plantilla_id = "plantilla" + plantilla['identificador'];
            console.log(plantilla);
            var pelicula_html = $([
                "<div class='col-md-2 col-lg-2 item-pelicula'>",
                "   <span class='overlay' id='overlay-portada-"+  pelicula['identificador'] +"' data-pelicula-identificador='" + pelicula['identificador'] +"' ></span>",
                "   <img id='" + pelicula_tapa_id + "' class='portada' alt='' />",
                "   <p class='titulo'>" + pelicula['nombre']  + "</p>",
                "   <div class='puntaje puntaje-form'>",
                "    <input type='hidden' data-readonly",
                "    name='rating' id='rating' class='rating' data-filled='glyphicon glyphicon-star' data-pelicula-identificador=" + pelicula['identificador'],
                "    data-empty='glyphicon glyphicon-star-empty' value='"+pelicula['ponderacion']+"'/>",
                "   </div>",
                "</div>"
            ].join("\n"));
            plantilla.append(pelicula_html);
            jQuery('.rating').rating();
            jQuery('#overlay-portada-' + pelicula['identificador']).bind("click", function(e) {
                mostrar_modal(jQuery(this).data('pelicula-identificador'));
                console.log(pelicula['identificador']);
            });
        }
    }    

