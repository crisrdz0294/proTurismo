function cargarPagina(url){
	$('#divActividades').load(url);
}

function agregarActividad(idPaquete, idActividad){
	
    var formData= new FormData();
    formData.append("opcion",1);
    formData.append("idpaquete",idPaquete);
    formData.append("idactividad",idActividad);
    $.ajax({
    		url:"../business/agregarDescartarBusiness.php",
    		type : "post",
    		dataType : "html",
    		data : formData,
    		cache : false,
    		contentType : false,
    		processData : false
    }).done(function(data) {
        	alert("agrego");
    });
	
		
}


function descartarActividad(idActividad,idPaquete){

    var formData= new FormData();
         formData.append("opcion",2);
         formData.append("idactividad",idActividad);
         formData.append("idpaquete",idPaquete);
         $.ajax({
            url:"../business/agregarDescartarBusiness.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
        }).done(function(data) {
            alert("descarto");
        });

}