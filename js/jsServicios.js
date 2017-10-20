function agregarServicioAlimentacion(idPaquete, idservicio,precioServicio){
	
   var formData= new FormData();
    formData.append("opcion",1);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);
    formData.append("precio",precioServicio);
    $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se agrego con exito el servicio de alimentacion");
            
    });
}

function descartarServicioAlimentacion(idservicio,idPaquete,precioServicio){
    var formData= new FormData();
    formData.append("opcion",2);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);
    formData.append("precio",precioServicio);
    $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se descarto con exito el servicio de alimentacion");
    });
}

function agregarServicioHospedaje(idPaquete, idservicio,precioServicio){
    
   var formData= new FormData();
    formData.append("opcion",3);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);
    formData.append("precio",precioServicio);
    $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se agrego con exito el servicio de hospedaje");
            
    });
}

function descartarServicioHospedaje(idservicio,idPaquete,precioServicio){
    var formData= new FormData();
    formData.append("opcion",4);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);
    formData.append("precio",precioServicio);
    $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se descarto con exito el servicio de hospedaje");
    });
}

function agregarServicioTransporte(idPaquete, idservicio,precioServicio){
    
   var formData= new FormData();
    formData.append("opcion",5);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);
    formData.append("precio",precioServicio);
    $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se agrego con exito el servicio de transporte");
            
    });
}

function descartarServicioTransporte(idservicio,idPaquete,precioServicio){
    var formData= new FormData();
    formData.append("opcion",6);
    formData.append("idpaquete",idPaquete);
    formData.append("idservicio",idservicio);
    formData.append("precio",precioServicio);
    $.ajax({
            url:"../business/agregarDescartarServicios.php",
            type : "post",
            dataType : "html",
            data : formData,
            cache : false,
            contentType : false,
            processData : false
    }).done(function(data) {
            alert("Se descarto con exito el servicio de transporte");
    });
}


