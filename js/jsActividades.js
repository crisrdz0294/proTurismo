
function cargarPagina(url){
	$('#divActividades').load(url);
}

function agregarActividad(idActividad){
    var idPaquete = document.getElementById("prueba").value; 
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
        	alert("Se agrego con exito la actividad");
           eliminarFilas(document.getElementById('tablaActividades'));
           actualizarPrecioPaquete();
           mostrarActividades();
    });
	
		
}


function descartarActividad(idActividad){
    var idPaquete = document.getElementById("prueba").value; 
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
            alert("Se descarto con exito la actividad");
             eliminarFilas(document.getElementById('tablaActividades'));
             actualizarPrecioPaquete();
             mostrarActividades();
        });

}



function mostrarActividades(){

    eliminarFilas(document.getElementById('tablaActividades'));
    document.getElementById("radioAlimentacion").checked = false;
    document.getElementById("radioTransporte").checked = false;
    document.getElementById("radioHospedaje").checked = false;

    document.getElementById('contenedorRadios').style.display = 'none';
    document.getElementById('contenedorAlimentacion').style.display = 'none';
    document.getElementById('contenedorhospedaje').style.display = 'none';
    document.getElementById('contenedortransporte').style.display = 'none';
    
    document.getElementById('contenedorGeneral').style.display = 'block';
    document.getElementById('contenedorActividades').style.display = 'block';
    var idpaquete=document.getElementById("idPaqueteTem").value;

    var formData = new FormData();
    formData.append("opcion",1);
    formData.append("idpaquete",idpaquete);

    $.ajax({
        url : "../business/paqueteActividadBusiness.php",
        type : "post",
        dataType : "html",
        async:false,
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {
            
            var dataJson = eval('(' + data + ')');
            var tamano=dataJson.length;
            for(i=0;i<tamano;i++){
                var nuevafila="";
                if(dataJson[i]['estadoagregada']==0){
                   nuevafila= "<tr><td>" +
                   dataJson[i]['idactividad']+"</td><td>"+
                   dataJson[i]['nombreactividad'] + "</td><td>" +
                   dataJson[i]['descripcionactividad'] + "</td><td>"+"₡"+
                   dataJson[i]['precioactividad']+"</td><td>"+
                   '<input type="button" value="Agregar" onclick="agregarActividad(\''+dataJson[i]['idactividad']+'\')" />'+
                   "</td></tr>" 
                  
                }else if(dataJson[i]['estadoagregada']==1){
                     nuevafila= "<tr><td>" +
                   dataJson[i]['idactividad']+"</td><td>"+
                   dataJson[i]['nombreactividad'] + "</td><td>" +
                     dataJson[i]['descripcionactividad'] + "</td><td>"+"₡"+
                     dataJson[i]['precioactividad']+"</td><td>"+
                      '<input type="button" value="Descartar" onclick="descartarActividad(\''+dataJson[i]['idactividad']+'\')" />'+
                     "</td></tr>" 

                }
                $("#tablaActividades").append(nuevafila);

               
               
            }

        });

        var index= 1;
        $('#tablaActividades th:nth-child('+index+')').hide();
        $('#tablaActividades td:nth-child('+index+')').hide();

     
       
}

       
