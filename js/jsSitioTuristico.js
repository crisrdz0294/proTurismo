function cargarProvincias(){

	var formData= new FormData();
    formData.append("opcion",1);
   
    $.ajax({
    		url:"../business/agregarDescartarBusiness.php",
    		type : "post",
    		dataType : "html",
    		data : formData,
    		cache : false,
    		contentType : false,
    		processData : false
    }).done(function(data) {
        $('.selector-pais select').html(response).fadeIn();	
    });


}

function cargarCantones(idprovincia){

}

function cargarDistritos(idcanton){

}